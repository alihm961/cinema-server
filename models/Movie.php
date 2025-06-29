<?php
require_once ("Model.php");

class Movie extends Model {
    protected static string $table = "movies";

    public string $title;
    public string $genre;
    public string $poster_url;
    public string $trailer_url;

    public function __construct($data = []) {
        $this->title = $data["title"] ?? "";
        $this->genre = $data["genre"] ?? "";
        $this->poster_url = $data["poster_url"] ?? "";
        $this->trailer_url = $data["trailer_url"] ?? "";
    }

    public function toArray(): array {
        return [
            "title" => $this->title,
            "genre" => $this->genre,
            "poster_url" => $this->poster_url,
            "trailer_url" => $this->trailer_url
        ];
    }
}
?>