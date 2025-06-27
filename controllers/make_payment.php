<?php
require_once(__DIR__ . '/../models/Payment.php');
require_once(__DIR__ . '/../connection/connection.php');

$booking_id = $_POST['booking_id'] ?? null;
$user_id = $_POST['user_id'] ?? null;
$amount = $_POST['amount'] ?? null;

if (!$booking_id || !$user_id || !$amount) {
    echo json_encode(['status' => 400, 'message' => 'Missing fields']);
    exit;
}

$model = new Payment($mysqli);
$model->create($booking_id, $user_id, $amount);

echo json_encode(['status' => 200, 'message' => 'Payment recorded'])