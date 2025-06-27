<?php

require_once(__DIR__ . '/../models/Seat.php');
require_once(__DIR__ . '/../connection/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $seat = new Seat([
        'id' => $_POST['id'] ?? 0,
        'seat_number' => $_POST['seat_number'] ?? '',
        'screen' => $_POST['screen'] ?? ''
    ]);

    try {
        $seat->save($mysqli);
        echo json_encode(['status' => 'success', 'data' => $seat->toArray()]);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Only POST allowed']);
}