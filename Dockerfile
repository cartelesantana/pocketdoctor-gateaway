# ─── Stage 1: Bağımlılıkları Yükle ─────────────────────────────────────────
# node:18-alpine: Üretim için küçük ve güvenli bir temel imaj
FROM node:18-alpine AS builder

WORKDIR /app

# Önce sadece package dosyalarını kopyala — Docker layer cache'ini verimli kullan
# Bu sayede bağımlılıklar, kaynak kod değişmediği sürece yeniden yüklenmez
COPY package*.json ./

# Sadece üretim bağımlılıklarını yükle (devDependencies hariç)
RUN npm ci --only=production

# ─── Stage 2: Üretim İmajı ──────────────────────────────────────────────────
FROM node:18-alpine

# Uygulama dizini
WORKDIR /app

# Güvenlik: root yerine yetkisiz bir kullanıcı oluştur
RUN addgroup -S appgroup && adduser -S appuser -G appgroup

# Derlenmiş bağımlılıkları builder aşamasından kopyala
COPY --from=builder /app/node_modules ./node_modules

# Kaynak kodları kopyala
COPY . .

# Dosya sahipliğini güvenli kullanıcıya ver
RUN chown -R appuser:appgroup /app

# Yetkisiz kullanıcıya geç
USER appuser

# Uygulamanın dinleyeceği port
EXPOSE 3000

# Sağlık kontrolü: her 30 saniyede /health endpoint'ini kontrol et
HEALTHCHECK --interval=30s --timeout=5s --start-period=10s --retries=3 \
  CMD wget -qO- http://localhost:3000/health || exit 1

# Uygulamayı başlat
CMD ["node", "server.js"]
