<?php
// الاتصال بقاعدة البيانات
$conn = new mysqli("localhost", "root", "", "capston_test1");

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// بدء الجلسة والتحقق من أن المستخدم مسجل دخوله
session_start();

// التأكد من أن الـ user_id موجود في الجلسة
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // إعادة التوجيه إلى صفحة تسجيل الدخول إذا لم يكن المستخدم مسجلاً
    exit();
}

$userId = $_SESSION['user_id']; // استرجاع الـ user_id من الجلسة

// استقبال البيانات من الفورم
$fullName = $_POST['fullName'];
$email = $_POST['email'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$note = $_POST['note'];
$cartItems = json_decode($_POST['cartItems'], true); // جايين من فورم بشكل JSON

// إدخال بيانات الطلب في جدول orders
$orderQuery = "INSERT INTO orders (user_id, full_name, email, address, phone, note) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($orderQuery);
$stmt->bind_param("isssss", $userId, $fullName, $email, $address, $phone, $note);
$stmt->execute();

// الحصول على ID الخاص بالطلب الجديد
$orderId = $stmt->insert_id;

// إدخال كل منتج في جدول order_items
$itemQuery = "INSERT INTO order_items (order_id, sales_product_id, quantity) VALUES (?, ?, ?)";
$itemStmt = $conn->prepare($itemQuery);

// تصحيح استخدام الكارت
foreach ($cartItems as $item) {
    $productId = $item['id']; // تأكد إنك مرسل ID المنتج داخل الكارت
    $quantity = $item['quantity']; // والكمية

    $itemStmt->bind_param("iii", $orderId, $productId, $quantity);
    $itemStmt->execute();
}

// إنهاء الجلسة والاتصال
$stmt->close();
$itemStmt->close();
$conn->close();

// حفظ بيانات الطلب في السيشن لعرضها في صفحة الفاتورة
$_SESSION['orderData'] = [
    'name' => $fullName,
    'email' => $email,
    'address' => $address,
    'phone' => $phone,
    'items' => $cartItems
];

// إعادة التوجيه لصفحة تأكيد
header("Location: thank_you.php");
exit();
?>
