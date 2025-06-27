<?php
require_once(__DIR__ . "/Model.php");


class Showtime extends Model {
    protected int $id;
    protected int $movie_id;
    protected string $show_date;
    protected string $show_time;
    protected string $screen;

    protected static string $table = "showtimes";

    public function __construct(array $data) {
    $this->id = $data['id'] ?? 0;
    $this->movie_id = isset($data['movie_id']) ? (int)$data['movie_id'] : 0;
    $this->show_date = $data['show_date'] ?? '';
    $this->show_time = $data['start_time'] ?? '';
    $this->screen = $data['screen'] ?? '';
}

    public function toArray() {
        return [
            'id' => $this->id,
            'movie_id' => $this->movie_id,
            'show_date' => $this->show_date,
            'show_time' => $this->show_time,
            'screen' => $this->screen,
        ];
    }
}