<?php
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


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['queue_no'])) {
    $queue_no = $_POST['queue_no'];
    $result = $db->query("SELECT MAX(history_no) AS max_history_no FROM order_history");
    $row = $result->fetchArray(SQLITE3_ASSOC);
    if ($row && isset($row['max_history_no'])) {
        $history_no = $row['max_history_no'] + 1;
    } else {
        $history_no = 1;
    }
    
    // Assuming the variables $menu_no, $type, $quantity, $dateTime, and $total are defined elsewhere in your code
    
    // Prepare the INSERT INTO order_history query
    $sqlHistory = "INSERT INTO order_history (history_no, menu_no, `type`, quantity, date_time, total, review_id) 
                    SELECT $history_no, menu_no, `type`, quantity, date_time, total, NULL
                    FROM `order` 
                    WHERE queue_no = $queue_no";
    
    // Execute the query
    $retHistory = $db->exec($sqlHistory);
    
    if(!$retHistory) {
        echo $db->lastErrorMsg();
        exit;
    }
    
    // Prepare the DELETE FROM order query
    $sqlDelete = "DELETE FROM `order` WHERE queue_no = $queue_no";
    
    // Execute the query
    $retDelete = $db->exec($sqlDelete);
    
    if(!$retDelete) {
        echo $db->lastErrorMsg();
    } else {
        header("Location: queue.php");
        exit; // Ensure script stops executing after redirection
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FriedWithPassion: Order Queue</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-orange-100">
<header class="flex flex-wrap sm:justify-start sm:flex-nowrap z-50 w-full bg-orange-300 text-sm py-4">
  <nav class="max-w-[85rem] w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between" aria-label="Global">
    <div class="flex items-center justify-between">
      <a class="flex-none text-xl font-semibold" href="main_staff.php"><img src="public/fwp-logo-color.png" class="w-auto h-[40px]"></a>
      <div class="sm:hidden">
        <button type="button" onclick="menu()" class="p-2 inline-flex justify-center items-center gap-x-2 rounded-lg border border-orange-200 bg-orange-100 text-gray-800 shadow-sm hover:bg-orange-50 disabled:opacity-50 disabled:pointer-events-none" aria-label="Toggle navigation">
          <svg id="icon_open" class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
          <svg id="icon_close" class="hidden flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
      </div>
    </div>
    <div id="collapse" class="hidden overflow-hidden transition-all duration-300 basis-full grow sm:block">
      <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:justify-end sm:mt-0 sm:ps-5">
        <a class="font-medium text-gray-800 hover:text-gray-400" href="main_staff.php">หน้าหลัก</a>
        <a class="font-medium text-gray-800 hover:text-gray-400" href="table_status.php">สถานะโต๊ะ</a>
        <a class="font-medium text-orange-600" href="#" aria-current="page" href="#">คิวอาหาร</a>
        <a class="font-medium text-gray-800 hover:text-gray-400" href="menu_status.php">สถานะเมนู</a>
        <form action="logout.php" method="post">
            <input type="submit" value="ออกจากระบบ" class="font-medium text-gray-800 hover:text-gray-400 hover:cursor-pointer">
        </form>
      </div>
    </div>
  </nav>
</header>
<div class="">
  <h1 class="text-[32px] font-bold text-center mt-4 sm:text-[38px]">คิวอาหาร</h1>
  <div class="grid grid-cols-1 gap-4 mt-6 mx-16 sm:grid-cols-3 lg:grid-cols-4">
    <!-- ตัวอย่างการใส่ข้อมูลของคิว 1 คิว -->
    <?php
    $sql = "SELECT o.queue_no, o.date_time, SUM(o.quantity) AS total_quantity, GROUP_CONCAT(m.menu_name || ' x ' || o.quantity, '<br>') AS menu_list
            FROM `order` AS o
            INNER JOIN menu AS m ON o.menu_no = m.menu_no
            GROUP BY o.queue_no, o.date_time
            ORDER BY o.queue_no, o.date_time";

    $ret = $db->query($sql);

    if (!$ret) {
        echo $db->lastErrorMsg();
    } else {
        while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
            $queue_no = $row['queue_no'];
            $date_time = $row['date_time'];
            $total_quantity = $row['total_quantity'];
            $menu_list = $row['menu_list'];

            // Calculate waiting time
            $current_time = time();
            $order_time = strtotime($date_time);
            $waiting_time = round(($current_time - $order_time) / 60);

            // Display order details
            echo "<div class=\"bg-orange-600 p-4 rounded-lg shadow-md hover:bg-orange-700\">
                    <div class=\"flex justify-between\">
                        <h1 class=\"text-2xl text-white font-semibold\">คิวที่ $queue_no</h1>
                        <p class=\"text-sm text-white\">เวลา: $date_time</p>
                    </div>
                    <div class=\"flex justify-between\">
                        <p class=\"text-sm text-white\">เวลาที่รอ: $waiting_time นาที</p>
                        <p class=\"text-sm text-white\">จำนวนรวม: $total_quantity</p>
                    </div>
                    <div>
                        <h2 class=\"text-white font-semibold text-xl\">รายการอาหาร</h2>
                        <p class=\"text-sm text-white\">$menu_list</p>
                    </div>
                    <form action='queue.php' method='post'>
                        <input type='hidden' name='queue_no' value='$queue_no'>
                        <button type=\"submit\" class=\"float-right bg-orange-500 text-white font-semibold px-4 py-2 rounded-lg mt-3 hover:bg-orange-400\">เสร็จสิ้น</button>
                    </form>
                  </div>";
        }
    }
    ?>


    <!-- สิ้นสุดตัวอย่างการใส่ข้อมูลของคิว 1 คิว -->
    </div>
  </div>
</div>
</body>
<script>
    function menu() {
        var x = document.getElementById("collapse");
        var y = document.getElementById("icon_open");
        var z = document.getElementById("icon_close");
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
            z.style.display = "block";
        } else {
            x.style.display = "none";
            y.style.display = "block";
            z.style.display = "none";
        }
    }
    var lastUpdate = Math.floor(new Date().getTime() / 1000);
    function getClock() {
        var now = Math.floor(new Date().getTime() / 1000);
        var distance = now - lastUpdate;
    }
    setTimeout(function() {
        location.reload();
    }, 10000);
    
</script>
</html>