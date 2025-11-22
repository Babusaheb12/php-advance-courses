#!/usr/bin/env php
<?php
declare(strict_types=1);
/**
 * add.php
 * Simple addition utility.
 *
 * CLI usage:
 *   php add.php 2 3
 *   ./add.php 2 3
 *
 * Web usage:
 *   http://localhost:8000/add.php?a=2&b=3
 */

function cli_add(array $argv): int
{
    if (count($argv) < 3) {
        fwrite(STDERR, "Usage: php add.php <num1> <num2>\n");
        return 2;
    }

    $a = $argv[1];
    $b = $argv[2];

    if (!is_numeric($a) || !is_numeric($b)) {
        fwrite(STDERR, "Error: both arguments must be numeric.\n");
        return 3;
    }

    // Preserve numeric type (int/float) by using + operator
    $sum = $a + $b;
    echo $sum . PHP_EOL;
    return 0;
}

if (php_sapi_name() === 'cli') {
    exit(cli_add($argv));
}

// Web request handling
$a = $_GET['a'] ?? null;
$b = $_GET['b'] ?? null;

header('Content-Type: text/plain; charset=utf-8');

if ($a === null || $b === null) {
    http_response_code(400);
    echo "Please provide ?a=NUMBER&b=NUMBER\n";
    exit;
}

if (!is_numeric($a) || !is_numeric($b)) {
    http_response_code(400);
    echo "Error: both 'a' and 'b' must be numeric\n";
    exit;
}

echo ($a + $b) . PHP_EOL;

?>
