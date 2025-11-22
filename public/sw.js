const CACHE_NAME = "brand-design-v1";
const ASSETS_TO_CACHE = [
  "./",
  "./manifest.json",
  "./images/favicons/favicon.svg",
  "./images/favicons/favicon.ico",
  "./styles/global.css",
  "./styles/tailwind.css",
];

// Install event - cache core assets
self.addEventListener("install", (event) => {
  event.waitUntil(
    caches.open(CACHE_NAME).then((cache) => {
      return cache.addAll(ASSETS_TO_CACHE);
    })
  );
  self.skipWaiting();
});

// Activate event - cleanup old caches
self.addEventListener("activate", (event) => {
  event.waitUntil(
    caches.keys().then((cacheNames) => {
      return Promise.all(
        cacheNames.map((cacheName) => {
          if (cacheName !== CACHE_NAME) {
            return caches.delete(cacheName);
          }
        })
      );
    })
  );
  self.clients.claim();
});

// Fetch event - cache first for assets, network first for documents
self.addEventListener("fetch", (event) => {
  // Skip cross-origin requests
  if (!event.request.url.startsWith(self.location.origin)) return;

  event.respondWith(
    caches.match(event.request).then((cachedResponse) => {
      if (cachedResponse) {
        return cachedResponse;
      }

      return fetch(event.request).then((response) => {
        // Don't cache if not a valid response
        if (!response || response.status !== 200 || response.type !== "basic") {
          return response;
        }

        // Clone the response to cache it
        const responseToCache = response.clone();

        caches.open(CACHE_NAME).then((cache) => {
          // Only cache static assets, images, css, js
          if (
            event.request.url.match(
              /\.(js|css|png|jpg|jpeg|svg|ico|json|woff2)$/
            )
          ) {
            cache.put(event.request, responseToCache);
          }
        });

        return response;
      });
    })
  );
});
