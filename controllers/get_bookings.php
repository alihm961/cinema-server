<?php
require_once("../models/Booking.php");
require_once("../connection/connection.php");

$response = ["status" => 200];

if (!isset($_GET["id"])) {
    $items = Booking::all($mysqli);
    $response["bookings"] = [];
    foreach ($items as $item) {
        $response["bookings"][] = $item->toArray();
    }
    echo json_encode($response);
    return;
}

$id = $_GET["id"];
$item = Booking::find($mysqli, $id);
$response["booking"] = $item->toArray();
echo json_encode($response);
return;
?>