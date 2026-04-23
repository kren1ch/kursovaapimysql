<?php

class AuthorController
{
    public function __construct(private AuthorRepository $authorRepository)
    {
    }

    public function index(): void
    {
        http_response_code(200);
        echo json_encode($this->authorRepository->getAll(), JSON_UNESCAPED_UNICODE);
    }

    public function show(int $id): void
    {
        $author = $this->authorRepository->getById($id);

        if (!$author) {
            http_response_code(404);
            echo json_encode(['message' => 'Автор не знайдений'], JSON_UNESCAPED_UNICODE);
            return;
        }

        http_response_code(200);
        echo json_encode($author, JSON_UNESCAPED_UNICODE);
    }
}