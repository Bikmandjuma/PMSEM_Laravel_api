<?php

return [
    'paths' => ['api/*'],
    'allowed_origins' => ['*'],
    'supports_credentials' => true, // Allow credentials (e.g., cookies, tokens)
    'allowed_origins_patterns' => [], // Leave empty unless using dynamic subdomains
    'allowed_headers' => ['Content-Type', 'X-Requested-With', 'Authorization', 'Accept', 'Origin'],
    'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'],
    'exposed_headers' => ['Authorization'], // Optional: expose custom headers
    'max_age' => 3600, // Cache preflight response for 1 hour

];
