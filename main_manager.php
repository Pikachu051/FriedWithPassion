<?php
require_once '_managerStart.php';  // !! ใส่ทุกหน้าของผู้จัดการ !!
class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('fwp.db');
    }
}

$db = new MyDB();
if (!$db) {
    die($db->lastErrorMsg());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>FriedWithPassion: Management</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            box-sizing: border-box;
            font-family: 'Prompt', 'sans-serif';
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="main flex h-[100vh] w-[100vw]">
            <div class="left bg-orange-300 p-4 w-1/5">
                <a class="" href="main_manager.php"><img src="public/fwp-logo-color.png"
                        class="my-0 mx-auto w-auto h-[50px]"></a>
                <p id="welcome" class="mt-4 font-semibold text-lg"></p>
                <p>(Manager)</p>
                <form method="post">
                    <a href="manage_Accounts.php"
                        class="block bg-orange-400 hover:bg-orange-500 text-white rounded-md text-base py-2 px-4 mt-4">จัดการบัญชีผู้ใช้</a>
                    <a href="history_manager.php"
                        class="block bg-orange-400 hover:bg-orange-500 text-white rounded-md text-base py-2 px-4 mt-4">ประวัติการสั่งซื้อ</a>
                    <a href="menu_manager.php"
                        class="block bg-orange-400 hover:bg-orange-500 text-white text-base rounded-md py-2 px-4 mt-4">จัดการเมนู</a>
                    <a href="logout.php" id="logout"
                        class="block bg-red-400 hover:bg-red-500 text-white text-base rounded-md py-2 px-4 mt-4">ออกจากระบบ</a>
                </form>
            </div>
            <div class="content bg-orange-100 p-4 flex-1">
                <h1 class="font-bold text-3xl ml-4 mt-3">ยินดีต้อนรับ</h1>
                <div class="time font-semibold text-xl ml-4">
                    <h3 id="date"></h3>
                </div>
                <div class="inside flex mt-8 mx-6">
                    <div class="sub_left bg-orange-300 p-4 mr-4 rounded-lg h-[200px] shadow-lg">
                        <h2 class="font-medium text-lg">ยอดขายวันนี้</h2>
                        <?php
                        date_default_timezone_set('Asia/Bangkok');
                        $currentDate = date('Y-m-d'); // Get current date in 'YYYY-MM-DD' format
                        $query = "SELECT SUM(total) AS total_sale FROM order_history WHERE substr(date_time, 1, 10) = '$currentDate'";
                        $result = $db->query($query);
                        if (!$result) {
                            die($db->lastErrorMsg());
                        }
                        $row = $result->fetchArray(SQLITE3_ASSOC);
                        $totalSale = $row['total_sale'];
                        $totalSale = number_format($totalSale, 2);
                        ?>
                        <h2
                            class="font-bold text-4xl text-center mt-auto flex items-center justify-center h-full mx-4 pb-4">
                            <?php echo $totalSale; ?> บาท
                        </h2>
                        <!-- ตรงนี้ ตอนแรกเป็น <canvas> แต่มันไม่ขึ้น T-T -->
                    </div>

                    <div class="sub_right bg-orange-300 rounded-lg flex-1 p-4 shadow-lg">
                        <h2 class="font-medium text-lg">ยอดขายรายเดือน</h2>
                        <div class="mt-3" id="myChart" style="height: 400px; width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        var fname = "<?php echo $_SESSION['user']; ?>";
        document.getElementById('welcome').innerHTML = "ผู้จัดการ" + fname;
        function getClock() {
            var date = new Date();
            var hours = date.getHours();
            var minutes = date.getMinutes();
            var seconds = date.getSeconds();

            if (hours < 10) {
                hours = "0" + hours;
            }
            if (minutes < 10) {
                minutes = "0" + minutes;
            }
            if (seconds < 10) {
                seconds = "0" + seconds;
            }

            var time = hours + ":" + minutes + ":" + seconds;

            var day = date.getDate();

            var monthNames = ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"];
            var month = monthNames[date.getMonth()];
            var year = date.getFullYear();
            var formattedDate = "วันนี้วันที่ " + day + " " + month + " " + year;
            document.getElementById("date").innerHTML = formattedDate + " เวลา " + time;

        }
        setInterval(getClock, 1000);
        // graph
        <?php
        require_once "saleChart.php";
        ?>
        window.onload = function () {
            var chart = new CanvasJS.Chart("myChart", {
                backgroundColor: "#FFEDD5",
                animationEnabled: true,
                title: {
                    text: "รายได้ของร้าน FWP",
                    fontFamily: 'Prompt',
                    padding: {
                        top: 10,
                    },
                },
                toolTip: {
                    fontFamily: 'Prompt',
                },
                axisY: {
                    labelFontFamily: 'Prompt',
                    titleFontFamily: 'Prompt',
                    margin: 10,
                    title: "จำนวนเงิน (หน่วย: บาท)",
                    includeZero: true,
                    suffix: " บาท",
                },
                axisX: {
                    labelFontFamily: 'Prompt',
                    titleFontFamily: 'Prompt',
                    margin: 10,
                },
                data: [{
                    indexLabelFontFamily: 'Prompt',
                    type: "column",
                    yValueFormatString: "#,###,### บาท",
                    dataPoints: <?php echo $dataPoints; ?>
                }]
            });
            chart.render();
        }
    </script>
    <script src="canvasjs-chart-3.7.43/canvasjs.min.js"></script>
</body>

</html>