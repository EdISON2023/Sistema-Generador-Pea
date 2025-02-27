<?php
require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;


$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();
define('APP_NAME', $_ENV['APP_PROYECTO']);



?>