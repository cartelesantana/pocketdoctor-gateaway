/**
 * Smart Cache Middleware (Akıllı Önbellek)
 *
 * Sadece GET isteklerini URL bazlı Redis'te saklar (TTL: 60 saniye).
 * Aynı GET isteği tekrar geldiğinde gerçek servise gitmeden önbellekten yanıt döner.
 *
 * Bu yaklaşım:
 * - Arka plandaki servislerin yükünü azaltır.
 * - Yanıt sürelerini dramatik biçimde kısaltır.
 * - Proxy katmanında şeffaf bir şekilde çalışır (upstream service farkında değil).
 */

const redis = require('../services/redisClient');
const config = require('../config');

/**
 * Cache okuma middleware'i.
 * İstek geldiğinde Redis'te önce kontrol eder.
 * Varsa önbellekten döner, yoksa isteği proxy'e devam ettirir.
 */
const cacheMiddleware = async (req, res, next) => {
    // Sadece GET isteklerini önbellekle — POST/PUT/DELETE gibi mutasyon işlemleri önbelleğe alınmaz
    if (req.method !== 'GET') {
        return next();
    }

    // Önbellek anahtarı: tam URL'i kullanarak istek bazlı granülerlik
    const cacheKey = `cache:${req.originalUrl}`;

    try {
        const cachedData = await redis.get(cacheKey);

        if (cachedData) {
            // Önbellekte veri bulundu — servis çağrısı yapmadan döndür
            console.log(`[Cache] HIT: ${req.originalUrl}`);
            const parsed = JSON.parse(cachedData);
            return res.status(parsed.status).set(parsed.headers).send(parsed.body);
        }

        // Önbellekte veri yok — isteği gerçek servise ilet
        console.log(`[Cache] MISS: ${req.originalUrl}`);
        next();
    } catch (err) {
        // Redis hatası olursa cache atlansın, istek servise gitsin
        console.error('[Cache] Redis okuma hatası:', err.message);
        next();
    }
};

/**
 * Proxy yanıtını araya girerek Redis'e yazan yardımcı fonksiyon.
 * http-proxy-middleware'in onProxyRes event'i ile entegre çalışır.
 * Sadece başarılı (2xx) GET yanıtlarını önbelleğe alır.
 *
 * @param {object} proxyRes - Upstream servisin yanıtı
 * @param {object} req - Gelen HTTP isteği
 * @param {object} res - Gönderilecek HTTP yanıtı
 */
const cacheProxyResponse = (proxyRes, req, res) => {
    // Sadece GET + 2xx yanıtlarını önbellekle
    if (req.method !== 'GET' || proxyRes.statusCode < 200 || proxyRes.statusCode >= 300) {
        return;
    }

    const cacheKey = `cache:${req.originalUrl}`;
    const chunks = [];

    // Yanıt gövdesini parça parça topla (stream tabanlı Node.js HTTP)
    proxyRes.on('data', (chunk) => chunks.push(chunk));

    proxyRes.on('end', async () => {
        try {
            const body = Buffer.concat(chunks).toString('utf-8');
            const dataToCache = JSON.stringify({
                status: proxyRes.statusCode,
                headers: proxyRes.headers,
                body,
            });

            // TTL ile Redis'e kaydet
            await redis.setex(cacheKey, config.CACHE.TTL_SECONDS, dataToCache);
            console.log(`[Cache] SET: ${req.originalUrl} (TTL: ${config.CACHE.TTL_SECONDS}s)`);
        } catch (err) {
            console.error('[Cache] Redis yazma hatası:', err.message);
        }
    });
};

module.exports = { cacheMiddleware, cacheProxyResponse };
