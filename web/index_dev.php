<?php

if (php_sapi_name() == "cli-server") {
    $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    if ('/' !== $path && file_exists(__DIR__ . $path)) {
        return false;
    }
}

if (is_file(__DIR__.'/../vendor/autoload.php')) {
    require_once __DIR__.'/../vendor/autoload.php';
} elseif (is_file(__DIR__.'/../../../autoload.php')) {
    require_once __DIR__.'/../../../autoload.php';
}

$app = require __DIR__.'/../src/app.php';
require __DIR__.'/../src/dev.php';
require __DIR__.'/../src/controllers.php';
$app->run();
