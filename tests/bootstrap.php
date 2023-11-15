<?php

$loader = require __DIR__ . "/../vendor/autoload.php";

date_default_timezone_set('UTC');
error_reporting(E_ALL ^ E_NOTICE);

if (file_exists(__DIR__ . '/.env')) {
    $dotenv = \Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
    $dotenv->load();
}
