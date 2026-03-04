/**
 * AI Route — Gemini API Proxy
 *
 * doctor-on-my-phone frontend'i doğrudan Gemini API'ye istek atıyordu.
 * Bu route sayesinde API key artık sunucu tarafında kalır — güvenlik sağlanır.
 *
 * Akış:
 *   Browser → POST /ai/generate → Gateway → Gemini API → Gateway → Browser
 *
 * Frontend'in göndermesi gereken body:
 * {
 *   "model": "gemini-2.0-flash",          // veya "gemini-2.0-flash-lite"
 *   "contents": [ ... ],                   // Gemini'nin beklediği conversation array
 *   "systemInstruction": { ... }           // Opsiyonel sistem prompt'u
 * }
 */

const express = require('express');
const https = require('https');
const config = require('../config');

const router = express.Router();

/**
 * POST /ai/generate
 *
 * Frontend'den gelen isteği doğrular ve Gemini API'ye iletir.
 * API key'i sunucu tarafında ekler.
 */
router.post('/generate', async (req, res, next) => {
    const { model, contents, systemInstruction, generationConfig } = req.body;

    // ── 1. Model doğrulama (whitelist kontrolü) ─────────────────────────────
    // Yalnızca bilinen Gemini modellerine izin ver
    if (!model || !config.GEMINI.ALLOWED_MODELS.includes(model)) {
        return res.status(400).json({
            success: false,
            error: 'Bad Request',
            message: `Geçersiz model. İzin verilen modeller: ${config.GEMINI.ALLOWED_MODELS.join(', ')}`,
            received: model || null,
        });
    }

    // ── 2. İçerik doğrulama ──────────────────────────────────────────────────
    if (!contents || !Array.isArray(contents) || contents.length === 0) {
        return res.status(400).json({
            success: false,
            error: 'Bad Request',
            message: '`contents` alanı zorunlu ve dizi formatında olmalıdır.',
        });
    }

    // ── 3. API key kontrolü ──────────────────────────────────────────────────
    if (!config.GEMINI.API_KEY) {
        console.error('[AI Route] GEMINI_API_KEY tanımlı değil!');
        return res.status(503).json({
            success: false,
            error: 'Service Unavailable',
            message: 'AI servisi şu anda yapılandırılmamış.',
        });
    }

    // ── 4. Gemini API isteği ─────────────────────────────────────────────────
    // Endpoint: /v1beta/models/{model}:generateContent?key={API_KEY}
    const geminiPath = `/v1beta/models/${model}:generateContent?key=${config.GEMINI.API_KEY}`;

    // Gemini'ye gönderilecek body'yi oluştur
    const geminiBody = JSON.stringify({
        contents,
        ...(systemInstruction && { systemInstruction }),
        ...(generationConfig && { generationConfig }),
    });

    const options = {
        hostname: 'generativelanguage.googleapis.com',
        path: geminiPath,
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Content-Length': Buffer.byteLength(geminiBody),
        },
    };

    try {
        // Gemini API'ye HTTPS isteği gönder (Node.js native https modülü)
        const geminiResponse = await new Promise((resolve, reject) => {
            const gemReq = https.request(options, (gemRes) => {
                let data = '';
                gemRes.on('data', (chunk) => { data += chunk; });
                gemRes.on('end', () => resolve({ status: gemRes.statusCode, body: data }));
            });

            gemReq.on('error', reject);

            // İstek gövdesini gönder
            gemReq.write(geminiBody);
            gemReq.end();
        });

        // Gemini'den gelen hata kodunu istemciye yansıt
        if (geminiResponse.status !== 200) {
            console.error(`[AI Route] Gemini API hata yanıtı: ${geminiResponse.status}`);
            return res.status(502).json({
                success: false,
                error: 'Bad Gateway',
                message: 'Gemini AI servisinden hata yanıtı alındı.',
                geminiStatus: geminiResponse.status,
            });
        }

        // Başarılı yanıtı JSON olarak geri döndür
        const parsed = JSON.parse(geminiResponse.body);
        return res.status(200).json(parsed);

    } catch (err) {
        // Ağ hatası: Gemini API'ye ulaşılamadı
        console.error('[AI Route] Gemini API bağlantı hatası:', err.message);
        return next({
            statusCode: 502,
            name: 'Bad Gateway',
            message: 'Gemini AI servisine ulaşılamıyor. Lütfen daha sonra tekrar deneyin.',
        });
    }
});

/**
 * GET /ai/models
 *
 * İzin verilen model listesini döndürür.
 * Frontend hangi modeli kullanabileceğini buradan öğrenir.
 */
router.get('/models', (req, res) => {
    res.json({
        success: true,
        models: config.GEMINI.ALLOWED_MODELS,
    });
});

module.exports = router;
