# php-advance-courses
Advanced PHP course covering OOP, exceptions, PDO, security, REST APIs, MVC, Laravel basics, Composer, PHP 8 features, web services, and real-world project development including CRUD, authentication, admin panel, and deployment. Ideal for mastering backend PHP.

## Running locally

You can run the example page in this repo with your local XAMPP Apache server. Open in the browser or use curl:

http://localhost/php-advance-courses/first/first.php

Troubleshooting: if you see an HTTP 500 error, check the PHP error log (for XAMPP it is typically at `/Applications/XAMPP/xamppfiles/logs/php_error_log`). A common cause is placing `declare(strict_types=1);` after other statements inside the PHP block — it must be the very first statement immediately after `<?php`.

If you want CLI execution with a shebang (`#!/usr/bin/env php`) keep the shebang above `<?php` but ensure `declare(strict_types=1);` is the first statement inside the PHP block.