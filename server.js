/**
 * Sunucu Başlatıcı (server.js)
 *
 * HTTP sunucusunu başlatır ve port'u dinlemeye başlar.
 * app.js'den ayrı tutulmasının nedeni:
 * - app.js'i test ortamında HTTP server başlatmadan kullanabilmek
 * - Graceful shutdown (zarif kapanış) için sunucu referansına ihtiyaç var
 */

const app = require('./src/app');
const config = require('./src/config');

const server = app.listen(config.PORT, () => {
    console.log('==============================================');
    console.log(`  PocketDoctor-Gateway başlatıldı`);
    console.log(`  PORT: ${config.PORT}`);
    console.log(`  ENV : ${process.env.NODE_ENV || 'development'}`);
    console.log('==============================================');
});

/**
 * Graceful Shutdown (Zarif Kapanış)
 *
 * SIGTERM ve SIGINT sinyalleri alındığında (örn. docker stop veya Ctrl+C)
 * aktif bağlantıların bitmesini bekleyerek güvenli şekilde kapanır.
 * Bu, veri kaybı ve yarım kalan istekleri önler.
 */
const gracefulShutdown = (signal) => {
    console.log(`\n[Server] ${signal} alındı. Sunucu kapatılıyor...`);
    server.close(() => {
        console.log('[Server] Tüm bağlantılar kapatıldı. Çıkış yapılıyor.');
        process.exit(0);
    });

    // 10 saniye içinde kapanmazsa zorla kapat
    setTimeout(() => {
        console.error('[Server] Zorla kapatılıyor (timeout).');
        process.exit(1);
    }, 10_000);
};

process.on('SIGTERM', () => gracefulShutdown('SIGTERM'));
process.on('SIGINT', () => gracefulShutdown('SIGINT'));
