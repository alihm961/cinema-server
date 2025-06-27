<?php
require_once(__DIR__ . "/Model.php");

class Booking extends Model {
    private int $id;
    private int $user_id;
    private int $seat_id;
    private int $showtime_id;
    private int $created_at;

    protected static string $table = "bookings";

    public function __construct(array $data) {
        $this->id = $data['id'] ?? 0;
        $this->user_id = $data['user_id'];
        $this->seat_id = $data['seat_id'];
        $this->showtime_id = $data['showtime_id'];
        $this->created_at = $data['created_at'] ?? date('y-m-d H:i:s');
    }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'seat_id' => $this->seat_id,
            'showtime_id' => $this->showtime_id,
            'created_at' => $this->created_at,
        ];
    }
}