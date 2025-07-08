<?php

return [

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_origins' => ['http://localhost:5173'],

    'allowed_methods' => ['*'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true, // ✅ Move this line here (Laravel expects it at the end)
];




