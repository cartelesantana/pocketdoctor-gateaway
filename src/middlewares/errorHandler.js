/**
 * Merkezi Hata Yönetimi Middleware (Central Error Handler)
 *
 * Express'te 4 parametreli middleware fonksiyonları hata yakalayıcı olarak tanınır.
 * Uygulama genelinde fırlatılan tüm hatalar buraya düşer.
 *
 * Kullanım: app.use(errorHandler) — tüm route'lardan SONRA tanımlanmalıdır.
 */

const errorHandler = (err, req, res, next) => {
    // Hata detaylarını sunucu loguna yaz (üretimde bu log bir log aggregation servisine gider)
    console.error(`[ErrorHandler] ${req.method} ${req.originalUrl} — ${err.message}`);

    // HTTP durum kodu: hatada belirtilmişse onu kullan, yoksa 500 Internal Server Error
    const statusCode = err.statusCode || err.status || 500;

    // Üretim ortamında stack trace'i gizle
    const isDevelopment = process.env.NODE_ENV === 'development';

    res.status(statusCode).json({
        success: false,
        error: err.name || 'Internal Server Error',
        message: err.message || 'Beklenmeyen bir hata oluştu.',
        // Stack trace yalnızca geliştirme ortamında gönderilir
        ...(isDevelopment && { stack: err.stack }),
        path: req.originalUrl,
        timestamp: new Date().toISOString(),
    });
};

module.exports = errorHandler;
