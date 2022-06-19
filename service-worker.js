// Template Name: Affan - PWA Mobile HTML Template
// Template Author: Designing World
// Template Author URL: https://themeforest.net/user/designing-world

const staticCacheName = 'precache-v1.0';
const dynamicCacheName = 'runtimeCache-v1.0';

// Pre Caching Assets
const precacheAssets = [
    '/',
    'app-assets/user/css/bootstrap.min.css',
    'app-assets/user/css/animate.css',
    'app-assets/user/css/font-awesome.min.css',
    'app-assets/user/css/owl.carousel.min.css',
    'app-assets/user/fonts/fontawesome-webfont3e6e.eot',
    'app-assets/user/fonts/fontawesome-webfont3e6e.svg',
    'app-assets/user/fonts/fontawesome-webfont3e6e.ttf',
    'app-assets/user/fonts/fontawesome-webfont3e6e.woff',
    'app-assets/user/fonts/fontawesome-webfont3e6e.woff2',
    'app-assets/user/img/core-img/dot.png',
    'app-assets/user/img/core-img/logo.png',
    'app-assets/user/img/core-img/logo-dark.png',
    'app-assets/user/img/core-img/favicon.ico',
    'app-assets/user/js/default/active.js',
    'app-assets/user/js/default/dark-mode-switch.js',
    'app-assets/user/js/bootstrap.bundle.min.js',
    'app-assets/user/js/jquery.min.js',
    'app-assets/user/js/owl.carousel.min.js',
    'app-assets/user/js/pwa.js',
    'app-assets/user/style.css'
];

// Install Event
self.addEventListener('install', function (event) {
    event.waitUntil(
        caches.open(staticCacheName).then(function (cache) {
            return cache.addAll(precacheAssets);
        })
    );
});

// Activate Event
self.addEventListener('activate', function (event) {
    event.waitUntil(
        caches.keys().then(keys => {
            return Promise.all(keys
                .filter(key => key !== staticCacheName && key !== dynamicCacheName)
                .map(key => caches.delete(key))
            );
        })
    );
});

// Fetch Event
// self.addEventListener('fetch', function (event) {
//     event.respondWith(
//         caches.match(event.request).then(cacheRes => {
//             return cacheRes || fetch(event.request).then(response => {
//                 return caches.open(dynamicCacheName).then(function (cache) {
//                     cache.put(event.request, response.clone());
//                     return response;
//                 })
//             });
//         }).catch(function() {
//             // Fallback Page, When No Internet Connection
//             return caches.match('page-fallback.html');
//           })
//     );
// });