# php-advance-courses
Advanced PHP course covering OOP, exceptions, PDO, security, REST APIs, MVC, Laravel basics, Composer, PHP 8 features, web services, and real-world project development including CRUD, authentication, admin panel, and deployment. Ideal for mastering backend PHP.

## Topics Studied (Updated: 27 November 2025)

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
