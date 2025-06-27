<?php
require_once('Model.php');

class SnackOrder extends Model {
    public function create($booking_id, $snack_name, $quantity, $price) {
        return $this->execute(
        "INSERT INTO snack_orders (booking_id, snack_name, quantity, price) VALUES (?, ?, ?, ?)",
        [$booking_id, $snack_name, $quantity, $price], "isid"
     );
    }
}