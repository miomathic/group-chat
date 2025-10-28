<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Group Chat</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container chat-container">
    <div class="chat-header">
        <h2 class="title">Welcome, <?= htmlspecialchars($_SESSION['username']) ?></h2>
        <a class="logout-btn" href="logout.php">Logout</a>
    </div>

    <div id="chat-box" class="chat-box"></div>

    <form id="chat-form" class="chat-form">
        <input id="message" class="chat-input" type="text" placeholder="Type your message" autocomplete="off" required>
        <button class="btn chat-send-btn" type="submit">Send</button>
    </form>
</div>

<script src="js/script.js"></script>
</body>
</html>
