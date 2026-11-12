// This is the example config file. The original config.php is not uploaded due to security reasons (midtrans server key, doku client id and secret key).
// Please copy this file to config.php and fill in your own credentials

<?php
session_start();

$pdo = new PDO(
    "mysql:host=localhost;dbname=kopipiro;charset=utf8mb4",
    "YOUR_DB_USERNAME",
    "YOUR_DB_PASSWORD",
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::MYSQL_ATTR_FOUND_ROWS => true,
    ]
);

const MIDTRANS_SERVER_KEY = 'YOUR_MIDTRANS_SERVER_KEY';
const MIDTRANS_IS_PRODUCTION = false;
const MIDTRANS_IS_SANITIZED = true;
const MIDTRANS_IS_3DS = true;

define('DISCOUNT_RATE', 0.10);
define('PAYMENT_GATEWAY', 'midtrans');

const DOKU_CLIENT_ID = 'YOUR_DOKU_CLIENT_ID';
const DOKU_SECRET_KEY = 'YOUR_DOKU_SECRET_KEY';
const DOKU_IS_PRODUCTION = false;