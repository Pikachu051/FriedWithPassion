<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FWP: Your Queue</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-orange-100">
<div class="bg-orange-100">
        <header class="bg-orange-300 grid grid-cols-2">
                <h1 id="selectedTable" class="text-xl font-bold m-5"><?php
                        if (isset($_SESSION['table_no'])) {
                            echo "<p class=\"\">สั่งอาหารสำหรับ" . $_SESSION['table_no'] . "</p>";
                        } elseif (isset($_SESSION['order_type']) && $_SESSION['order_type'] == 'takeaway') {
                            echo 'สั่งกลับบ้าน';
                        } else {
                            echo 'กรุณาเลือกรูปแบบการสั่งซื้อ';
                        }
                    ?></h1>
        </header>
        <h1 class="text-3xl font-bold text-center mt-6">คิวของคุณ</h1>
        <div class="flex justify-center mt-10">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-bold mb-4">Queue Number: #1</h2>
                <p class="text-lg">Estimated Waiting Time: 15 minutes</p>
                <p class="text-lg">Please wait for your queue to be called.</p>
                <h2 class="text-2xl font-bold mt-4">Order Details</h2>
                <table class="w-full mt-4">
                    <thead>
                        <tr>
                            <th class="text-left">Menu</th>
                            <th class="text-right">Price</th>
                            <th class="text-right">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Pad Thai</td>
                            <td class="text-right">฿50.00</td>
                            <td class="text-right">1</td>
                        </tr>
                        <tr>
                            <td>Tom Yum Goong</td>
                            <td class="text-right">฿80.00</td>
                            <td class="text-right">1</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</body>
</html>