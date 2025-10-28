<?php
session_start();
require 'config.php';

$current_user_id = $_SESSION['user_id'];

$query = "
SELECT messages.id, messages.user_id, messages.message, messages.created_at, users.username
FROM messages
JOIN users ON messages.user_id = users.id
ORDER BY messages.created_at ASC
";

$result = $mysqli->query($query);
$messages = [];
while ($row = $result->fetch_assoc()) {
    $row['is_self'] = ($row['user_id'] == $current_user_id) ? true : false;
    $messages[] = $row;
}

header('Content-Type: application/json');
echo json_encode($messages);
