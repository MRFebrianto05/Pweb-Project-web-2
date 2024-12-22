<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $username, $email, $password);

    if ($stmt->execute()) {
        $_SESSION['user_id'] = $stmt->insert_id;
        header('location: index.php');
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="pendaftaran.css">
</head>
<body>
<form action="register.php" method="POST">
        <h2>Register</h2>
        <label for="username">Username</label>
        <input type="text" id="username" placeholder="Masukkan username">
        <label for="email">Email</label>
        <input type="text" id="email" placeholder="Masukkan username">
        <label for="password">Password</label>
        <input type="password" id="password" placeholder="Masukkan password">
        <button type="submit">Login</button>
    </form>
    <p>Sudah punya akun?</p><a href="login.php">Login di sini</a>
</body>
</html>
