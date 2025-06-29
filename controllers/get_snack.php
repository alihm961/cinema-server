<?php
require_once "../models/Snack.php";
require_once "../connection/connection.php";

$snack = Snack::all($mysqli);
echo json_encode($snack);