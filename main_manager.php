<?php 
require_once '_managerStart.php';  // !! ใส่ทุกหน้าของผู้จัดการ !!
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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">

        <div class="main flex h-[100vh] w-[100vw]">
            <div class="left bg-orange-300 p-4 w-1/5">
                <a class="" href="main_manager.php"><img src="public/fwp-logo-color.png" class="my-0 mx-auto w-auto h-[50px]"></a>
                <p id="welcome" class="mt-4 font-semibold text-lg"></p>
                <p>(Manager)</p>
                <form method="post">
                    <a href="manage_Accounts.php" class="block bg-orange-400 hover:bg-orange-500 text-white rounded-md text-base py-2 px-4 mt-4">จัดการบัญชีผู้ใช้</a>
                    <a href="#" class="block bg-orange-400 hover:bg-orange-500 text-white rounded-md text-base py-2 px-4 mt-4">สรุปยอดขาย</a>
                    <a href="menu_manager.php" class="block bg-orange-400 hover:bg-orange-500 text-white text-base rounded-md py-2 px-4 mt-4">จัดการเมนู</a>
                    <a href="logout.php" id="logout" class="block bg-red-400 hover:bg-red-500 text-white text-base rounded-md py-2 px-4 mt-4">ออกจากระบบ</a>
                </form>
            </div>
            <div class="content bg-orange-100 p-4 flex-1">
                <h1 class="font-bold text-3xl ml-4 mt-3">ยินดีต้อนรับ</h1>
                <div class="time font-semibold text-xl ml-4">
                    <h3 id="date"></h3>
                </div>
                <div class="inside flex mt-8 mx-6">
                    <div class="sub_left bg-orange-300 p-4 flex-1 mr-4 rounded-lg">
                        <h2 class="font-medium text-lg">ยอดขาย ณ เวลานี้</h2>
                        <canvas id="myChart" class="graph"></canvas>
                    </div>

                    <div class="sub_right bg-orange-300 rounded-lg p-4 w-2/5">
                        <h2 class="font-medium text-lg">สถานะเมนู</h2>
                        <div class="menu">

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        // สร้างข้อมูลตัวอย่างสำหรับกราฟ
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['08:00 - 12:00', '12:01 - 15:00', '15:01 - 18:00', '18:01 - 20:00'],
                datasets: [{
                    label: 'ยอดขาย',
                    data: [12, 19, 3, 5, 2, 3, 9],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>