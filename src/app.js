/**
 * Express Uygulama Konfigürasyonu (app.js)
 *
 * doctor-on-my-phone mimarisine göre güncellenmiş hal:
 * - CORS middleware eklendi (tarayıcıdan cross-origin istek gelebilmesi için)
 * - AI router (/ai/*) eklendi — Gemini API proxy
 * - Eski mikro-servis proxy'leri kaldırıldı
 */

const express = require('express');
const rateLimiter = require('./middlewares/rateLimiter');
const corsMiddleware = require('./middlewares/cors');
const errorHandler = require('./middlewares/errorHandler');
const aiRouter = require('./routes/ai');

const app = express();

// ─── Genel Middleware'ler ───────────────────────────────────────────────────

// CORS — tarayıcının farklı origin'den gateway'e erişmesine izin ver
// Bu middleware EN ÜSTTE olmalı, diğer route'lardan önce çalışmalı
app.use(corsMiddleware);

// JSON gövdelerini parse et (AI isteğinin body'si JSON formatında gelir)
app.use(express.json({ limit: '10mb' })); // Görsel base64 için limit artırıldı

// IP adresini doğru şekilde al: proxy/load balancer arkasındaysa X-Forwarded-For kullan
app.set('trust proxy', 1);

// ─── Global Rate Limiter ────────────────────────────────────────────────────
// Tüm route'lara gelmeden önce her isteği rate limiter'dan geçir
// Gemini API kotasının israf edilmesini de engeller
app.use(rateLimiter);

// ─── Health Check Endpoint ──────────────────────────────────────────────────
// Docker HEALTHCHECK ve Kubernetes liveness probe'ları için
app.get('/health', (req, res) => {
    res.json({
        status: 'ok',
        service: 'PocketDoctor-Gateway',
        timestamp: new Date().toISOString(),
    });
});

// ─── AI Routes ──────────────────────────────────────────────────────────────
// /ai/* ile başlayan tüm istekler AI router'a iletilir
// POST /ai/generate → Gemini API proxy
// GET  /ai/models   → İzin verilen model listesi
app.use('/ai', aiRouter);

// ─── 404 Handler ───────────────────────────────────────────────────────────
app.use((req, res) => {
    res.status(404).json({
        success: false,
        error: 'Not Found',
        message: `Route bulunamadı: ${req.method} ${req.originalUrl}`,
    });
});

// ─── Merkezi Hata Yönetimi ──────────────────────────────────────────────────
// Express'te hata middleware'i her zaman en sona eklenir
app.use(errorHandler);

module.exports = app;
