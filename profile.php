<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET username = ?, email = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssi', $username, $email, $user_id);
}

$user_id = isset($_GET['id']) ? intval($_GET['id']) : $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

if (!$user) {
    echo "pengguna tidak ditemukan";
    exit;
}
?>

<h2>Profil</h2>
<!-- <form method="POST"> -->
    <!-- Username: <input type="text" name="username" value="<?php echo $user['username']; ?>" required><br> -->
    <!-- Email: <input type="email" name="email" value="<?php echo $user['email']; ?>" required><br> -->
    Username: <?php echo $user['username']; ?> <br>
    Email: <?php echo $user['email']; ?> <br>
    <button onclick="window.location.href='profile_view.php';">Update Profil</button> <br>
<!-- </form> -->
<a href="delete.php">Hapus Akun</a> | <a href="logout.php">Logout</a> | <a href="index.php">kembali</a>
