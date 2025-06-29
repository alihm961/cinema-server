<?php
require_once ("Model.php");

class Showtime extends Model {
    protected static string $table = "showtimes";

    public int $movie_id;
    public string $datetime;

    public function __construct($data = []) {
        $this->movie_id = $data["movie_id"] ?? 0;
        $this->datetime = $data["datetime"] ?? "";
    }

    public function toArray(): array {
        return [
            "movie_id" => $this->movie_id,
            "datetime" => $this->datetime
        ];
    }
}
?>