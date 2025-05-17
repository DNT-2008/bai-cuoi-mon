<?php
require_once "db.php";

if (!isset($_GET['id'])) {
    die("Không tìm thấy sản phẩm!");
}

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: index.php");
    exit();
} else {
    echo "Lỗi khi xóa sản phẩm!";
}

$conn->close();
?>
