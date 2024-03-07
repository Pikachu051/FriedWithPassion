<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FriedWithPassion: Menu Status</title>
  <link rel="stylesheet" href="style.css">
</head>

<body class="bg-orange-100">
  <header class="flex flex-wrap sm:justify-start sm:flex-nowrap z-50 w-full bg-orange-300 text-sm py-4">
    <nav class="max-w-[85rem] w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between" aria-label="Global">
      <div class="flex items-center justify-between">
        <a class="flex-none text-xl font-semibold" href="main_staff.php"><img src="public/fwp-logo-color.png"
            class="w-auto h-[40px]"></a>
        <div class="sm:hidden transition-all">
          <button type="button" onclick="menu()"
            class="p-2 inline-flex justify-center items-center gap-x-2 rounded-lg border border-orange-200 bg-orange-100 text-gray-800 shadow-sm hover:bg-orange-50 disabled:opacity-50 disabled:pointer-events-none"
            aria-label="Toggle navigation">
            <svg id="icon_open" class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round">
              <line x1="3" x2="21" y1="6" y2="6" />
              <line x1="3" x2="21" y1="12" y2="12" />
              <line x1="3" x2="21" y1="18" y2="18" />
            </svg>
            <svg id="icon_close" class="hidden flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
              height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round">
              <path d="M18 6 6 18" />
              <path d="m6 6 12 12" />
            </svg>
          </button>
        </div>
      </div>
      <div id="collapse" class="hidden overflow-hidden transition-all duration-300 basis-full grow sm:block">
        <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:justify-end sm:mt-0 sm:ps-5">
          <a class="font-medium text-gray-800 hover:text-gray-400" href="main_staff.php">หน้าหลัก</a>
          <a class="font-medium text-gray-800 hover:text-gray-400" href="table_status.php">สถานะโต๊ะ</a>
          <a class="font-medium text-gray-800 hover:text-gray-400" href="queue.php">คิวอาหาร</a>
          <a class="font-medium text-orange-600" href="#" aria-current="page" href="#">สถานะเมนู</a>
          <form action="logout.php" method="post">
            <input type="submit" value="ออกจากระบบ"
              class="font-medium text-gray-800 hover:text-gray-400 hover:cursor-pointer">
          </form>
        </div>
      </div>
    </nav>
  </header>
  <div>
    <h1 class="font-bold text-[32px] text-center mt-5 sm:text-[38px]">สถานะเมนู</h1>
    <div class="w-[100vw] flex flex-col">
      <div class="overflow-x-hidden mx-auto my-4">
        <div class="p-1.5 min-w-full inline-block align-middle">
          <div class="overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200 rounded-md">
              <thead>
                <tr>
                  <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">รูป</th>
                  <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">ชื่อเมนู</th>
                  <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">สถานะ</th>
                  <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Action</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 ">
                <!-- ด้านล่างคือตัวอย่างการใส่ข้อมูล 1 แถว echo ให้เหมือนเป๊ะๆ ต่างกันแค่ข้อมูลด้านใน และการที่ต้องใช้ \ (Backslash) นำหน้าเครื่องหมาย " (Double-Quote) ทุกครั้ง
            เช่น echo "<tr class=\"hover:bg-orange-200\">
              <td class=\"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800\"><img src=\"favicon.png\"></td>
              <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800\">มื้ออาหารในวัง</td>
              <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800\">ไม่มีวันหมดเพราะรวยล้นฟ้า</td>
              <td class=\"px-6 py-4 whitespace-nowrap text-end text-sm font-medium\">
                <button type=\"button\" class=\"inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none\">Delete</button>
              </td>
            </tr>";
          
           ถ้าไม่เอาปุ่มก็แค่ลบ th Action กับ td อันสุดท้ายออก -->
                <!-- <tr class="hover:bg-orange-200">
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800"><img src="favicon.png"></td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">มื้ออาหารในวัง</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">ไม่มีวันหมดเพราะรวยล้นฟ้า</td>
                  <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                    <button type="button"
                      class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">Delete</button>
                  </td>
                </tr> -->
                <?php // ตรงนี้คือไฟล์เรียกข้อมูลมาใส่ตาราง
                  require "manageMenuStatus.php"
                ?>
                <!-- ด้านบนคือตัวอย่างการใส่ข้อมูล -->
              </tbody>
            </table>
          </div>
        </div>
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