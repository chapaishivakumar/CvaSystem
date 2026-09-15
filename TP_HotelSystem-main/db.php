<?php
$host = getenv('HOTEL_DB_HOST') ?: '127.0.0.1';
$dbname = getenv('HOTEL_DB_NAME') ?: 'hotel_system';
$user = getenv('HOTEL_DB_USER') ?: 'root';
$password = getenv('HOTEL_DB_PASSWORD') ?: '';

$pdo = null;
try {
    $pdo = new PDO(
        "mysql:host={$host};dbname={$dbname};charset=utf8mb4",
        $user,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );
} catch (PDOException $exception) {
    // The public landing page can still render while the database is being configured.
    $pdo = null;
}
