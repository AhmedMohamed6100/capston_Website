<?php
session_start();

// بيانات العميل والطلب اللي اتسجلت ممكن تكون محفوظة في السيشن أو في الداتا بيز
// هنا مثال باستخدام session فقط للعرض التجريبي
$orderData = $_SESSION['orderData'] ?? null;

if (!$orderData) {
    echo "No order data found.";
    exit();
}

$items = $orderData['items'];
$total = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Complete</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f1f1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .invoice-container {
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            max-width: 600px;
            width: 100%;
            text-align: center;
        }

        .complete-check {
            font-size: 40px;
            color: green;
            margin-bottom: 20px;
        }

        .invoice-title {
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .customer-info {
            margin-bottom: 20px;
            font-size: 14px;
            color: #444;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 14px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        table th {
            background-color: #f0f0f0;
        }

        .total {
            text-align: right;
            font-size: 16px;
            font-weight: bold;
        }

        .back-button {
            display: inline-block;
            padding: 10px 20px;
            background: #111;
            color: #fff;
            border-radius: 6px;
            text-decoration: none;
            transition: background 0.3s;
        }

        .back-button:hover {
            background: #333;
        }
    </style>
</head>
<body>

<div class="invoice-container">
    <div class="complete-check">✓ Complete</div>
    <div class="invoice-title">Order Invoice</div>

    <div class="customer-info">
        <strong><?php echo htmlspecialchars($orderData['name']); ?></strong><br>
        <?php echo htmlspecialchars($orderData['email']); ?><br>
        <?php echo htmlspecialchars($orderData['address']); ?><br>
        <?php echo htmlspecialchars($orderData['phone']); ?>
    </div>

    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($items as $item): 
            $itemTotal = $item['price'] * $item['quantity'];
            $total += $itemTotal;
        ?>
            <tr>
                <td><?php echo htmlspecialchars($item['name']); ?></td>
                <td>$<?php echo number_format($item['price'], 2); ?></td>
                <td><?php echo $item['quantity']; ?></td>
                <td>$<?php echo number_format($itemTotal, 2); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <div class="total">Total: $<?php echo number_format($total, 2); ?></div>

    <a href="../index.php" class="back-button">← Back to Shop</a>
</div>

</html>
