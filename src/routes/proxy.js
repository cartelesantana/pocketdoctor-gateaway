/**
 * Legacy Proxy — Bu dosya artık aktif olarak kullanılmıyor.
 *
 * doctor-on-my-phone mimarisi bir auth-service veya doctor-service
 * içermemektedir. Uygulama, Google Gemini API üzerinden çalışmaktadır.
 *
 * Gemini proxy işlemleri için: src/routes/ai.js dosyasına bakınız.
 *
 * Bu dosya, ileride gerçek mikro-servisler eklendiğinde
 * referans olarak saklanmaktadır.
 *
 * Örnek kullanım (mikro-servis eklendiğinde):
 *
 * const { createProxyMiddleware } = require('http-proxy-middleware');
 * router.use('/auth', createProxyMiddleware({ target: 'http://auth-service:5001', changeOrigin: true }));
 * router.use('/doctor', createProxyMiddleware({ target: 'http://doctor-service:5002', changeOrigin: true }));
 */

const express = require('express');
const router = express.Router();

// Placeholder — mikro-servisler eklendiğinde buraya proxy route'lar gelecek
module.exports = router;
