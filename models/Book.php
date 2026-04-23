<?php

class Book
{
    public ?int $id;
    public string $title;
    public int $author_id;
    public ?string $genre;
    public ?int $publish_year;
    public int $available;

    public function __construct(
        ?int $id,
        string $title,
        int $author_id,
        ?string $genre,
        ?int $publish_year,
        int $available = 1
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->author_id = $author_id;
        $this->genre = $genre;
        $this->publish_year = $publish_year;
        $this->available = $available;
    }
}