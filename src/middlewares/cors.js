/**
 * CORS Middleware
 *
 * doctor-on-my-phone frontend'i (tarayıcı) gateway'e istek atabilmek için
 * Cross-Origin Resource Sharing başlıklarına ihtiyaç duyar.
 *
 * Tarayıcı güvenlik politikası (Same-Origin Policy) gereği:
 * - Frontend: http://localhost:5500 (Live Server)
 * - Gateway : http://localhost:3000
 * farklı "origin" oldukları için tarayıcı isteği bloklar.
 * Bu middleware o bloğu kaldırır.
 */

const config = require('../config');

const corsMiddleware = (req, res, next) => {
    // İzin verilen kaynağı belirt
    res.set('Access-Control-Allow-Origin', config.CORS.ALLOWED_ORIGIN);

    // İzin verilen HTTP metodları
    res.set('Access-Control-Allow-Methods', 'GET, POST, OPTIONS');

    // Frontend'in gönderebileceği başlıklar
    res.set('Access-Control-Allow-Headers', 'Content-Type, Authorization');

    // Preflight isteği (OPTIONS) geldiğinde hemen 204 ile yanıtla
    // Tarayıcı gerçek isteği göndermeden önce OPTIONS ile "izin var mı?" diye sorar
    if (req.method === 'OPTIONS') {
        return res.status(204).end();
    }

    next();
};

module.exports = corsMiddleware;
