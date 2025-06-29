<?php
require_once ("Model.php");

class Booking extends Model {
    protected static string $table = "bookings";

    public int $user_id;
    public int $showtime_id;
    public string $seat_number;
    public string $status;

    public function __construct($data = []) {
        $this->user_id = $data["user_id"] ?? 0;
        $this->showtime_id = $data["showtime_id"] ?? 0;
        $this->seat_number = $data["seat_number"] ?? "";
        $this->status = $data["status"] ?? "confirmed";
    }

    public function toArray(): array {
        return [
            "user_id" => $this->user_id,
            "showtime_id" => $this->showtime_id,
            "seat_number" => $this->seat_number,
            "status" => $this->status
        ];
    }
}
?>