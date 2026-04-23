<?php

class Author
{
    public ?int $id;
    public string $name;
    public ?int $birth_year;

    public function __construct(?int $id, string $name, ?int $birth_year)
    {
        $this->id = $id;
        $this->name = $name;
        $this->birth_year = $birth_year;
    }
}