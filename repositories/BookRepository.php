<?php

class BookRepository
{
    public function __construct(private PDO $db)
    {
    }

    public function getAll(): array
    {
        $sql = "SELECT b.*, a.name AS author_name
                FROM books b
                JOIN authors a ON b.author_id = a.id
                ORDER BY b.id ASC";
        return $this->db->query($sql)->fetchAll();
    }

    public function getById(int $id): array|false
    {
        $sql = "SELECT b.*, a.name AS author_name
                FROM books b
                JOIN authors a ON b.author_id = a.id
                WHERE b.id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create(array $data): bool
    {
        $sql = "INSERT INTO books (title, author_id, genre, publish_year, available)
                VALUES (:title, :author_id, :genre, :publish_year, :available)";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'title' => $data['title'],
            'author_id' => $data['author_id'],
            'genre' => $data['genre'] ?? null,
            'publish_year' => $data['publish_year'] ?? null,
            'available' => $data['available'] ?? 1,
        ]);
    }

    public function update(int $id, array $data): bool
    {
        $sql = "UPDATE books
                SET title = :title,
                    author_id = :author_id,
                    genre = :genre,
                    publish_year = :publish_year,
                    available = :available
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'id' => $id,
            'title' => $data['title'],
            'author_id' => $data['author_id'],
            'genre' => $data['genre'] ?? null,
            'publish_year' => $data['publish_year'] ?? null,
            'available' => $data['available'] ?? 1,
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM books WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}