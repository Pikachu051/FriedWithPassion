<?php
require_once '_managerStart.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FriedWithPassion: Menu Status</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body, html {
      height: 100%;
      margin: 0;
      padding: 0;
    }

    .main {
      min-height: 100%;
      display: flex;

    }
  </style>
</head>

<body class="bg-orange-100 overflow-x-hidden">
<div class="main flex w-[100vw]">
        <div class="left bg-orange-300 p-6 w-1/5">
                    <a class="" href="main_manager.php"><img src="public/fwp-logo-color.png" class="my-0 mx-auto w-auto h-[50px]"></a>
                    <p id="welcome" class="mt-4 font-semibold text-lg"></p>
                    <p>(Manager)</p>
                    <form method="post">
                        <a href="manage_Accounts.php" class="block bg-orange-400 hover:bg-orange-500 text-white rounded-md text-base py-2 px-4 mt-4">จัดการบัญชีผู้ใช้</a>
                        <a href="history_manager.php" class="block bg-orange-400 hover:bg-orange-500 text-white rounded-md text-base py-2 px-4 mt-4">ประวัติการสั่งซื้อ</a>
                        <a href="menu_manager.php" class="block bg-orange-400 hover:bg-orange-500 text-white text-base rounded-md py-2 px-4 mt-4">จัดการเมนู</a>
                        <a href="logout.php" id="logout" class="block bg-red-400 hover:bg-red-500 text-white text-base rounded-md py-2 px-4 mt-4">ออกจากระบบ</a>
                    </form>
                </div>
  <div class="justify-center">
    <h1 class="font-bold text-[32px] text-center mt-5 sm:text-[38px]">ประวัติการสั่งซื้อ</h1>
    <div class="flex items-center justify-center my-4">
      <input type="text" id="searchInput" class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-300" placeholder="วันที่และเวลา...">
    </div>

    <script>
      // Function to filter table rows based on user input
      function filterTable() {
        // Get the input value and convert it to lowercase
        var input = document.getElementById("searchInput").value.toLowerCase();
        
        // Get all table rows
        var rows = document.querySelectorAll("tbody tr");
        
        // Loop through each row and hide/show based on the input value
        rows.forEach(function(row) {
          var name = row.querySelector(".date_time").textContent.toLowerCase();
          
          if (name.includes(input)) {
            row.style.display = "";
          } else {
            row.style.display = "none";
          }
        });
      }
      
      // Add event listener to the search input
      document.getElementById("searchInput").addEventListener("input", filterTable);
    </script>
    <div class="flex flex-col">
      <div class="overflow-x-hidden mx-auto my-4">
        <div class="p-1.5 min-w-full inline-block align-middle">
          <div class="overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200 rounded-md">
              <thead>
                <tr>
                  <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">หมายเลขประวัติ</th>
                  <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase sm:w-[300px]">หมายเลขเมนู</th>
                  <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">ประเภท</th>
                  <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">จำนวน</th>
                  <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">หมายเหตุ</th>
                  <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">วัน-เวลา</th>
                  <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">รวม</th>
                  <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">รหัสรีวิว</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 ">
                <?php // เรียกใช้ไฟล์ history_order.php เพื่อแสดงข้อมูลเมนู
                  require_once "history_order.php";
                ?>
                <!-- ด้านบนคือตัวอย่างการใส่ข้อมูล -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
<script>
  var fname = "<?php echo $_SESSION['user']; ?>";
  document.getElementById('welcome').innerHTML = "ผู้จัดการ" + fname;
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
