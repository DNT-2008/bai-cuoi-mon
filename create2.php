<?php
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $price = trim($_POST['price']);

    if (!empty($name) && is_numeric($price)) {
        $stmt = $conn->prepare("INSERT INTO products (name, price) VALUES (?, ?)");
        $stmt->bind_param("sd", $name, $price);
        if ($stmt->execute()) {
            header("Location: index.php");
            exit();
        } else {
            echo "Lỗi khi thêm người dùng!";
        }
        $stmt->close();
    } else {
        echo "Vui lòng nhập thông tin hợp lệ!";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Người Dùng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card p-4 shadow" style="width: 400px;">
    <h3 class="text-center">Thêm Người Dùng</h3>
        <?php if (!empty($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label">Tên Người Dùng:</label>
                <input type="text" name="name" class="form-control" placeholder="Nhập tên người dùng" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Năm Sinh</label>
                <input type="number" name="price" class="form-control" placeholder="Nhập Năm Sinh" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Thêm thông tin</button>
        </form>
        <div class="text-center mt-3">
            <a href="profile.php" class="text-decoration-none">Quay lại danh sách quản lý</a>
        </div>
    </div>
</body>
</html>