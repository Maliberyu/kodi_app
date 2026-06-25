const CACHE_NAME = 'kodi-v1';

const STATIC_ASSETS = [
  '/',
  '/manifest.json',
  '/icon/icon.png',
];

// Install: cache static assets
self.addEventListener('install', (event) => {
  event.waitUntil(
    caches.open(CACHE_NAME).then((cache) => cache.addAll(STATIC_ASSETS))
  );
  self.skipWaiting();
});

// Activate: hapus cache lama
self.addEventListener('activate', (event) => {
  event.waitUntil(
    caches.keys().then((keys) =>
      Promise.all(keys.filter((k) => k !== CACHE_NAME).map((k) => caches.delete(k)))
    )
  );
  self.clients.claim();
});

// Fetch: network-first untuk halaman, cache-first untuk aset statis
self.addEventListener('fetch', (event) => {
  const { request } = event;
  const url = new URL(request.url);

  // Lewati request non-GET dan cross-origin
  if (request.method !== 'GET' || url.origin !== self.location.origin) return;

  // Aset statis (build/assets, icon, favicon) → cache-first
  if (
    url.pathname.startsWith('/build/') ||
    url.pathname.startsWith('/icon/') ||
    url.pathname.startsWith('/storage/') ||
    url.pathname.match(/\.(png|jpg|jpeg|gif|svg|ico|woff2?|css|js)$/)
  ) {
    event.respondWith(
      caches.match(request).then((cached) => {
        if (cached) return cached;
        return fetch(request).then((response) => {
          if (response && response.status === 200) {
            const clone = response.clone();
            caches.open(CACHE_NAME).then((cache) => cache.put(request, clone));
          }
          return response;
        });
      })
    );
    return;
  }

  // Halaman HTML → network-first, fallback ke cache
  event.respondWith(
    fetch(request)
      .then((response) => {
        if (response && response.status === 200) {
          const clone = response.clone();
          caches.open(CACHE_NAME).then((cache) => cache.put(request, clone));
        }
        return response;
      })
      .catch(() => caches.match(request))
  );
});
