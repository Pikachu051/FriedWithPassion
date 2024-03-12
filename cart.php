<?php
    session_start();

    // เพิ่มรายการอาหารลงใน session cart เมื่อมีการส่งข้อมูลมาจากหน้า menu.php
    if (isset($_POST['add_to_cart'])) {
        $menu_no = $_POST['menu_no'];
        $menu_name = $_POST['menu_name'];
        $price = $_POST['price'];
        // ใส่ข้อมูลลงใน session cart โดยใช้รหัสเมนูเป็น index และจำนวนเป็นค่า
        $_SESSION['cart'][$menu_no] = array(
            'menu_name' => $menu_name,
            'price' => $price,
            'quantity' => isset($_SESSION['cart'][$menu_no]['quantity']) ? $_SESSION['cart'][$menu_no]['quantity'] + 1 : 1
        );
    }

    // ตรวจสอบว่ามีการลบรายการอาหารออกจากตะกร้าหรือไม่
    if (isset($_POST['delete'])) {
        $menu_no = $_POST['menu_no'];
        // ลบรายการอาหารที่ถูกเลือกออกจาก session cart
        unset($_SESSION['cart'][$menu_no]);
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
        </header>
        <h1 class="text-3xl font-bold text-center mt-6">ยืนยันรายการ</h1>
        <div class="flex flex-col">
      <div class="overflow-x-hidden mx-auto my-4">
        <div class="p-1.5 min-w-full inline-block align-middle">
          <div class="overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200 rounded-md">
              <thead>
                <tr>
                  <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">รูป</th>
                  <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase sm:w-[300px]">ชื่อเมนู</th>
                  <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">จำนวน</th>
                  <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">ราคา</th>
                  <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase"></th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 ">
              <?php
                  // วนลูปเพื่อแสดงรายการอาหารที่มีอยู่ใน session cart
                  foreach ($_SESSION['cart'] as $menu_no => $item) {
              ?>
                  <tr class="hover:bg-orange-200">
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800"><img class="object-cover h-[75px] w-[75px] rounded-md" src="menu_img/menu<?php echo $menu_no; ?>.png"></td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 menu-name"><?php echo $item['menu_name']; ?></td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                          <div class="flex justify-center">
                              <button type="button" id="decrement-<?php echo $menu_no; ?>" onclick="decrement('quantity-<?php echo $menu_no; ?>', '<?php echo $menu_no; ?>', <?php echo $item['price']; ?>)" class="w-6 mx-3 rounded-full bg-orange-300 hover:bg-orange-200">-</button>
                              <p id="quantity-<?php echo $menu_no; ?>"><?php echo $item['quantity']; ?></p>
                              <button type="button" id="increment-<?php echo $menu_no; ?>" onclick="increment('quantity-<?php echo $menu_no; ?>', '<?php echo $menu_no; ?>', <?php echo $item['price']; ?>)" class="w-6 mx-3 rounded-full bg-orange-300 hover:bg-orange-200">+</button>
                          </div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800" id="total-<?php echo $menu_no; ?>"><?php echo $item['price'] * $item['quantity']; ?> บาท</td>
                      <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <input value="ลบ" name="delete" type="submit"
                        class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 hover:cursor-pointer disabled:opacity-50 disabled:pointer-events-none"></input>
                        <input type="hidden" name="menu_no" value="<?php echo $menu_no; ?>">
                      </form>
                      </td>
                  </tr>
              <?php
                  }
              ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <form action="wait.php" method="post" class="flex justify-center">
      <button type="submit" class="w-[100%] bg-orange-300 hover:bg-orange-200 p-3 rounded-md mx-20">สั่งซื้อ</button>
    </form>
    </div>
</body>
<script>
  function increment(id, menu_no, price) {
    var quantityElement = document.getElementById(id);
    var quantity = parseInt(quantityElement.innerHTML);
    quantityElement.innerHTML = quantity + 1;
    updateTotal(menu_no, price, quantity + 1);
    quantity = quantity + 1;
    if (quantity >= 0) {
        document.getElementById('quantity-' + id).disabled = false;
        document.getElementById('quantity-' + id).classList.remove("bg-orange-100");
        document.getElementById('quantity-' + id).classList.add("bg-orange-300");
    }
  }

  function decrement(id, menu_no, price) {
      var quantityElement = document.getElementById(id);
      var quantity = parseInt(quantityElement.innerHTML);
      if (quantity > 0) {
          quantityElement.innerHTML = quantity - 1;
          updateTotal(menu_no, price, quantity - 1);
      }
      quantity = quantity - 1;
      if (quantity == 0) {
        document.getElementById('quantity-' + id).disabled = true;
        document.getElementById('quantity-' + id).classList.remove("bg-orange-300");
        document.getElementById('quantity-' + id).classList.add("bg-orange-100");
      }
  }
  function updateTotal(menu_no, price, quantity) {
    var totalElement = document.getElementById('total-' + menu_no);
    var totalPrice = price * quantity;
    totalElement.innerHTML = totalPrice + ' บาท';
  }

</script>
</html>
