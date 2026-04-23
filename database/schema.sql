USE library_db;

CREATE TABLE authors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    birth_year INT NULL
);

CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author_id INT NOT NULL,
    genre VARCHAR(100) NULL,
    publish_year INT NULL,
    available TINYINT(1) DEFAULT 1,
    CONSTRAINT fk_books_author
        FOREIGN KEY (author_id) REFERENCES authors(id)
        ON DELETE CASCADE
);

INSERT INTO authors (name, birth_year) VALUES
('Тарас Шевченко', 1814),
('Іван Франко', 1856),
('Леся Українка', 1871);

INSERT INTO books (title, author_id, genre, publish_year, available) VALUES
('Кобзар', 1, 'Поезія', 1840, 1),
('Захар Беркут', 2, 'Повість', 1883, 1),
('Лісова пісня', 3, 'Драма-феєрія', 1911, 1);