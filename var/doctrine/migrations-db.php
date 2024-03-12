<?php

use BEAR\Dotenv\Dotenv;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

(new Dotenv())->load(__DIR__);

return [
    'dbname' => getenv('DB_NAME'),
    'user' => getenv('DB_USER'),
    'password' => getenv('DB_PASSWORD'),
    'host' => getenv('DB_HOST'),
    'port' => getenv('DB_PORT'),
    'driver' => getenv('DB_DRIVER')
];