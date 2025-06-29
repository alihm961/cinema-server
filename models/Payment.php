<?php
require_once ("Model.php");

class Payment extends Model {
    protected static string $table = "payments";

    public int $booking_id;
    public int $user_id;
    public float $amount;
    public string $status;

    public function __construct($data = []) {
        $this->booking_id = $data["booking_id"] ?? 0;
        $this->user_id = $data["user_id"] ?? 0;
        $this->amount = $data["amount"] ?? 0.0;
        $this->status = $data["status"] ?? "pending";
    }

    public function toArray(): array {
        return [
            "booking_id" => $this->booking_id,
            "user_id" => $this->user_id,
            "amount" => $this->amount,
            "status" => $this->status
        ];
    }
}
?>