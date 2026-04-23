<?php

require_once __DIR__ . '/config/Database.php';

require_once __DIR__ . '/models/Author.php';
require_once __DIR__ . '/models/Book.php';

require_once __DIR__ . '/repositories/AuthorRepository.php';
require_once __DIR__ . '/repositories/BookRepository.php';

require_once __DIR__ . '/services/Validator.php';

require_once __DIR__ . '/controllers/AuthorController.php';
require_once __DIR__ . '/controllers/BookController.php';

$db = (new Database())->connect();

$authorRepository = new AuthorRepository($db);
$bookRepository = new BookRepository($db);

$authorController = new AuthorController($authorRepository);
$bookController = new BookController($bookRepository);

require_once __DIR__ . '/routes/api.php';