<?php

return [
    'oracle' => [
        'driver' => 'oracle',
        'tns' => env('DB_TNS', ''),
        'host' => env('DB_O_HOST', ''),
        'port' => env('DB_O_PORT', '1521'),
        'database' => env('DB_O_DATABASE', ''),
        'username' => env('DB_O_USERNAME', ''),
        'password' => env('DB_O_PASSWORD', ''),
        'charset' => env('DB_CHARSET', 'AL32UTF8'),
        'prefix' => env('DB_PREFIX', ''),
        'prefix_schema' => env('DB_SCHEMA_PREFIX', ''),
        'edition' => env('DB_EDITION', 'ora$base'),
        'server_version' => env('DB_SERVER_VERSION', '11g'),
    ],

    'oracle12c' => [
        'driver' => 'oracle',
        'host' => env('DB_HOST', ''),
        'port' => env('DB_PORT', '1521'),
        'database' => '',
        'service_name' => env('DB_DATABASE', ''),
        'username' => env('DB_USERNAME', ''),
        'password' => env('DB_PASSWORD', ''),
        'charset' => env('DB_CHARSET', 'AL32UTF8'),
        'prefix' => env('DB_PREFIX', ''),
    ]
];