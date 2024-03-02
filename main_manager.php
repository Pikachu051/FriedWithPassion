<!DOCTYPE html>
<html lang="en">

<head>
    <title>ระบบบริหารจัดการ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="styleheet" href="style.css">
    <style>
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
            padding: 20px;
            flex: 1;
            width: 50%;
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
        }

        .menu {
            background-color: #FFB871;
            padding: 20px;
            margin-top: 20px;
        }

        button {
            margin: 5px 0;
            padding: 10px;
            width: 100%;
            background-color: #FF914D;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
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
        .inside{
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
    </style>
</head>

<body>
    <div class="container w-[100vw]">

        <div class="main">
            <div class="left">
                <h2>ชื่อผู้ใช้</h2>
                <p>ผู้จัดการ</p>
                <button>จัดการบัญชีผู้ใช้</button>
                <button>สรุปยอดขาย</button>
                <button>จัดการเมนู</button>
                <button>ออกจากระบบ</button>
            </div>
            <div class="content">
                <h1>ยินดีต้อนรับ</h1>
                <h2>วันนี้วันที่ 23 กุมภาพันธ์ 2567 12:03:25</h2>
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
        // สร้างข้อมูลตัวอย่างสำหรับกราฟ
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
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