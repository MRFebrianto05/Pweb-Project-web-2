<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

$sql = "DELETE FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);

if ($stmt->execute()) {
    session_destroy();
    echo "Akun berhasil dihapus. <a href='register.php'>Register lagi</a>";
} else {
    echo "Gagal menghapus akun.";
}
?>
