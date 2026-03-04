/**
 * Redis Rate Limiter Middleware
 *
 * Her IP adresi için dakikada maksimum 15 isteğe izin verir.
 * Limit aşıldığında 429 Too Many Requests döner ve kalan süreyi bildirir.
 *
 * Algoritma: Sliding Window (Kayan Pencere)
 * Redis'te her IP için bir sayaç tutulur. İlk istekte TTL (süre) atanır.
 * Sayaç limitin üstüne çıkarsa istek reddedilir.
 */

const redis = require('../services/redisClient');
const config = require('../config');

const rateLimiter = async (req, res, next) => {
    const ip = req.ip; // İstemcinin IP adresi
    const key = `rate_limit:${ip}`; // Redis'te kullanılacak anahtar

    try {
        // INCR: Anahtarın değerini 1 artırır. Anahtar yoksa 0'dan başlar.
        const requests = await redis.incr(key);

        // İlk istek ise TTL (Time To Live) ata — pencere süresi
        if (requests === 1) {
            await redis.expire(key, config.RATE_LIMIT.WINDOW_SECONDS);
        }

        // Kalan süreyi hesapla (başlık için kullanışlı)
        const ttl = await redis.ttl(key);

        // Standart rate-limit başlıklarını ekle (RFC 6585)
        res.set({
            'X-RateLimit-Limit': config.RATE_LIMIT.MAX_REQUESTS,
            'X-RateLimit-Remaining': Math.max(0, config.RATE_LIMIT.MAX_REQUESTS - requests),
            'X-RateLimit-Reset': ttl,
        });

        // Limit aşıldıysa isteği reddet
        if (requests > config.RATE_LIMIT.MAX_REQUESTS) {
            return res.status(429).json({
                success: false,
                error: 'Too Many Requests',
                message: `Dakikada en fazla ${config.RATE_LIMIT.MAX_REQUESTS} istek gönderebilirsiniz.`,
                retryAfter: ttl, // Kaç saniye sonra tekrar deneyebileceğini bildir
            });
        }

        // Limit aşılmadıysa bir sonraki middleware'e devam et
        next();
    } catch (err) {
        // Redis bağlantı hatası olursa isteği geçir (fail-open policy)
        // Bu, Redis'in devre dışı kalmasının tüm API'yi durdurmamasını sağlar
        console.error('[RateLimiter] Redis hatası, istek geçiriliyor:', err.message);
        next();
    }
};

module.exports = rateLimiter;
