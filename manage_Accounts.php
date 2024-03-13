<?php
require_once '_managerStart.php';
// 1. Connect to Database 
class MyDB extends SQLite3 {
    function __construct() {
       $this->open('fwp.db');
    }
}

// 2. Open Database 
$db = new MyDB();
if(!$db) {
    die($db->lastErrorMsg());
}

if (isset($_POST["addemp"])) {
    // Handle adding employee
    // Assuming you get these values from form inputs
    $e_id = $_POST['idbox'];
    $firstname = $_POST['fnbox'];
    $lastname = $_POST['lnbox'];
    $sex = $_POST['sexbox'];
    $email = $_POST['emailbox'];
    $phone = $_POST['phonebox'];
    $position = $_POST['posbox'];

    $addEmpSql = "INSERT INTO employees (emp_id, first_name, last_name, sex, email, phone, position)
               VALUES ($e_id, '$firstname', '$lastname', '$sex', '$email', '$phone', '$position')";
    $addAccSql = "INSERT INTO accounts (username, pass, emp_id) VALUES ('fwp' || $e_id, 'fwp1234', $e_id)";
    $db->exec($addEmpSql);
    $db->exec($addAccSql);
}

if (isset($_POST["editemp"])) {
    // Handle editing employee
    // Assuming you get these values from form inputs
    $e_id = $_POST['idbox'];
    $firstname = $_POST['fnbox'];
    $lastname = $_POST['lnbox'];
    $sex = $_POST['sexbox'];
    $email = $_POST['emailbox'];
    $phone = $_POST['phonebox'];
    $position = $_POST['posbox'];

    $editSql = "UPDATE employees
                SET first_name = '$firstname', last_name = '$lastname', sex = '$sex',
                email = '$email', phone = '$phone', position = '$position'
                WHERE emp_id = $e_id";
    $db->exec($editSql);
}

if (isset($_POST["delemp"])) {
    // Handle deleting employee
    $e_id = $_POST['idbox'];
    $delAccSql = "DELETE FROM accounts WHERE emp_id = $e_id";
    $delEmpSql = "DELETE FROM employees WHERE emp_id = $e_id";
    $db->exec($delAccSql);
    $db->exec($delEmpSql);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer History</title>

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->

    <!-- Font Awesome CSS -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->
    <link rel="stylesheet" href="style.css">
</head>
<body class='bg-orange-100 overflow-x-hidden'>
    <style>
        body{
            /* background-color: #FFECD9; */
            
        }
        .container {
            /* background-color: #fff; */
            width: 70%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
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
    
    <div class="container flex-1">
    
        <div class="text-center">
            <h1 class="font-bold text-[32px] text-center mt-5 sm:text-[38px]">จัดการบัญชีผู้ใช้</h1>
        </div>
        <div class="text-center">
            <form method="post" action="add_user.php">
                <button type="submit" name="add" class='p-2 bg-green-300 rounded-md hover:bg-green-200 px-6'><i class="fas fa-plus"></i> เพิ่มผู้ใช้ใหม่</button>
            </form>
        </div>
    <div class="flex flex-col">
      <div class="overflow-x-hidden mx-auto my-4">
        <div class="p-1.5 min-w-full inline-block align-middle">
          <div class="overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200 rounded-md">
              <thead>
                <tr>
                  <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">รหัสพนักงาน</th>
                  <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">ชื่อ</th>
                  <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">นามสกุล</th>
                  <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">เพศ</th>
                  <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">อีเมล</th>
                  <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">เบอร์โทรศัพท์</th>
                  <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">ตำเเหน่ง</th>
                  <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 ">
            <?php
            // SQL SELECT 
            $sql ="SELECT * FROM employees";
            $ret = $db->query($sql);   

            while($row = $ret->fetchArray(SQLITE3_ASSOC)) {
                echo "<tr>";
                echo "<td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800\">".$row["emp_id"]."</td>";
                echo "<td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800\">".$row["first_name"]."</td> ";
                echo "<td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800\">". $row["last_name"]."</td>";
                echo "<td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800\">".$row["sex"]."</td>";
                echo "<td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800\">".$row["email"]."</td>";
                echo "<td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800\">".$row["phone"]."</td>";
                echo "<td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800\">".$row["position"]."</td>";
                echo "<td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800\">";
                echo "<form method='post' action='edit_user.php'>";
                echo "<input type='hidden' name='idbox' value='".$row["emp_id"]."'>";
                echo "<button type='submit' name='editemp' class='p-2 bg-orange-300 rounded-md hover:bg-orange-200 px-4'><i class='fas fa-edit'></i> แก้ไข</button>";
                echo "</form>";
                echo "<form method='post' action='".htmlspecialchars($_SERVER["PHP_SELF"])."'>";
                echo "<input type='hidden' name='idbox' value='".$row["emp_id"]."'>";
                echo "<button type='submit' name='delemp' class='p-2 bg-red-300 rounded-md hover:bg-red-200 px-6 mt-3'><i class='fas fa-trash'></i> ลบ</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            // Close database
            $db->close();
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

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        var fname = "<?php echo $_SESSION['user']; ?>";
        document.getElementById('welcome').innerHTML = "ผู้จัดการ" + fname;
    </script>
</body>
</html>
