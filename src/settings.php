<?php
$settings = [
    'settings' => [
        'displayErrorDetails' => (bool)$_ENV['DISPLAY_ERRORS'],
        'cookies.httponly' => (bool)$_ENV['COOKIES_HTTP_ONLY'],
        'db' => [
            'driver' => $_ENV['DB_DRIVER'],
            'host' => $_ENV['DB_HOST'],
            'database' => $_ENV['DB_NAME'],
            'username' => $_ENV['DB_USERNAME'],
            'password' => $_ENV['DB_PASSWORD'],
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => ''
        ]
    ]
];
