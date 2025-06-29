<?php
require_once "../models/Payment.php";
require_once "../connection/connection.php";

$data = json_decode(file_get_contents("php://input"), true);

foreach ($data["payers"] as $userId) {
    $payment = new Payment([
        "booking_id" => $data["booking_id"],
        "user_id" => $userId,
        "amount" => $data["total_amount"] / count($data["payers"]),
        "status" => "pending"
    ]);
    $payment->save($mysqli);
}

echo json_encode(["status" => 200, "message" => "Payments created"]);