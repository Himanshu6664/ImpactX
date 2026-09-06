<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require 'db.php';

// make sure someone is actually logged in before giving out data
if (!isset($_SESSION['user_id'])) {
    http_response_code(403);
    echo json_encode(['error' => 'You must be logged in to do this.']);
    exit;
}

$user_id = $_SESSION['user_id'];

// log that this export request happened
$stmt = $pdo->prepare("INSERT INTO data_requests (user_id, type, status) VALUES (?, 'export', 'pending')");
$stmt->execute([$user_id]);

// grab the user's own data to show them
$stmt = $pdo->prepare("SELECT username, email, created_at FROM users WHERE user_id = ?");
$stmt->execute([$user_id]);
$userData = $stmt->fetch(PDO::FETCH_ASSOC);

// send it back as json, same as we did in the django version
header('Content-Type: application/json');
echo json_encode($userData);
?>