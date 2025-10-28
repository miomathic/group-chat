<?php
$host = 'localhost';
$user = 'root';
$pass = 'root';
$db   = 'chat_app';

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_errno) {
    die("Connection failed: " . $mysqli->connect_error);
}

$mysqli->set_charset("utf8mb4");
