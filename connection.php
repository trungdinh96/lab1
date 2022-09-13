<?php
$host='localhost';
$dbname='lab_1';
$username='root';
$password='';
try {
    //Kết nối CSDL
    $conn = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $username, $password);
    //echo "Kết nối dữ liệu thành công.";
} catch (PDOException $e) {
    echo "Lỗi kết nối CSDL: <br>" . $e->getMessage();
}

?>