<?php
require_once(__DIR__ . "/Model.php");

class Booking extends Model {
    private int $id;
    private int $user_id;
    private int $showtime_id;
    private float $total_price;

    protected static string $table = "bookings";

    public function __construct(array $data) {
        $this->id = $data['id'] ?? 0;
        $this->user_id = $data['user_id'];
        $this->showtime_id = $data['showtime_id'];
        $this->total_price = $data['total_price'];
    }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'showtime_id' => $this->showtime_id,
            'total_price' => $this->total_price,
        ];
    }
}