# 📚 REST API для системи обліку книг

## 📖 Опис проєкту

Даний проєкт є реалізацією REST API для системи обліку книг, розробленого з використанням об’єктно-орієнтованого підходу (ООП) та СУБД MySQL.

API дозволяє виконувати основні операції над даними (CRUD):

* отримання списку книг та авторів
* додавання нових книг
* оновлення інформації про книги
* видалення книг

Проєкт розроблений в рамках курсової роботи.

---

## 🛠️ Використані технології

* PHP (ООП)
* MySQL
* Apache2
* Ubuntu Server 24.04 (VirtualBox)
* Postman (для тестування API)
* Git / GitHub

---

## ⚙️ Як запустити проєкт

### 1. Клонувати репозиторій

```bash
git clone https://github.com/ТВОЙ_ЛОГИН/coursework_api.git
cd coursework_api
```

### 2. Розмістити проєкт у веб-сервері

Скопіювати файли в директорію:

```bash
/var/www/html/coursework_api
```

---

### 3. Налаштувати базу даних MySQL

Увійти в MySQL:

```bash
sudo mysql
```

Створити базу та користувача:

```sql
CREATE DATABASE library_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE USER 'course_user'@'localhost' IDENTIFIED BY 'StrongPassword123!';
GRANT ALL PRIVILEGES ON library_db.* TO 'course_user'@'localhost';

FLUSH PRIVILEGES;
EXIT;
```

---

### 4. Імпортувати структуру БД

```bash
mysql -u course_user -p library_db < database/schema.sql
```

---

### 5. Налаштувати підключення до БД

Відкрити файл:

```bash
config/Database.php
```

і вказати свої дані:

```php
private string $host = 'localhost';
private string $dbName = 'library_db';
private string $username = 'course_user';
private string $password = 'StrongPassword123!';
```

---

### 6. Запустити Apache

```bash
sudo systemctl restart apache2
```

---

## 🌐 Базовий URL API

```text
http://192.168.0.102/coursework_api/
```

або (якщо використовується port forwarding):

```text
http://127.0.0.1:8080/coursework_api/
```

---

## 📡 Доступні маршрути API

### 🔹 Автори

Отримати всіх авторів:

```http
GET /coursework_api/authors
```

Отримати одного автора:

```http
GET /coursework_api/authors/{id}
```

---

### 🔹 Книги

Отримати всі книги:

```http
GET /coursework_api/books
```

Отримати книгу за ID:

```http
GET /coursework_api/books/{id}
```

---

### ➕ Додати книгу

```http
POST /coursework_api/books
Content-Type: application/json
```

Body:

```json
{
  "title": "Енеїда",
  "author_id": 1,
  "genre": "Поема",
  "publish_year": 1798,
  "available": 1
}
```

---

### ✏️ Оновити книгу

```http
PUT /coursework_api/books/{id}
Content-Type: application/json
```

---

### ❌ Видалити книгу

```http
DELETE /coursework_api/books/{id}
```

---

## 🧪 Тестування

API тестується за допомогою Postman.

Приклади тестів:

* GET /books
* POST /books
* PUT /books/{id}
* DELETE /books/{id}

---

## 📌 Примітки

* Всі дані передаються у форматі JSON
* API повертає HTTP статус-коди:

  * 200 — успіх
  * 201 — створено
  * 404 — не знайдено
  * 422 — помилка валідації

---

## 👨‍💻 Автор

Студент: Войтицький Владислав
Група: КБ 6/24

---
