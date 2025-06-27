<?php
require_once("../models/User.php");
require_once("../connection/connection.php");

$response = ["status" => 200];

if (!isset($_GET["id"])) {
    $items = User::all($mysqli);
    $response["users"] = [];
    foreach ($items as $item) {
        $response["users"][] = $item->toArray();
    }
    echo json_encode($response);
    return;
}

$id = $_GET["id"];
$item = User::find($mysqli, $id);
$response["user"] = $item->toArray();
echo json_encode($response);
return;
?>