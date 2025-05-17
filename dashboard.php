<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
        <a href="#" class="logo">
            <img src="image.jpg" alt="Logo" class="logo-img">
        </a>
        <nav>
        <a href="index.php" class="active">Trang chủ</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="logout.php">Đăng Xuất</a>
            <?php else: ?>
                <a href="products/index.php">Sản phẩm</a>
                <a href="products/profile.php">Người dùng</a>
                <a href="logout.php">Đăng Xuất</a>
            <?php endif; ?>
        </nav>
    </header>
    <div class="container">
            <h1>Chào Mừng Đến Với <span>TSHOP</span></h1>
            <p>Đăng xuất</p>
</body>
</html>