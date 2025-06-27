<?php
require_once("../models/Payment.php");
require_once("../connection/connection.php");

$data = $_POST;

// Ensure all required keys exist
if (!isset($data['id'], $data['booking_id'], $data['user_id'], $data['amount'], $data['payment_method'])) {
    http_response_code(400);
    echo json_encode(["error" => "Missing required fields"]);
    exit;
}

$payment = new Payment($data);
$payment->save($mysqli);

echo json_encode(["message" => "Payment processed"]);
?>