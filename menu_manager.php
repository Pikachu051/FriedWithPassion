<?php
require_once "_managerStart.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Database</title>
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
</head>
<body class='bg-orange-100 overflow-x-hidden'>
    <style>
        .menu-link {
        color: red;
        }
        .container {
                /* background-color: #fff; */
                width: 100%;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .col-25 {
        float: left;
        width: 25%;
        margin-top: 6px;
        }

        .col-75 {
        float: left;
        width: 75%;
        margin-top: 6px;
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
    <div class="container">
    
    <div class="flex flex-col">
        <div class="overflow-x-hidden mx-auto my-4">
            <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="overflow-hidden">
                <div class="text-center">
                    <h1 class="font-bold text-[32px] text-center mt-0 sm:text-[38px]">จัดการเมนู</h1>
                </div>
                <table class="min-w-full divide-y divide-gray-200 rounded-md">
                <thead>
                    <tr>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">รูป</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">รหัสเมนู</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">ชื่อเมนู</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">คำอธิบาย</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">ราคา</th>
                    <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">สถานะสินค้า</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 ">
    <?php
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
    } else {
       
    }

    // Function to display all records in a table
    function displayAllRecords($db) {
        $sql = "SELECT * FROM menu";
        $ret = $db->query($sql); 

        if ($ret->numColumns() > 0) {
            // echo "<table >";
            // echo "<thead>
            // <tr>
            //     <th>Image</th>
            //     <th>Menu No</th>
            //     <th>Menu Name</th>
            //     <th>Description</th>
            //     <th>Price</th>
            //     <th>stock</th>
            // </tr>
            // </thead>";
            // echo "<tbody>";
            while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
                echo "<tr>";
                echo "<td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800\"><img src='" . $row["img_path"] . "' alt='Menu Image' style='width:100px;height:auto;'></td>";
                echo "<td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800\"><a href='?invalue=" . $row["menu_no"] . "' class='menu-link'>" . $row["menu_no"] . "</a></td>";
                echo "<td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800\">" . $row["menu_name"] . "</td>";
                echo "<td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800\">" . $row["description"] . "</td>";
                echo "<td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800\">" . $row["price"] . "</td>";
                echo "<td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800 text-end\">" . $row["stock"] . "</td>";
                echo "</tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "0 results";
        }
    }

    if (isset($_GET['invalue'])) {
        $id = $_GET['invalue'];
        displayRecordDetails($db, $id);
    } else {
        echo "<form method='post' class='mt-3'>";
        echo "<div class='row'>
                <div class='col-25'>
                <label for='menu_no'>รหัสเมนู:</label>
                </div>
                <div class='col-75'>
                <input type='text' class='form-control' id='menu_no' name='menu_no' value=''>
                </div>
            </div>";
        echo "<div class='row'>
                <div class='col-25'>
                <label for='menu_name'>ชื่อเมนู:</label>
                </div>
                <div class='col-75'>
                <input type='text' class='form-control' id='menu_name' name='menu_name' value=''>
                </div>
            </div>";
        echo "<div class='row'>
                <div class='col-25'>
                <label for='description'>รายละเอียด:</label>
                </div>
                <div class='col-75'>
                <input type='text' class='form-control' id='description' name='description' value=''>
                </div>
            </div>";
        echo "<div class='row'>
                <div class='col-25'>
                <label for='price'>ราคา:</label>
                </div>
                <div class='col-75'>
                <input type='text' class='form-control' id='price' name='price' value=''>
                </div>
            </div>";
        echo "<div class='row'>
            <div class='col-25'>
            <label for='stock'>สถานะ:</label>
            </div>
            <div class='col-75'>";
        echo "<input type='radio' id='available' name='stock' value='มีอยู่' checked>";
        echo "<label for='available'>มีอยู่</label><br>";
        echo "<input type='radio' id='sold_out' name='stock' value='หมด'>";
        echo "<label for='sold_out'>หมด</label></div>";
        echo "</div>";
        echo "<button type='submit' class='p-2 bg-orange-300 rounded-md hover:bg-orange-200 px-4' name='update'>Update</button> ";
        echo "<button type='submit' class='p-2 bg-red-300 rounded-md hover:bg-red-200 px-4 pl-6' name='delete'>Delete</button>";
        echo "</form><br>";
    }

    // Function to display record details for editing
    function displayRecordDetails($db, $id) {
        $sql = "SELECT * FROM menu WHERE menu_no= '$id' ";
        $result = $db->query($sql);

        if ($result->numColumns() > 0) {
            $row = $result->fetchArray(SQLITE3_ASSOC);
            echo "<form method='post' class='mt-3'>";
        echo "<div class='row'>
                <div class='col-25'>
                <label for='menu_no'>รหัสเมนู:</label>
                </div>
                <div class='col-75'>
                <input type='text' class='form-control' id='menu_no' name='menu_no' value='". $row["menu_no"]."'>
                </div>
            </div>";
        echo "<div class='row'>
                <div class='col-25'>
                <label for='menu_name'>ชื่อเมนู:</label>
                </div>
                <div class='col-75'>
                <input type='text' class='form-control' id='menu_name' name='menu_name' value='". $row["menu_name"] ."'>
                </div>
            </div>";
        echo "<div class='row'>
                <div class='col-25'>
                <label for='description'>รายละเอียด:</label>
                </div>
                <div class='col-75'>
                <input type='text' class='form-control' id='description' name='description' value='". $row["description"] ."'>
                </div>
            </div>";
        echo "<div class='row'>
                <div class='col-25'>
                <label for='price'>ราคา:</label>
                </div>
                <div class='col-75'>
                <input type='text' class='form-control' id='price' name='price' value='". $row["price"] ."'>
                </div>
            </div>";
        echo "<div class='row'>
            <div class='col-25'>
            <label for='stock'>สถานะ:</label>
            </div>
            <div class='col-75'>";
        echo "<input type='radio' id='available' name='stock' value='มีอยู่' checked>";
        echo "<label for='available'>มีอยู่</label><br>";
        echo "<input type='radio' id='sold_out' name='stock' value='หมด'>";
        echo "<label for='sold_out'>หมด</label></div>";
        echo "</div>";
        echo "<button type='submit' class='p-2 bg-orange-300 rounded-md hover:bg-orange-200 px-4' name='update'>Update</button> ";
        echo "<button type='submit' class='p-2 bg-red-300 rounded-md hover:bg-red-200 px-4 pl-6' name='delete'>Delete</button>";
        echo "</form><br>";

            

        } else {
            echo "<form method='post' class='mt-3'>";
        echo "<div class='row'>
                <div class='col-25'>
                <label for='menu_no'>รหัสเมนู:</label>
                </div>
                <div class='col-75'>
                <input type='text' class='form-control' id='menu_no' name='menu_no' value=''>
                </div>
            </div>";
        echo "<div class='row'>
                <div class='col-25'>
                <label for='menu_name'>ชื่อเมนู:</label>
                </div>
                <div class='col-75'>
                <input type='text' class='form-control' id='menu_name' name='menu_name' value=''>
                </div>
            </div>";
        echo "<div class='row'>
                <div class='col-25'>
                <label for='description'>รายละเอียด:</label>
                </div>
                <div class='col-75'>
                <input type='text' class='form-control' id='description' name='description' value=''>
                </div>
            </div>";
        echo "<div class='row'>
                <div class='col-25'>
                <label for='price'>ราคา:</label>
                </div>
                <div class='col-75'>
                <input type='text' class='form-control' id='price' name='price' value=''>
                </div>
            </div>";
        echo "<div class='row'>
            <div class='col-25'>
            <label for='stock'>สถานะ:</label>
            </div>
            <div class='col-75'>";
        echo "<input type='radio' id='available' name='stock' value='มีอยู่' checked>";
        echo "<label for='available'>มีอยู่</label><br>";
        echo "<input type='radio' id='sold_out' name='stock' value='หมด'>";
        echo "<label for='sold_out'>หมด</label></div>";
        echo "</div>";
        echo "<button type='submit' class='p-2 bg-orange-300 rounded-md hover:bg-orange-200 px-4' name='update'>Update</button> ";
        echo "<button type='submit' class='p-2 bg-red-300 rounded-md hover:bg-red-200 px-4 pl-6' name='delete'>Delete</button>";
        echo "</form><br>";
            
        }
    }

    if (isset($_POST['update'])) {
        $menu_no = $_POST['menu_no'];
        $menu_name = $_POST['menu_name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        
        $sql = "UPDATE menu SET menu_name='$menu_name', description='$description', price='$price', stock='$stock' WHERE menu_no=$menu_no";
        if ($db->exec($sql)) {
            echo "<div class='alert alert-success mt-3' role='alert'>Record updated successfully</div>";
            // Refresh the page to reflect updated data
            echo "<meta http-equiv='refresh' content='0'>";
        } else {
            echo "<div class='alert alert-danger mt-3' role='alert'>Error updating record</div>";
        }
    }

    if (isset($_POST['delete'])) {
        $id = $_POST['menu_no'];
        $sql = "DELETE FROM menu WHERE menu_no=$id";
        if ($db->exec($sql)) {
            echo "<div class='alert alert-success mt-3' role='alert'>Record deleted successfully</div>";
            
        } else {
            $error = $db->lastErrorMsg();
            echo "<div class='alert alert-danger mt-3' role='alert'>Error deleting record</div>";
        }
    }

    // Display all records
    displayAllRecords($db);

    // Close connection
    $db->close();
    ?>
</div>
</div>

<!-- Bootstrap JS -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</body>
</html>
