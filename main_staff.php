<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-orange-100 w-[100vw]">
<header class="flex flex-wrap sm:justify-start sm:flex-nowrap z-50 w-full bg-orange-300 text-sm py-4">
  <nav class="max-w-[85rem] w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between" aria-label="Global">
    <div class="flex items-center justify-between">
      <a class="flex-none text-xl font-semibold" href="#">FriedWithPassion</a>
      <div class="sm:hidden">
        <button type="button" onclick="menu()" class="p-2 inline-flex justify-center items-center gap-x-2 rounded-lg border border-orange-200 bg-orange-100 text-gray-800 shadow-sm hover:bg-orange-50 disabled:opacity-50 disabled:pointer-events-none" aria-label="Toggle navigation">
          <svg id="icon_open" class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
          <svg id="icon_close" class="hidden flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
      </div>
    </div>
    <div id="collapse" class="hidden overflow-hidden transition-all duration-300 basis-full grow sm:block">
      <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:justify-end sm:mt-0 sm:ps-5">
        <a class="font-medium text-orange-600" href="#" aria-current="page" href="#">หน้าหลัก</a>
        <a class="font-medium text-gray-800 hover:text-gray-400" href="table_status.php">สถานะโต๊ะ</a>
        <a class="font-medium text-gray-800 hover:text-gray-400" href="queue.php">คิวอาหาร</a>
        <a class="font-medium text-gray-800 hover:text-gray-400" href="menu_status.php">สถานะเมนู</a>
        <form action="logout.php" method="post">
            <input type="submit" value="ออกจากระบบ" class="font-medium text-gray-800 hover:text-gray-400 hover:cursor-pointer">
        </form>
      </div>
    </div>
  </nav>
</header>
<div>
    <div class="m-11">
        <h1 class="font-black text-3xl">ยินดีต้อนรับ, คุณ</h1>
        <h4 class="font-bold text-xl" id="date"></h4>
    </div>
    <div class="m-12 mx-24">
        <div class="grid border rounded-xl shadow-sm divide-y overflow-hidden sm:flex sm:divide-y-0 sm:divide-x">
            <a href="table_status.php">
            <div class="flex flex-col flex-[1_0_0%] bg-white hover:drop-shadow-2xl hover:bg-orange-200 transition-all">
                <img class="w-full h-auto rounded-t-xl sm:rounded-se-none" src="public/table.jpg" alt="Image Description">
                <div class="p-4 flex-1 md:p-5">
                <h3 class="text-lg font-bold text-gray-800">
                    สถานะโต๊ะ
                </h3>
                <p class="mt-1 text-gray-500">
                    โต๊ะว่าง: 5 โต๊ะ
                </p>
                <p class="text-gray-500">
                    โต๊ะไม่ว่าง: 10 โต๊ะ
                </p>
                </div>
                <div class="flex p-4 border-t sm:px-5">
                <p id="lastupdate1" class="text-xs text-gray-500 ">
                    อัพเดทล่าสุดเมื่อ เดี๋ยวนี้
                </p>
                <span id="indicator1" class="animate-pulse mx-3 my-0 flex w-3 h-3 me-3 bg-green-500 rounded-full"></span>
                </div>
            </div>
            </a>
            <a href="queue.php">
            <div class="flex flex-col flex-[1_0_0%] bg-white hover:drop-shadow-2xl hover:bg-orange-200 transition-all">
                <img class="w-full h-auto" src="public/queue.jpg" alt="Image Description">
                <div class="p-4 flex-1 md:p-5">
                <h3 class="text-lg font-bold text-gray-800">
                    คิวอาหาร
                </h3>
                <p class="mt-1 text-gray-500">
                    คิวอาหารทั้งหมดในตอนนี้: 10 คิว
                </p>
                <p class="text-gray-500">
                    คิวที่ช้ามาก: 3 คิว
                </p>
                </div>
                <div class="flex p-4 border-t sm:px-5">
                <p id="lastupdate2" class="text-xs text-gray-500">
                    อัพเดทล่าสุดเมื่อ เดี๋ยวนี้
                </p>
                <span id="indicator2" class="animate-pulse mx-3 my-0 flex w-3 h-3 me-3 bg-green-500 rounded-full"></span>
                </div>
            </div> 
            </a>
            <a href="menu_status.php">
            <div class="flex flex-col flex-[1_0_0%] bg-white hover:drop-shadow-2xl hover:bg-orange-200 transition-all">
                <img class="w-full h-auto sm:rounded-se-xl" src="public/stock.jpg" alt="Image Description">
                <div class="p-4 flex-1 md:p-5">
                <h3 class="text-lg font-bold text-gray-800">
                    สถานะเมนู
                </h3>
                <p class="mt-1 text-gray-500">
                    เมนูที่เหลืออยู่: 12 เมนู
                </p>
                <p class="text-gray-500">
                    เมนูที่ใกล้หมด: 5 เมนู
                </p>
                </div>
                <div class="flex p-4 border-t sm:px-5">
                <p id="lastupdate3" class="text-xs text-gray-500">
                    อัพเดทล่าสุดเมื่อ เดี๋ยวนี้
                </p>
                <span id="indicator3" class="animate-pulse mx-3 my-0 flex w-3 h-3 me-3 bg-green-500 rounded-full"></span>
                </div>
            </div>
            </a>
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
        if (distance % 60 === 0) {
            document.getElementById("lastupdate1").innerHTML = "อัพเดทล่าสุดเมื่อ " + distance / 60 + " นาทีก่อน";
            document.getElementById("lastupdate2").innerHTML = "อัพเดทล่าสุดเมื่อ " + distance / 60 + " นาทีก่อน";
            document.getElementById("lastupdate3").innerHTML = "อัพเดทล่าสุดเมื่อ " + distance / 60 + " นาทีก่อน";
            if (distance % 3600 === 0) {
                document.getElementById("lastupdate1").innerHTML = "อัพเดทล่าสุดเมื่อ " + distance / 3600 + " ชั่วโมงก่อน";
                document.getElementById("lastupdate2").innerHTML = "อัพเดทล่าสุดเมื่อ " + distance / 3600 + " ชั่วโมงก่อน";
                document.getElementById("lastupdate3").innerHTML = "อัพเดทล่าสุดเมื่อ " + distance / 3600 + " ชั่วโมงก่อน";
            }
        }
        if (distance > 120) {
            document.getElementById("indicator1").style.backgroundColor = "rgb(234 179 8)";
            document.getElementById("indicator2").style.backgroundColor = "rgb(234 179 8)";
            document.getElementById("indicator3").style.backgroundColor = "rgb(234 179 8)";
        }

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
</script>
</html>