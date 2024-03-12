<?php
    session_start();

    // Check if the order type is set and update the session variable
    if (isset($_POST['takeaway'])) {
        $_SESSION['order_type'] = 'takeaway';
        header('Location: ' . $_SERVER['REQUEST_URI']); // Redirect to the same page
        exit; // Stop script execution after redirect
    }

    if (isset($_POST['table_no'])) {
        $_SESSION['table_no'] = $_POST['table_no'];
        unset($_SESSION['order_type']); // Clear order type when selecting a table
        header('Location: ' . $_SERVER['REQUEST_URI']); // Redirect to the same page
        exit; // Stop script execution after redirect
    }

    if (isset($_POST['change_option'])) {
        unset($_SESSION['table_no']); // Clear old table selection
        unset($_SESSION['order_type']); // Clear old order type
        header('Location: ' . $_SERVER['REQUEST_URI']); // Redirect to the same page to start fresh
        exit; // Stop script execution after redirect
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FWP: Cart</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-orange-100">
    <div class="bg-orange-100">
        <header class="bg-orange-300 grid grid-cols-2">
                <h1 id="selectedTable" class="text-xl font-bold m-5"><?php
                        if (isset($_SESSION['table_no'])) {
                            echo "<p class=\"\">สั่งอาหารสำหรับ" . $_SESSION['table_no'] . "</p>";
                        } elseif (isset($_SESSION['order_type']) && $_SESSION['order_type'] == 'takeaway') {
                            echo 'สั่งกลับบ้าน';
                        } else {
                            echo 'กรุณาเลือกรูปแบบการสั่งซื้อ';
                        }
                    ?></h1>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="submit" name="change_option" value="เลือกรูปแบบการสั่งซื้อใหม่ / ยกเลิก" class="text-center p-2 m-4 bg-orange-200 rounded-md hover:cursor-pointer hover:bg-orange-100 float-right" onclick="resetTableStatus()">
                </form>
        </header>
        <h1 class="text-3xl font-bold text-center mt-6">ยืนยันรายการ</h1>
        <div class="flex flex-col">
      <div class="overflow-x-hidden mx-auto my-4">
        <div class="p-1.5 min-w-full inline-block align-middle">
          <div class="overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200 rounded-md">
              <thead>
                <tr>
                  <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">รูป</th>
                  <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase sm:w-[300px]">ชื่อเมนู</th>
                  <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">จำนวน</th>
                  <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">ราคา</th>
                  <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase"></th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 ">
              <tr class="hover:bg-orange-200">
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800"><img class="object-cover h-[75px] w-[75px] rounded-md" src="menu_img/menu102.png"></td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 menu-name">เบอร์เกอร์หมูเบคอนฮาลาล</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">1</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">45 บาท</td>
                  <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                  <form action="menu_status.php" method="post">
                    <input value="ลบ" name="delete" type="submit"
                    class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 hover:cursor-pointer disabled:opacity-50 disabled:pointer-events-none"></input>
                    <input type="hidden" name="menu_no" value="">
                  </form>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    </div>
</body>
</html>