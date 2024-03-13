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
                /* width: 100%; */
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .col-25 {
        float: left;
        width: 100%;
        margin-top: 6px;
        }

        .col-75 {
        float: left;
        width: 100%;
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
                        <a href="menu_manager.php" class="block bg-orange-100 hover:bg-orange-200 text-black text-base rounded-md py-2 px-4 mt-4">จัดการเมนู</a>
                        <a href="logout.php" id="logout" class="block bg-red-400 hover:bg-red-500 text-white text-base rounded-md py-2 px-4 mt-4">ออกจากระบบ</a>
                    </form>
                </div>
    
    <div class="container w-[80%]">
    <div class="flex flex-col">
        <div class="overflow-x-hidden mx-auto my-4">
            <div class="p-1 px-4 py-2 ml-3.5 min-w-full inline-block align-middle">
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
        echo "<div class=\"mx-auto\">";
        echo "<form method=\"post\" class=\"mt-6\" enctype=\"multipart/form-data\">";
        echo "<div class='row'>
                <div class='col-25'>
                <label for='menu_no'>รหัสเมนู:</label>
                </div>
                <div class='col-75'>
                <input type='number' class='form-control bg-orange-50 px-4 py-2 text-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-300' id='menu_no' name='menu_no' value=''>
                </div>
            </div>";
        echo "<div class='row'>
                <div class='col-25'>
                <label for='menu_name'>ชื่อเมนู:</label>
                </div>
                <div class='col-75'>
                <input type='text' class='form-control bg-orange-50 p-1 px-4 py-2 ml-3 rounded-md text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-300' id='menu_name' name='menu_name' value=''>
                </div>
            </div>";

        echo "<div class='row'>
            <div class='col-25'>
            <label for='menu_name'>รูปภาพ:</label>
            </div>
            <div class='col-75'>
            <img src='' alt='Menu Image' style='width:100px;height:auto;'>
            <input type='file' name='menu_image'  id='menu_image'>
            </div>
        </div>";
        
        echo "<div class='row'>
                <div class='col-25'>
                <label for='description'>รายละเอียด:</label>
                </div>
                <div class='col-75'>
                <input type='text' class='form-control bg-orange-50 p-1 px-4 py-2 ml-3 rounded-md text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-300' id='description' name='description' value=''>
                </div>
            </div>";
        echo "<div class='row'>
                <div class='col-25'>
                <label for='price'>ราคา:</label>
                </div>
                <div class='col-75'>
                <input type='text' class='form-control bg-orange-50 p-1 px-4 py-2 ml-3 rounded-md text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-300' id='price' name='price' value=''>
                </div>
            </div>";
        echo "<div class='row'>
            <div class='col-25'>
            <label for='stock'>สถานะ:</label>
            </div>
            <div class='col-75 mb-4'>";
        echo "<input type='radio' class='mr-2' id='available' name='stock' value='มีอยู่' checked>";
        echo "<label for='available'>มีอยู่</label><br>";
        echo "<input type='radio' class='mr-2' id='sold_out' name='stock' value='หมด'>";
        echo "<label for='sold_out'>หมด</label></div>";
        echo "</div>";
        echo "<button type='submit' class='p-2 bg-green-300 rounded-md mx-2 hover:bg-green-200 px-4' name='add'>Add</button> ";
        echo "<button type='submit' class='p-2 bg-orange-300 rounded-md mx-2 hover:bg-orange-200 px-4' name='update'>Update</button>  ";
        echo "<button type='submit' class='p-2 bg-red-300 rounded-md mx-2 hover:bg-red-200 px-4 pl-6' name='delete'>Delete</button>";
        echo "<button type='submit' class='mb-6 p-2 bg-gray-300 rounded-md mx-2 hover:bg-gray-200 px-4' name='clear'>Clear</button> ";

        echo "</form><br></div>";
    }
    // Function to display record details for editing
    function displayRecordDetails($db, $id) {
        $sql = "SELECT * FROM menu WHERE menu_no= '$id' ";
        $result = $db->query($sql);

        if ($result->numColumns() > 0) {
            $row = $result->fetchArray(SQLITE3_ASSOC);
            echo "<form method=\"post\" class=\"mt-6\" enctype=\"multipart/form-data\">";
        echo "<div class='row'>
                <div class='col-25'>
                <label for='menu_no' class='font-semibold'>รหัสเมนู:</label>
                </div>
                <div class='col-75'>
                <input type='number' class='form-control bg-orange-50 p-1 px-4 py-2 ml-3 rounded-md text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-300' id='menu_no' name='menu_no' value='". $row["menu_no"]."'>
                </div>
            </div>";
        echo "<div class='row'>
                <div class='col-25'>
                <label for='menu_name' class='font-semibold'>ชื่อเมนู:</label>
                </div>
                <div class='col-75'>
                <input type='text' class='form-control bg-orange-50 p-1 px-4 py-2 ml-3 rounded-md text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-300' id='menu_name' name='menu_name' value='". $row["menu_name"] ."'>
                </div>
            </div>";
            echo "<div class='row'>
                <div class='col-25'>
                <label for='menu_name' class='font-semibold'>รูปภาพ:</label>
                </div>
                <div class='col-75'>
                <img src='" . $row["img_path"] . "' alt='Menu Image' style='width:100px;height:auto;'>
                <input type='file' name='menu_image'  id='menu_image'>
                </div>
            </div>";
        echo "<div class='row'>
                <div class='col-25'>
                <label for='description' class='font-semibold'>รายละเอียด:</label>
                </div>
                <div class='col-75'>
                <input type='text' class='form-control bg-orange-50 p-1 px-4 py-2 ml-3 rounded-md text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-300' id='description' name='description' value='". $row["description"] ."'>
                </div>
            </div>";
        echo "<div class='row'>
                <div class='col-25'>
                <label for='price' class='font-semibold'>ราคา:</label>
                </div>
                <div class='col-75'>
                <input type='text' class='form-control bg-orange-50 p-1 px-4 py-2 ml-3 rounded-md text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-300' id='price' name='price' value='". $row["price"] ."'>
                </div>
            </div>";
        echo "<div class='row'>
            <div class='col-25'>
            <label for='stock' class='font-semibold'>สถานะ:</label>
            </div>
            <div class='col-75 mb-4'>";
        echo "<input type='radio' class='mr-2' id='available' name='stock' value='มีอยู่' checked>";
        echo "<label for='available'>มีอยู่</label><br>";
        echo "<input type='radio' class='mr-2' id='sold_out' name='stock' value='หมด'>";
        echo "<label for='sold_out'>หมด</label></div>";
        echo "</div>";
        echo "<button type='submit' class='p-2 bg-green-300 rounded-md mx-2 hover:bg-green-200 px-4' name='add'>Add</button> ";
        echo "<button type='submit' class='p-2 bg-orange-300 rounded-md mx-2 hover:bg-orange-200 px-4' name='update'>Update</button>";
        echo "<button type='submit' class='p-2 bg-red-300 rounded-md mx-2 hover:bg-red-200 px-4 pl-6' name='delete'>Delete</button>";
      echo "<button type='submit' class='mb-6 p-2 bg-gray-300 rounded-md mx-2 hover:bg-gray-200 px-4' name='clear'>Clear</button> ";

        echo "</form><br>";

            

        } else {
            echo "<form method=\"post\" class=\"mt-3\" enctype=\"multipart/form-data\">";
        echo "<div class='row'>
                <div class='col-25'>
                <label for='menu_no' class='font-semibold'>รหัสเมนู:</label>
                </div>
                <div class='col-75'>
                <input type='number' class='form-control bg-orange-50 p-1 px-4 py-2 ml-3 rounded-md text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-300' id='menu_no' name='menu_no' value=''>
                </div>
            </div>";
        echo "<div class='row'>
                <div class='col-25'>
                <label for='menu_name' class='font-semibold'>ชื่อเมนู:</label>
                </div>
                <div class='col-75'>
                <input type='text' class='form-control bg-orange-50 p-1 px-4 py-2 ml-3 rounded-md text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-300' id='menu_name' name='menu_name' value=''>
                </div>
            </div>";
        echo "<div class='row'>
                <div class='col-25'>
                <label for='description' class='font-semibold'>รายละเอียด:</label>
                </div>
                <div class='col-75'>
                <input type='text' class='form-control bg-orange-50 p-1 px-4 py-2 ml-3 rounded-md text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-300' id='description' name='description' value=''>
                </div>
            </div>";
        echo "<div class='row'>
                <div class='col-25'>
                <label for='price' class='font-semibold'>ราคา:</label>
                </div>
                <div class='col-75'>
                <input type='text' class='form-control bg-orange-50 p-1 px-4 py-2 ml-3 rounded-md text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-300' id='price' name='price' value=''>
                </div>
            </div>";
        echo "<div class='row'>
            <div class='col-25'>
            <label for='stock' class='font-semibold'>สถานะ:</label>
            </div>
            <div class='col-75 mb-4'>";
        echo "<input type='radio' class='mr-2' id='available' name='stock' value='มีอยู่' checked>";
        echo "<label for='available'>มีอยู่</label><br>";
        echo "<input type='radio' class='mr-2' id='sold_out' name='stock' value='หมด'>";
        echo "<label for='sold_out'>หมด</label></div>";
        echo "</div>";
        echo "<button type='submit' class='p-2 bg-green-300 rounded-md mx-2 hover:bg-green-200 px-4' name='add'>Add</button> ";
        echo "<button type='submit' class='p-2 bg-orange-300 rounded-md mx-2 hover:bg-orange-200 px-4' name='update'>Update</button>";
        echo "<button type='submit' class='p-2 bg-red-300 rounded-md mx-2 hover:bg-red-200 px-4 pl-6' name='delete'>Delete</button>";
      echo "<button type='submit' class='mb-6 p-2 bg-gray-300 rounded-md mx-2 hover:bg-gray-200 px-4' name='clear'>Clear</button> ";
        
        echo "</form><br>";
            
        }
    }

    if (isset($_POST['add'])) {
        $menu_no = $_POST['menu_no'];
        $menu_name = $_POST['menu_name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
    
        // ตรวจสอบว่ามีไฟล์รูปถูกอัปโหลดมาหรือไม่
        if (isset($_FILES['menu_image'])) {
            $file_name = $_FILES['menu_image']['name'];
            $file_temp = $_FILES['menu_image']['tmp_name'];
            $file_size = $_FILES['menu_image']['size'];
            $file_error = $_FILES['menu_image']['error'];
    
            // ตรวจสอบว่าไม่มีข้อผิดพลาดของไฟล์
            if ($file_error === 0) {
                // กำหนดตำแหน่งเก็บไฟล์รูป
                $target_dir = "menu_img/";
                $target_file = $target_dir . $file_name;
    
                // ย้ายไฟล์รูปไปยังตำแหน่งที่กำหนด
                if (move_uploaded_file($file_temp, $target_file)) {
                    // สร้างคำสั่ง SQL เพื่อเพิ่มข้อมูลลงในฐานข้อมูล
                    $sql = "INSERT INTO menu (menu_no, menu_name, `description`, price, stock, img_path) VALUES ('$menu_no', '$menu_name', '$description', '$price', '$stock', '$target_file')";
    
                    // ทำการ execute คำสั่ง SQL
                    if ($db->exec($sql)) {
                        echo "<div class='alert alert-success mt-3' role='alert'>Record added successfully</div>";
                    } else {
                        echo "<div class='alert alert-danger mt-3' role='alert'>Error adding record</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger mt-3' role='alert'>Error uploading image file</div>";
                }
            } else {
                echo "<div class='alert alert-danger mt-3' role='alert'>Error uploading image file</div>";
            }
        } else {
            echo "<div class='alert alert-danger mt-3' role='alert'>Please upload an image file</div>";
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
    
            if (isset($_FILES['menu_image'])) {
                $file_name = $_FILES['menu_image']['name'];
                $file_temp = $_FILES['menu_image']['tmp_name'];
                $file_size = $_FILES['menu_image']['size'];
                $file_error = $_FILES['menu_image']['error'];
    
                // Check for file errors
                if ($file_error === 0) {
                    $sql_existing_img = "SELECT img_path FROM menu WHERE menu_no=$menu_no";
                    $result_existing_img = $db->querySingle($sql_existing_img);
    
                    // If there's an existing image, delete it
                    if ($result_existing_img) {
                        unlink($result_existing_img); // Delete the existing image
                    }
    
                    $target_dir = "menu_img/";
                    
                    // Move the uploaded file to the target directory
                    if (move_uploaded_file($file_temp, $target_dir . $file_name)) {
                        // Update the image path in the database
                        $img_path = $target_dir . $file_name;
                        $sql_update_img = "UPDATE menu SET img_path='$img_path' WHERE menu_no=$menu_no";
                        if ($db->exec($sql_update_img)) {
                            echo "<div class='alert alert-success mt-3' role='alert'>File uploaded successfully</div>";
                        } else {
                            echo "<div class='alert alert-danger mt-3' role='alert'>Error updating image path in the database</div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger mt-3' role='alert'>Error moving uploaded file</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger mt-3' role='alert'>Error uploading file</div>";
                }
            }
    
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

    if (isset($_POST['clear'])) {
        // เซตค่าฟอร์มเป็นค่าว่างหรือค่าเริ่มต้นที่ต้องการ
        echo "<script>window.location = window.location.href.split('?')[0];</script>";
        // หรือใช้ header() เพื่อเรียกหน้าเว็บใหม่
        // header("Refresh:0");
        // exit(); // ต้องทำการออกจากการรัน script หลังจาก redirect เพื่อให้การทำงานของ header() มีผล
    }

    // Display all records
    displayAllRecords($db);

    // Close connection
    $db->close();
    ?>
    
</div>
</div>
<script>
        var fname = "<?php echo $_SESSION['user']; ?>";
        document.getElementById('welcome').innerHTML = "ผู้จัดการ" + fname;
</script>

<!-- Bootstrap JS -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</body>
</html>
