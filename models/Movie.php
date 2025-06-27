<?php
require(__DIR__ . '/Model.php');

class Movie extends Model {
    private int $id;
    private string $title;
    private ?string $genre;
    private ?string $rating;
    private ?string $trailer_url;
    private ?string $description;

    protected static string $table = "movies";

    public function __construct(array $data) {
        $this->id = $data['id'] ?? 0;
        $this->title = $data['title'];
        $this->genre = $data['genre'] ?? null;
        $this->rating = $data['rating'] ?? null;
        $this->trailer_url = $data['trailer_url'] ?? null;
        $this->description = $data['description'] ?? null;
    }

    public function toArray(): array{
        return[
            'id' => $this->id,
            'title' => $this->title,
            'genre' => $this->genre,
            'rating' => $this->rating,
            'trailer_url' => $this->trailer_url,
            'description' => $this->description
        ];
    }
}