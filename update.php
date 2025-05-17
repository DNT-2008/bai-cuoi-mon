<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "db.php"; 
    $name = $_POST["name"] ?? "";
    $price = $_POST["price"] ?? "";
    $description = $_POST["description"] ?? "";
    
    if (!empty($name) && !empty($price)) {
        $stmt = $conn->prepare("INSERT INTO products (name, price, description) VALUES (?, ?, ?)");
        $stmt->bind_param("sds", $name, $price, $description);
        if ($stmt->execute()) {
            header("Location: products/index.php");
            exit();
        } else {
            $error = "Lỗi khi thêm sản phẩm!";
        }
    } else {
        $error = "Vui lòng nhập đầy đủ thông tin!";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm Mới</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card p-4 shadow" style="width: 400px;">
        <h3 class="text-center">Thêm Sản Phẩm Mới</h3>
        <?php if (!empty($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label">Tên Sản Phẩm</label>
                <input type="text" name="name" class="form-control" placeholder="Nhập tên sản phẩm" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Giá (VNĐ)</label>
                <input type="number" name="price" class="form-control" placeholder="Nhập giá sản phẩm" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Mô Tả</label>
                <textarea name="description" class="form-control" placeholder="Nhập mô tả sản phẩm"></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Thêm Sản Phẩm</button>
        </form>
        <div class="text-center mt-3">
            <a href="index.php" class="text-decoration-none">Quay lại danh sách sản phẩm</a>
        </div>
    </div>
</body>
</html>
