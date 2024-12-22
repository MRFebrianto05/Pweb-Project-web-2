<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'altam_db';

$conn = new mysqli($host, $user, $password, $database);

if ($conn -> connect_error) {
	die("koneksi gagal: ". $conn -> connect_error);
}
?>

