<?php

class Database
{
    private string $host = 'localhost';
    private string $dbName = 'library_db';
    private string $username = 'course_user';
    private string $password = 'StrongPassword123!';

    public function connect(): PDO
    {
        $dsn = "mysql:host={$this->host};dbname={$this->dbName};charset=utf8mb4";

        return new PDO($dsn, $this->username, $this->password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }
}