<?php
require_once(__DIR__ . '/../models/Booking.php');

$user_id = $_GET['user_id'] ?? null;

if(!$user_id) {
    echo json_encode(['status' => 400, 'message' => 'Missing user_id']);
    exit;
}

$bookings = Booking::getByUserId($user_id);
echo json_encode(['status' => 200, 'bookings' => $bookings]);