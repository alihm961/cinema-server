<?php

require_once(__DIR__ . "/Model.php");

class Seat extends Model {
    protected int $id;
    protected string $seat_number;
    protected string $screen;

    protected static string $table = "seats";

    public function __construct(array $data) {
        $this->id = $data['id'] ?? 0;
        $this->seat_number = $data['seat_number'] ?? '';
        $this->screen = $data['screen'] ?? '';
    }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'seat_number' => $this->seat_number,
            'screen' => $this->screen,
        ];
    }

    public function save(mysqli $mysqli): bool {
        $sql = "INSERT INTO seats (id, seat_number, screen) VALUES (?, ?, ?)";
        $stmt = $mysqli->prepare($sql);

        if (!$stmt) {
            throw new Exception("Prepare failed: " . $mysqli->error);
        }

        $stmt->bind_param("iss", $this->id, $this->seat_number, $this->screen);
        return $stmt->execute();
    }
}