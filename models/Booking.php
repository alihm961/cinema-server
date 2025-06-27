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

    public function getByUserId($user_id) {
        return $this->fetchAll("
        SELECT b.id, b.total_price, m.title, s.show_date, s.show_time FROM bookings b JOIN showtimes s ON b.showtime_id = s.id 
        JOIN movies m ON s.movie_id = m.id WHERE b.user_id = ? ORDER BY s.show_date, s.show_time", [$user_id], "i");
    }
}