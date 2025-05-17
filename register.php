<?php
session_start();
include "config.php";

$error = "";

if(  isset($_SESSION["user"])&&$_SESSION["user"]!=="") {
    header("Location: /dashboard.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Email không hợp lệ!";
    } elseif ($password !== $confirm_password) {
        $error = "Mật khẩu xác nhận không khớp!";
    } else {
            $_SESSION["user"] = $email;
            header("Location: success.php");
            exit();
        }
    }

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <form action="" method="POST">
            <div class="space-y-4">
                <h2>Đăng Ký</h2>
            </div>
            <?php if (!empty($error)): ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>
            <div class="input-group">
                <span class="icon">
                    <ion-icon name="person"></ion-icon>
                </span>
                <input type="text" name="fullname" placeholder="Họ và Tên" required>
            </div>
            <div class="input-group">
                <span class="icon">
                    <ion-icon name="mail"></ion-icon>
                </span>
                <input type="text" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <span class="icon">
                    <ion-icon name="lock-closed"></ion-icon>
                </span>
                <input type="password" name="password" placeholder="Mật khẩu" required>
            </div>
            <div class="input-group">
                <span class="icon">
                    <ion-icon name="lock-closed"></ion-icon>
                </span>
                <input type="password" name="confirm_password" placeholder="Xác nhận lại mật khẩu" required>
            </div>
            <div class="forgot-pass">
                <a href="reset-password.php">Quên mật khẩu?</a>
            </div>
            <button type="submit" class="btn">Đăng Ký</button>
            <div class="sign-link">
                <p>Đã có tài khoản? <a href="login.php" class="register-link">Đăng Nhập</a></p>
            </div>
        </form>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>