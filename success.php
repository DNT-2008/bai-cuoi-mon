<?php
  $title = "Đăng ký thành công";
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f3f4f6;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
        }
        .icon {
            color: #10b981;
            font-size: 50px;
        }
        .title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-top: 10px;
        }
        .message {
            color: #666;
            margin-top: 5px;
        }
        .btn {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background: #10b981;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background: #059669;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">✔</div>
        <div class="title">Đăng ký thành công!</div>
        <div class="message">Cảm ơn bạn đã đăng ký. Hãy kiểm tra email để xác nhận tài khoản của bạn.</div>
        <a href="/" class="btn">Quay về trang chủ</a>
    </div>
</body>
</html>