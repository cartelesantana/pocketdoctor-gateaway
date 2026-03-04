/**
 * Redis İstemcisi (Singleton)
 *
 * ioredis kütüphanesi aracılığıyla Redis bağlantısı kurulur.
 * Singleton pattern sayesinde uygulama genelinde tek bir bağlantı kullanılır,
 * bu da kaynak israfını önler.
 */

const Redis = require('ioredis');
const config = require('../config');

// Redis bağlantı ayarlarını config modülünden al
const redis = new Redis({
    host: config.REDIS.HOST,
    port: config.REDIS.PORT,
    password: config.REDIS.PASSWORD || undefined,
    // Bağlantı kesildiğinde otomatik yeniden bağlanma stratejisi
    retryStrategy: (times) => {
        const delay = Math.min(times * 100, 3000); // Max 3 saniye bekleme
        console.log(`[Redis] Yeniden bağlanılıyor... Deneme: ${times}, Bekleme: ${delay}ms`);
        return delay;
    },
    // İlk bağlantı denemesinde bağlanamazsa uygulama crash'lemesin
    lazyConnect: false,
    maxRetriesPerRequest: 3,
});

redis.on('connect', () => console.log('[Redis] Bağlantı başarılı.'));
redis.on('error', (err) => console.error('[Redis] Bağlantı hatası:', err.message));

module.exports = redis;
