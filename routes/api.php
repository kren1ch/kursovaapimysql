<?php

$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$basePath = '/coursework_api';
$path = str_replace($basePath, '', $uri);
$path = trim($path, '/');
$segments = $path === '' ? [] : explode('/', $path);

header('Content-Type: application/json; charset=utf-8');

switch ($segments[0] ?? '') {
    case 'authors':
        if ($method === 'GET' && count($segments) === 1) {
            $authorController->index();
            exit;
        }

        if ($method === 'GET' && count($segments) === 2 && is_numeric($segments[1])) {
            $authorController->show((int)$segments[1]);
            exit;
        }
        break;

    case 'books':
        if ($method === 'GET' && count($segments) === 1) {
            $bookController->index();
            exit;
        }

        if ($method === 'GET' && count($segments) === 2 && is_numeric($segments[1])) {
            $bookController->show((int)$segments[1]);
            exit;
        }

        if ($method === 'POST' && count($segments) === 1) {
            $data = json_decode(file_get_contents('php://input'), true) ?? [];
            $bookController->store($data);
            exit;
        }

        if ($method === 'PUT' && count($segments) === 2 && is_numeric($segments[1])) {
            $data = json_decode(file_get_contents('php://input'), true) ?? [];
            $bookController->update((int)$segments[1], $data);
            exit;
        }

        if ($method === 'DELETE' && count($segments) === 2 && is_numeric($segments[1])) {
            $bookController->destroy((int)$segments[1]);
            exit;
        }
        break;
}

http_response_code(404);
echo json_encode(['message' => 'Маршрут не знайдено'], JSON_UNESCAPED_UNICODE);