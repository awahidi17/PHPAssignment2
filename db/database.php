<?php
// db/database.php
// Update dbname if your database name is different.
$dsn = 'mysql:host=localhost;dbname=tech_support;charset=utf8mb4';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
    exit;
}
