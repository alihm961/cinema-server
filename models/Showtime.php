<?php
require_once(__DIR__ . "/Model.php");

class Showtime extends Model {
    private int $id;
    private int $movie_id;
    private string $show_date;
    private string $show_time;
    private string $screen;

    protected static string $table = "showtimes";

    public function __construct(array $data) {
        $this->id = $data['id'] ?? 0;
        $this->movie_id = $data['movie_id'];
        $this->show_date = $data['show_date'];
        $this->show_time = $data['show_time'];
        $this->screen = $data['screen'];
    }


    public function toArray() {
        return[
            'id' => $this->id,
            'movie_id' => $this->movie_id,
            'show_date' => $this->show_date,
            'show_time' => $this->show_time,
            'screen' => $this->screen
        ];
    }
}