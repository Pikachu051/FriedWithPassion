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
        <div class="bg-white p-5 rounded-lg w-[450px] m-5 shadow-md text-center mx-auto">
            <h3 class="text-xl font-semibold">คิวหมายเลข #....</h3>
            <h3 class="text-lg font-semibold text-green-500">อาหารพร้อมแล้ว</h3>
            <p class="mt-4">ขอบคุณที่ใช้บริการ <strong>FriedWithPassion</strong><br>หวังว่าคุณจะชอบอาหารและบริการของพวกเรา</p>
            <p class="mb-6 mt-2">โปรดนำเงินไปชำระที่เคาน์เตอร์และรับอาหารได้เลยครับ</p>
            <a href="review.php" class="block bg-orange-400 hover:bg-orange-500 text-white text-base rounded-md py-2 px-20 mt-18">เสร็จสิ้น</a>
        </div>
    </div>
</body>
</html>