<?php
// simple database connection using pdo
// connects to the mysql container set up by himanshu

$host = 'mysql';
$db_name = 'app_db';
$username = 'app_user';
$password = 'app_pass';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>