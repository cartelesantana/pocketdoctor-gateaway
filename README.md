# PocketDoctor-Gateway

API Gateway for the **doctor-on-my-phone** web application (https://github.com/efeduzcay/doctor-on-my-phone).
This service sits between the frontend SPA and the Google Gemini API to securely handle API calls and protect the API key on the server side.

---

## Architecture Connection

This repository is strictly the backend gateway component for the client-side triage assistant.
Instead of the frontend making direct external calls to Google Gemini, it routes requests through this gateway.

```
Browser (doctor-on-my-phone)
  | 
  |  POST /ai/generate
  V
[PocketDoctor-Gateway :3000]
  |  Attaches GEMINI_API_KEY server-side
  V
Google Gemini API (generativelanguage.googleapis.com)
```

---

## Features

- **Gemini Proxy:** Forwards `/ai/generate` to Gemini with a server-side API key.
- **Model Whitelist:** Accepts only specific models (gemini-2.0-flash, gemini-2.0-flash-lite).
- **Rate Limiting:** Redis-based sliding window (15 requests/minute per IP).
- **CORS Support:** Configurable Cross-Origin Resource Sharing for browser access.

---

## Getting Started

### 1. Configure

Copy the example environment file and add your Gemini API key:

```bash
cp .env.example .env
```

### 2. Run with Docker

```bash
docker-compose up --build
```

### 3. Run Locally

Ensure you have a Redis instance running on `localhost:6379`.

```bash
npm install
npm run dev
```

---

## Frontend Integration

In the `doctor-on-my-phone` repository, update the `js/gemini.js` file to route traffic to this gateway:

```js
const response = await fetch('http://localhost:3000/ai/generate', {
  method: 'POST',
  headers: { 'Content-Type': 'application/json' },
  body: JSON.stringify({ model, contents, systemInstruction }),
});
```
