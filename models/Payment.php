<?php
require_once('Model.php');

class Payment extends Model {
    public function create($booking_id, $user_id, $amount) {
        return $this->execute(
            "INSERT INTO payments (booking_id, user_id, amount) VALUES (?, ?, ?)",
            [$booking_id, $user_id, $amount], "iid"
        );
    }
}