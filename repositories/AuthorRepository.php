<?php

class AuthorRepository
{
    public function __construct(private PDO $db)
    {
    }

    public function getAll(): array
    {
        $stmt = $this->db->query("SELECT * FROM authors ORDER BY id ASC");
        return $stmt->fetchAll();
    }

    public function getById(int $id): array|false
    {
        $stmt = $this->db->prepare("SELECT * FROM authors WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
}