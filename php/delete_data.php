<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require 'db.php';

header('Content-Type: application/json');

// make sure someone is actually logged in
if (!isset($_SESSION['user_id'])) {
    http_response_code(403);
    echo json_encode(['error' => 'You must be logged in to do this.']);
    exit;
}

$user_id = $_SESSION['user_id'];

// log the deletion request as pending - actual deletion happens once an admin approves it
$stmt = $pdo->prepare("INSERT INTO data_requests (user_id, type, status) VALUES (?, 'delete', 'pending')");
$stmt->execute([$user_id]);

echo json_encode(['message' => 'Your deletion request has been submitted and is pending admin approval.']);
?>