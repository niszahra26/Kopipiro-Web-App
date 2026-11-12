<?php
require_once '../helpers.php';

$gateway = PAYMENT_GATEWAY;

if ($gateway === 'midtrans') {
    require 'midtrans_pay.php';
} else {
    out(['message' => 'Invalid payment gateway'], 500);
}
