<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên Hệ</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    echo "<p>Cảm ơn $name, chúng tôi đã nhận được tin nhắn của bạn!</p>";
}
?>

<div class="wrapper">
    <form action="" method="POST">
        <div class="space-y-4">
            <h2>Liên hệ với chúng tôi</h2>

            <div class="input-group">
                <span class="icon">
                    <ion-icon name="person"></ion-icon>
                </span>
                <input type="text" name="name" placeholder="Họ và Tên" required>
            </div>

            <div class="input-group">
                <span class="icon">
                    <ion-icon name="mail"></ion-icon>
                </span>
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <div class="input-group">
                <span class="icon">
                    <ion-icon name="chatbubble"></ion-icon>
                </span>
                <input type="text" name="subject" placeholder="Chủ đề" required>
            </div>

            <div class="input-group">
                <span class="icon">
                    <ion-icon name="document-text"></ion-icon>
                </span>
                <input type="text" name="message" placeholder="Nội dung" required>
            </div>

            <button type="submit" class="btn">Gửi tin nhắn</button>
        </div>
    </form>
</div>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>