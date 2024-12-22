<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if (isset($_POST['remember'])) {
        setcookie('user_id', $user['id'], time() + (86400 * 7), "/");
        setcookie('username', $user['username'], time() + (86400 * 7), "/");
    }

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['login_time'] = time();

            header('Location: index.php');
        } else {
            echo "Password salah!";
        }
    } else {
        echo "Username tidak ditemukan!";
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
    <form action="login.php" method="POST">
        <h2>Login</h2>
        <label for="username">Username</label>
        <input type="text" id="username" placeholder="Masukkan username">
        <label for="password">Password</label>
        <input type="password" id="password" placeholder="Masukkan password">
        <button type="submit">Login</button>
    </form>
    <input type="checkbox" name="remember"> Remember Me <br>
    <p>Belum punya akun?</p><a href="register.php">Daftar di sini</a>
</body>
</html>