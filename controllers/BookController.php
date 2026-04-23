<?php

class BookController
{
    public function __construct(private BookRepository $bookRepository)
    {
    }

    public function index(): void
    {
        http_response_code(200);
        echo json_encode($this->bookRepository->getAll(), JSON_UNESCAPED_UNICODE);
    }

    public function show(int $id): void
    {
        $book = $this->bookRepository->getById($id);

        if (!$book) {
            http_response_code(404);
            echo json_encode(['message' => 'Книгу не знайдено'], JSON_UNESCAPED_UNICODE);
            return;
        }

        http_response_code(200);
        echo json_encode($book, JSON_UNESCAPED_UNICODE);
    }

    public function store(array $data): void
    {
        $errors = Validator::validateBook($data);

        if (!empty($errors)) {
            http_response_code(422);
            echo json_encode(['errors' => $errors], JSON_UNESCAPED_UNICODE);
            return;
        }

        $this->bookRepository->create($data);

        http_response_code(201);
        echo json_encode(['message' => 'Книгу успішно додано'], JSON_UNESCAPED_UNICODE);
    }

    public function update(int $id, array $data): void
    {
        $existing = $this->bookRepository->getById($id);

        if (!$existing) {
            http_response_code(404);
            echo json_encode(['message' => 'Книгу не знайдено'], JSON_UNESCAPED_UNICODE);
            return;
        }

        $errors = Validator::validateBook($data);

        if (!empty($errors)) {
            http_response_code(422);
            echo json_encode(['errors' => $errors], JSON_UNESCAPED_UNICODE);
            return;
        }

        $this->bookRepository->update($id, $data);

        http_response_code(200);
        echo json_encode(['message' => 'Книгу успішно оновлено'], JSON_UNESCAPED_UNICODE);
    }

    public function destroy(int $id): void
    {
        $existing = $this->bookRepository->getById($id);

        if (!$existing) {
            http_response_code(404);
            echo json_encode(['message' => 'Книгу не знайдено'], JSON_UNESCAPED_UNICODE);
            return;
        }

        $this->bookRepository->delete($id);

        http_response_code(200);
        echo json_encode(['message' => 'Книгу успішно видалено'], JSON_UNESCAPED_UNICODE);
    }
}