<?php
require_once "../models/Showtime.php";
require_once "../connection/connection.php";

$showtimes = Showtime::all($mysqli);
echo json_encode($showtimes);