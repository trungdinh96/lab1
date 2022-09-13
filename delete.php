<?php
require_once 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM tours WHERE id=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header('Location: index.php?message=Xóa dữ liệu thành công');
    die;
}
