# php-advance-courses
Advanced PHP course covering OOP, exceptions, PDO, security, REST APIs, MVC, Laravel basics, Composer, PHP 8 features, web services, and real-world project development including CRUD, authentication, admin panel, and deployment. Ideal for mastering backend PHP.

## Topics Studied (Updated: 3 December 2025)

### Basic PHP Concepts
- **First/first.php** - Basic PHP fundamentals and setup
- **First/add.php** - Simple arithmetic operations

### Object-Oriented Programming (OOP)
- **class_object/lesson_1.php** - Introduction to classes and objects
- **class_object/lesson_2thisKeybord/this.php** - Understanding the `$this` keyword in object context

### Constructors & Destructors
- **lesson_2/const_ructor.php** - Constructor implementation and usage

### Inheritance
- **inheritance/single_inheritance.php** - Single inheritance: child class inheriting from parent class
- **inheritance/Multilevel_inheritance.php** - Multilevel inheritance: chain of inheritance across multiple classes (A → B → C)
- **inheritance/hierarchical_inheritance.php** - Hierarchical inheritance: multiple classes inheriting from a single parent class

## Running locally

You can run the example page in this repo with your local XAMPP Apache server. Open in the browser or use curl:

http://localhost/php-advance-courses/first/first.php

Troubleshooting: if you see an HTTP 500 error, check the PHP error log (for XAMPP it is typically at `/Applications/XAMPP/xamppfiles/logs/php_error_log`). A common cause is placing `declare(strict_types=1);` after other statements inside the PHP block — it must be the very first statement immediately after `<?php`.

If you want CLI execution with a shebang (`#!/usr/bin/env php`) keep the shebang above `<?php` but ensure `declare(strict_types=1);` is the first statement inside the PHP block.

## Database connection (MySQL)

This repository includes a simple database configuration file at `Api/config.php` that creates a MySQL connection using the procedural `mysqli` API. Example content:

```php
<?php
// Api/config.php
$conn = mysqli_connect("localhost", "root", "", "demo") or die("Connection Failed: " . mysqli_connect_error());
?>
```

How to use the connection in your scripts:

1. Include the config file at the top of your PHP script:

```php
require_once __DIR__ . '/Api/config.php';
// now $conn is available for queries
$result = mysqli_query($conn, "SELECT * FROM users");
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['id'] . ': ' . $row['name'] . "\n";
}
```

2. PDO alternative (recommended for prepared statements and portability):

```php
<?php
// PDO example (create a separate db_pdo.php or replace config.php if you prefer)
$dsn = 'mysql:host=127.0.0.1;dbname=demo;charset=utf8mb4';
$user = 'root';
$pass = '';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die('DB Connection failed: ' . $e->getMessage());
}

// usage
$stmt = $pdo->query('SELECT * FROM users');
foreach ($stmt as $row) {
    echo $row['id'] . ': ' . $row['name'] . "\n";
}
?>
```

Security notes:
- Do not commit real credentials to public repos. Use environment variables or a separate local-only config for production credentials.
- Prefer prepared statements (PDO or mysqli prepared statements) to avoid SQL injection.

## REST API Documentation (Swagger/OpenAPI)

### View Interactive API Docs

Access the interactive API documentation at:

**http://localhost/php-advance-courses/api-docs.html**

This page displays a Swagger UI interface that allows you to:
- View all available API endpoints
- See request/response formats with examples
- Test endpoints directly from the browser
- Download API specifications

### Available Endpoints

#### 1. Fetch All Students

**Endpoint:** `GET /Api/fetchAllData.php`

**Description:** Retrieve all student records from the database as JSON

**Base URL:** `http://localhost/php-advance-courses`

**Example Request:**
```bash
curl -X GET "http://localhost/php-advance-courses/Api/fetchAllData.php" \
  -H "Accept: application/json"
```

**Success Response (200):**
```json
[
  {
    "id": 1,
    "name": "John Doe",
    "email": "john@example.com",
    "phone": "1234567890",
    "enrollment_date": "2025-01-01"
  },
  {
    "id": 2,
    "name": "Jane Smith",
    "email": "jane@example.com",
    "phone": "0987654321",
    "enrollment_date": "2025-01-05"
  }
]
```

**Empty Response (200):**
```json
{
  "message": "No Records Found",
  "status": false
}
```

### Using Postman or Insomnia

To test the API in Postman:
1. Import the Swagger spec: Open Postman → File → Import → Select `swagger.json` from the repo
2. Create a new GET request to `http://localhost/php-advance-courses/Api/fetchAllData.php`
3. Send the request and view the response

### API Response Headers

All API responses include:
- `Content-Type: application/json` — Response is in JSON format
- `Access-Control-Allow-Origin: *` — CORS enabled for all origins

### Error Handling

If a query fails, you'll see:
```json
{
  "error": "Query Failed: [MySQL Error Details]"
}
```

Check the PHP error log at `/Applications/XAMPP/xamppfiles/logs/php_error_log` for debugging.

### OpenAPI Specification File

The full OpenAPI 3.0 specification is available at `swagger.json` in the repository root. This file documents:
- All endpoints and HTTP methods
- Request/response schemas
- Data types and field descriptions
- Example payloads
- Error responses

You can use this file with any OpenAPI-compatible tool (Postman, Insomnia, ReDoc, etc.).
