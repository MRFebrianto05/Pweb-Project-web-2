<?php
session_start();

if (!isset($_SESSION['user_id']) && isset($_COOKIE['user_id'])) {
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['username'] = $_COOKIE['username'];
}

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); 
    exit;
}

require 'db.php';

$user_id = $_SESSION['user_id'];
$sql = "SELECT username FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

echo date('d-m-Y H:i:s', $_SESSION['login_time']) . "<br>";
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Altam</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Altam</h1>
    <nav class="navbar">
        <ul class="nav-list">
          <li><a href="#">Beranda</a></li>
          <li><a href="#">Jelajahi</a></li>
          <li><a href="#">Pembaruan</a></li>
          <li><a href="#">Akun</a></li>
        </ul>
      </nav>
    <input type="text" placeholder="Search...">
    <a href="profile.php"><?php echo $user['username']; ?></a>
    <a href="logout.php">logout</a>
  </header>
  <div class="grid-container">
    <!-- Card items will be here -->
    <div class="card">
      <img src="image1.jpg" alt="Sample Image">
    </div>
    <div class="card">
        <img src="image2.jpg" alt="Sample Image">
        <p>Description of the image</p>
    </div>
    <div class="card">
        <img src="image3.jpg" alt="Sample Image">
        <p>Description of the image</p>
    </div>
    <div class="card">
        <img src="image4.jpg" alt="Sample Image">
        <p>Description of the image</p>
    </div>
    <div class="card">
        <img src="image5.jpg" alt="Sample Image">
        <p>Description of the image</p>
    </div>
    <div class="card">
        <img src="image6.jpg" alt="Sample Image">
        <p>Description of the image</p>
    </div>
    <div class="card">
        <img src="image7.jpg" alt="Sample Image">
        <p>Description of the image</p>
    </div>
    <div class="card">
        <img src="image8.jpg" alt="Sample Image">
        <p>Description of the image</p>
    </div>
    <div class="card">
        <img src="image9.jpg" alt="Sample Image">
        <p>Description of the image</p>
    </div>
    <div class="card">
        <img src="image10.jpg" alt="Sample Image">
        <p>Description of the image</p>
    </div>
    <div class="card">
        <img src="image11.jpg" alt="Sample Image">
        <p>Description of the image</p>  
    </div>
    <div class="card">
        <img src="image12.jpg" alt="Sample Image">
        <p>Description of the image</p>
    </div>
    <div class="card">
        <img src="image13.jpg" alt="Sample Image">
        <p>Description of the image</p>
    </div>
    <div class="card">
        <img src="image14.jpg" alt="Sample Image">
        <p>Description of the image</p>
    </div>
    <div class="card">
        <img src="image15.jpg" alt="Sample Image">
        <p>Description of the image</p>
    </div>
    <div class="card">
        <img src="image16.jpg" alt="Sample Image">
        <p>Description of the image</p>
    </div>
    <!-- Additional cards here -->
  </div>
  <script src="script.js"></script>
</body>
</html>
