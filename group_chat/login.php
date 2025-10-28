<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $mysqli->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($id, $hash);
    if ($stmt->fetch() && password_verify($password, $hash)) {
        $_SESSION['user_id'] = $id;
        $_SESSION['username'] = $username;
        header("Location: chat.php");
        exit;
    } else {
        $error = "Invalid username or password!";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container login-container">
    <h2 class="title">Login</h2>
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
    <form class="form" method="POST">
        <input class="input-field" name="username" placeholder="Username" required>
        <input class="input-field" name="password" type="password" placeholder="Password" required>
        <button class="btn" type="submit">Login</button>
    </form>
    <p class="link-text">Don't have an account? <a href="register.php">Register</a></p>
</div>
</body>
</html>
