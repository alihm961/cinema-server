<?php
require_once("../models/SnackOrder.php");
require_once("../connection/connection.php");

$data = $_POST;
$order = new SnackOrder($data);
$order->save($mysqli);
echo json_encode(["message" => "Snack order placed"]);
?>