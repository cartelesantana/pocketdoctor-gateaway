/**
 * Merkezi yapılandırma modülü.
 * Tüm ortam değişkenleri buradan okunur (Single Source of Truth).
 *
 * doctor-on-my-phone mimarisi:
 * - Frontend → Gateway → Google Gemini API
 * - API key artık backend'de (güvenli), localStorage'da değil
 */

require('dotenv').config();

const config = {
  // Uygulamanın çalışacağı port
  PORT: process.env.PORT || 3000,

  // Redis bağlantı bilgileri (rate limiting + caching için)
  REDIS: {
    HOST: process.env.REDIS_HOST || 'localhost',
    PORT: process.env.REDIS_PORT || 6379,
    PASSWORD: process.env.REDIS_PASSWORD || undefined,
  },

  // Google Gemini API yapılandırması
  GEMINI: {
    // Gemini REST API base URL
    API_URL: 'https://generativelanguage.googleapis.com',
    // API key .env dosyasından okunur — frontend asla görmez
    API_KEY: process.env.GEMINI_API_KEY || '',
    // Yalnızca bu modellere izin verilir (whitelist)
    ALLOWED_MODELS: ['gemini-2.0-flash', 'gemini-2.0-flash-lite'],
  },

  // Rate Limiter ayarları
  RATE_LIMIT: {
    WINDOW_SECONDS: 60,   // Pencere süresi: 60 saniye
    MAX_REQUESTS: 15,     // Bu pencerede izin verilen maksimum istek
  },

  // Cache (önbellek) ayarları — yalnızca GET istekleri için
  CACHE: {
    TTL_SECONDS: 60,      // Önbellekte tutma süresi: 60 saniye
  },

  // CORS ayarları — frontend'in gateway'e erişmesi için
  CORS: {
    // Geliştirmede localhost, üretimde gerçek domain
    ALLOWED_ORIGIN: process.env.CORS_ORIGIN || '*',
  },
};

module.exports = config;
