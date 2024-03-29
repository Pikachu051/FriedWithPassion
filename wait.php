<?php
    session_start();
    class MyDB extends SQLite3 {
        function __construct() {
           $this->open('fwp.db');
        }
    }
    
    $db = new MyDB();
    if(!$db) {
        die($db->lastErrorMsg());
    }

    date_default_timezone_set('Asia/Bangkok');
    $sql_check_queue = "SELECT * FROM `order` WHERE queue_no = " . $_SESSION['queue_no'];
    $ret_check_queue = $db->query($sql_check_queue);
    if(!$ret_check_queue || $ret_check_queue->fetchArray(SQLITE3_ASSOC) === false) {
        // No active queues remaining, redirect to complete.php
        header("Location: complete.php");
        exit;
    }
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
                <h2 class="text-xl font-semibold mb-4"><?php echo "หมายเลขคิว: #" . $_SESSION['queue_no']; ?></h2>
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
                    <?php
    $sql = "SELECT * FROM `order` WHERE queue_no =" .$_SESSION['queue_no'];
    $ret = $db->query($sql);
      
    // Check for errors
    if(!$ret) {
        header("Location: complete.php");
    }
    $totalPrice = 0;

    while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
        $query = "SELECT menu_name FROM menu WHERE menu_no =" .$row['menu_no'];
        $menu_result = $db->query($query);
        $menu_row = $menu_result->fetchArray(SQLITE3_ASSOC);
        
        $totalPrice += $row['total'];
        $date_time = $row["date_time"];


        
        echo '<tr>';
        echo '<td>' . $menu_row['menu_name'] . '</td>';
        echo '<td class="text-right">' . number_format($row['total'], 2) . '</td>';
        echo '<td class="text-right">' . $row['quantity'] . '</td>';
        echo '</tr>';
    }

?>

</tbody>



                </table>
                <p class="text-right text-xl mt-4 font-semibold">ราคารวม: <?php  echo number_format($totalPrice, 2); ?> บาท</p>
                <p class="text-right text-sm mt-4">สั่งเมื่อ: <?php  echo  $date_time; ?></p>
            </div>
        </div>
</body>
<script>
    setTimeout(function() {
        location.reload();
    }, 15000);
</script>
</html>
