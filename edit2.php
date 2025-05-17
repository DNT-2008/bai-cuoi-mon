<?php
require_once "db.php";

if (!isset($_GET['id'])) {
    die("Không tìm thấy người dùng!");
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

if (!$product) {
    die("Người dùng không tồn tại!");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $price = trim($_POST['price']);

    if (!empty($name) && is_numeric($price)) {
        $stmt = $conn->prepare("UPDATE products SET name = ?, price = ? WHERE id = ?");
        $stmt->bind_param("sdi", $name, $price, $id);
        if ($stmt->execute()) {
            header("Location: profile.php");
            exit();
        } else {
            echo "Lỗi khi cập nhật!";
        }
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
    <title>Sửa thông tin người dùng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card p-4 shadow" style="width: 400px;">
        <h3 class="text-center">Sửa thông tin Người Dùng</h3>
        <?php if (!empty($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label">Tên Người Dùng</label>
                <input type="text" name="name" class="form-control" placeholder="Nhập tên người dùng" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Ngày,Tháng,Năm</label>
                <input type="number" name="price" class="form-control" placeholder="Nhập ngày,tháng,năm" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Mô Tả</label>
                <textarea name="description" class="form-control" placeholder="Nhập mô tả người dùng"></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Chỉnh sửa</button>
        </form>
        <div class="text-center mt-3">
            <a href="profile.php" class="text-decoration-none">Quay lại danh sách quản lý</a>
        </div>
    </div>