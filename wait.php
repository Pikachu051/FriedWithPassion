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
                            echo "<p class=\"\">ออเดอร์สำหรับ" . $_SESSION['table_no'] . "</p>";
                        } elseif (isset($_SESSION['order_type']) && $_SESSION['order_type'] == 'takeaway') {
                            echo 'ออเดอร์สั่งกลับบ้าน';
                        } else {
                            echo 'กรุณาเลือกรูปแบบการสั่งซื้อ';
                        }
                    ?></h1>
        </header>
        <h1 class="text-3xl font-bold text-center mt-6">คิวของคุณ</h1>
        <div class="flex justify-center mt-10">
            <div class="bg-white rounded-lg shadow-lg p-6 w-[400px]">
                <h2 class="text-xl font-semibold mb-4">หมายเลยคิว: #1</h2>
                <p class="text-base">โปรดรอพนักงานเรียกคิวของคุณ</p>
                <p class="text-base">เวลารอโดยประมาณ: 15 นาที</p>
                <h2 class="text-xl font-semibold mt-4">รายละเอียดออเดอร์</h2>
                <table class="w-full mt-4">
                    <thead>
                        <tr>
                            <th class="text-left">รายการอาหาร</th>
                            <th class="text-right">ราคา</th>
                            <th class="text-right">จำนวน</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>ผัดไทเส้นพาสต้า</td>
                            <td class="text-right">฿50.00</td>
                            <td class="text-right">1</td>
                        </tr>
                        <tr>
                            <td>ต้มยำหมูสับฮาลาล</td>
                            <td class="text-right">฿80.00</td>
                            <td class="text-right">1</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-right text-sm mt-4">สั่งเมื่อ: <?php echo date('Y-m-d H:i:s'); ?></p>
            </div>
        </div>
</body>
</html>