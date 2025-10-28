<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id']) || !isset($_POST['message'])) {
    http_response_code(403);
    exit;
}

$message = trim($_POST['message']);
if ($message !== '') {
    $stmt = $mysqli->prepare("INSERT INTO messages (user_id, message) VALUES (?, ?)");
    $stmt->bind_param("is", $_SESSION['user_id'], $message);
    $stmt->execute();
    $stmt->close();
}
