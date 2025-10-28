<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];

    if ($username && $password && $repeat_password) {
        if ($password !== $repeat_password) {
            $error = "Passwords do not match!";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $mysqli->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $hash);
            if ($stmt->execute()) {
                $_SESSION['user_id'] = $stmt->insert_id;
                $_SESSION['username'] = $username;
                header("Location: chat.php");
                exit;
            } else {
                $error = "Username already exists!";
            }
            $stmt->close();
        }
    } else {
        $error = "Please fill all fields!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container register-container">
    <h2 class="title">Register</h2>
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
    <form class="form" method="POST">
        <input class="input-field" name="username" placeholder="Username" required>
        <input class="input-field" name="password" type="password" placeholder="Password" required>
        <input class="input-field" name="repeat_password" type="password" placeholder="Repeat Password" required>
        <button class="btn" type="submit">Register</button>
    </form>
    <p class="link-text">Already have an account? <a href="login.php">Login</a></p>
</div>
</body>
</html>
