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
<div class="w-[100vw]">
  <h1 class="text-[32px] font-bold text-center mt-4 sm:text-[38px]">คิวอาหาร</h1>
  <div class="grid grid-cols-1 gap-4 mt-6 mx-16 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
    <!-- ตัวอย่างการใส่ข้อมูลของคิว 1 คิว -->
    <div>
      <div class="bg-red-700 p-4 rounded-lg shadow-md">
        <div class="flex justify-between">
          <h1 class="text-3xl text-white font-semibold">คิวที่ 1</h1>
          <p class="text-sm text-white">เวลา: 12:00</p>
        </div>
        <div class="flex justify-between">
          <p class="text-sm text-white">โต๊ะ: 1</p>
          <p class="text-sm text-white">จำนวน: 2</p>
        </div>
        <div class="flex justify-between">
          <p class="text-sm text-white">สถานะ: รอ</p>
          <p class="text-sm text-white">เวลาที่รอ: 10 นาที</p> <!-- คำนวณเวลาปัจจุบันกับเวลาที่สั่งอาหาร -->
        </div>
        <div class="flex justify-between">
          <p class="text-sm text-white">Queue ID: #1</p>
        </div>
      </div>
    </div>
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
</script>
</html>