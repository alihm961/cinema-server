<?php
require_once("../models/Seat.php");
require_once("../connection/connection.php");

$response = ["status" => 200];

if (!isset($_GET["id"])) {
    $items = Seat::all($mysqli);
    $response["seats"] = [];
    foreach ($items as $item) {
        $response["seats"][] = $item->toArray();
    }
    echo json_encode($response);
    return;
}

$id = $_GET["id"];
$seat = Seat::find($mysqli, $id);
$response["seat"] = $seat ? $seat->toArray() : null;
echo json_encode($response);
return;
?>