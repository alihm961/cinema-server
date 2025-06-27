<?php
require_once(__DIR__ . '/../models/SnackOrder.php');
require_once(__DIR__ . '/../connection/connection.php');

$booking_id = $_POST['booking_id'] ?? null;
$snack_name = $_POST['snack_name'] ?? null;
$quantity = $_POST['quantity'] ?? 1;
$price = $_POST['price'] ?? 0;

if (!$booking_id || !$snack_name) {
    echo json_encode(['status' => 400, 'message' => 'Missing fields']);
    exit;
}

$model = new SnackOrder($mysqli);
$model->create($booking_id, $snack_name, $quantity, $price);

echo json_encode(['status' => 200, 'message' => 'Snack order placed']);