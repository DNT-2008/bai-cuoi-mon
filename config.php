<?php
$servername = "localhost";
$username = "root"; // Mặc định của XAMPP
$password = ""; // Mặc định của XAMPP
$dbname = "user_db";

// Kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
