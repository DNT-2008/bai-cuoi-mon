<?php
require_once "db.php";

$result = $conn->query("SELECT * FROM products");

$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh Sách Sản Phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav>
    <div class="container mt-5">
        <h2 class="text-center">Danh Sách Sản Phẩm</h2>
        <div class="card p-4 shadow-sm">
            <table class="table table-bordered text-center">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Hình ảnh</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Giá</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td>
                                <?php if (!empty($row['avatar'])): ?>
                                    <img src="<?= htmlspecialchars($row['avatar']) ?>" alt="Avatar" width="50" height="50" class="rounded-circle">
                                <?php else: ?>
                                    <img src="image2.jpg" alt="Default Avatar" width="50" height="50" class="rounded-circle">
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($row['name']) ?></td>
                            <td><?= number_format($row['price'], 0, ',', '.') ?> VND</td>
                            <td>
                                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Sửa</a>
                                <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <div class="text-center">
                <a href="create.php" class="btn btn-primary">Thêm Sản Phẩm</a>
                <a href="update.php" class="btn btn-primary">Cập Nhật Sản Phẩm</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>