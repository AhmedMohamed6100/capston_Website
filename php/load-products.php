<?php
$host = "localhost"; // أو حسب اسم السيرفر
$db = "capston_test1";
$user = "root";
$pass = "";

$conn = new mysqli("localhost", "root", "", "capston_test1");
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// تأكيد نوع المخرجات JSON
header('Content-Type: application/json; charset=utf-8');

$sql = "SELECT * FROM sales_products";
$result = $conn->query($sql);

$products = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

// إخراج المنتجات بصيغة JSON
echo json_encode($products, JSON_UNESCAPED_UNICODE);

$conn->close();
?>