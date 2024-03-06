<?php 
require '_mngStart.php';  // !! ใส่ทุกหน้าของผู้จัดการ !!
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>ระบบบริหารจัดการ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <script src="script.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            box-sizing: border-box;
            font-family: 'Prompt', 'sans-serif';
        }

        body {
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .left {
            background-color: #FFB871;
            padding: 20px;
            width: 20%;
        }

        .main {
            display: flex;
            flex: 1;
            background-color: #FFECD9;
            padding: 20px;
        }

        .sub_left {
            text-align: center;
            margin-top: 20px;
            margin-left: 25px;
            padding: 20px;
            flex: 1;
            width: 50%;
            height: 80%;
            background-color: rgb(253 186 116);
            border-radius: 10px;
        }

        .graph {
            background-color: #FFB871;
            height: 300px;
            margin-top: 20px;
        }

        .sub_right {
            text-align: center;
            padding: 20px;
            width: 40%;
            height: 80%;
            background-color: rgb(253 186 116);
            border-radius: 10px;
            margin-top: 20px;
            margin-left: 5%;
            margin-right: 2%;
        }

        .menu {
            background-color: #FFB871;
            padding: 20px;
            margin-top: 20px;
        }

        input {
            margin: 5px 0;
            padding: 10px;
            width: 100%;
            background-color: #FF914D;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }

        input:hover {
            background-color: #FF774D;
        }

        .content {
            background-color: #FFECD9;
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: left;
        }

        .time {

            display: flex;
            flex-direction: row;
        }

        .inside {
            padding: 0;
            flex: 1;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: left;
        }

        h1,
        h2 {
            margin-top: 0;
        }

        #logout {
            background-color: rgb(239 68 68);
            transitions: all 0.5s;
        }

        #logout:hover {
            background-color: rgb(239 68 68 / 85%);
            transitions: all 0.5s;
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="main">
            <div class="left">
                <h2>ชื่อผู้ใช้</h2>
                <p id="welcome"></p>
                <form method="post">
                    <input type="submit" name="usermng" value="จัดการบัญชีผู้ใช้">
                    <input type="submit" name="report" value="สรุปยอดขาย">
                    <input type="submit" name="menumng" value="จัดการเมนู">
                    <input type="submit" name="logout" value="ออกจากระบบ" id="logout">
                    <a href="logout.php">Logout</a> <!-- แก้เอา ไม่รู้ -->
                </form>
            </div>
            <div class="content">
                <h1>ยินดีต้อนรับ</h1>
                <div class="time">
                    <h3 id="date"></h3>
                </div>
                <div class="inside">
                    <div class="sub_left">
                        <h2>ยอดขาย ณ เวลานี้</h2>
                        <canvas id="myChart" class="graph"></canvas>
                    </div>

                    <div class="sub_right">
                        <h2>สถานะเมนู</h2>
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
                labels: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม'],
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