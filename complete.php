<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FWP: Order Completed</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-orange-100">
    <header class="bg-orange-300 grid grid-cols-2">
                    <h1 id="selectedTable" class="text-xl font-bold m-5"><?php
                            if (isset($_SESSION['table_no'])) {
                                echo "<p class=\"\">ออเดอร์สำหรับ" . $_SESSION['table_no'] . "</p>";
                            } elseif (isset($_SESSION['order_type']) && $_SESSION['order_type'] == 'takeaway') {
                                echo 'ออเดอร์สั่งกลับบ้าน';
                            } else {
                                echo 'กรุณาเลือกรูปแบบการสั่งซื้อ';
                            }
                        ?></h1>
    </header>
    <div class="bg-orange-100 text-center">
        <h1 class="text-3xl font-bold text-center mt-6">คิวของคุณ</h1>
        <h1>Order Completed</h1>
        <p>Thank you for your order. We have received your payment and will process your order shortly.</p>
    </div>
</body>
</html>