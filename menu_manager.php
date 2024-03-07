<?php
    require_once "_mngStart.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Database</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <?php
    // 1. Connect to Database 
    class MyDB extends SQLite3 {
       function __construct() {
          $this->open('menu.db');
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
            echo "<table class='table'>";
            echo "<thead class='thead-dark'><tr><th>Image</th><th>Menu No</th><th>Menu Name</th><th>Description</th><th>Price</th><th>Status</th></tr></thead>";
            echo "<tbody>";
            while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
                echo "<tr>";
                echo "<td><img src='" . $row["img_path"] . "' alt='Menu Image' style='width:100px;height:auto;'></td>";
                echo "<td><a href='?invalue=" . $row["menu_no"] . "'>" . $row["menu_no"] . "</a></td>";
                echo "<td>" . $row["menu_name"] . "</td>";
                echo "<td>" . $row["description"] . "</td>";
                echo "<td>" . $row["price"] . "</td>";
                echo "<td>" . $row["status"] . "</td>";
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
        echo "<div class='form-group'><label for='menu_no'>รหัสเมนู:</label><input type='text' class='form-control' id='menu_no' name='menu_no' value=''></div>";
        echo "<div class='form-group'><label for='menu_name'>ชื่อเมนู:</label><input type='text' class='form-control' id='menu_name' name='menu_name' value=''></div>";
        echo "<div class='form-group'><label for='description'>รายละเอียด:</label><input type='text' class='form-control' id='description' name='description' value=''></div>";
        echo "<div class='form-group'><label for='price'>ราคา:</label><input type='text' class='form-control' id='price' name='price' value=''></div>";
        echo "<div class='form-group'><label for='status'>สถานะ:</label><br>";
        echo "<input type='radio' id='available' name='status' value='available' checked>";
        echo "<label for='available'>Available</label><br>";
        echo "<input type='radio' id='sold_out' name='status' value='sold out'>";
        echo "<label for='sold_out'>Sold Out</label>";
        echo "</div>";
        echo "<button type='submit' class='btn btn-primary' name='update'>Update</button> ";
        echo "<button type='submit' class='btn btn-danger' name='delete'>Delete</button>";
        echo "</form><br>";
    }

    // Function to display record details for editing
    function displayRecordDetails($db, $id) {
        $sql = "SELECT * FROM menu WHERE menu_no= '$id' ";
        $result = $db->query($sql);

        if ($result->numColumns() > 0) {
            $row = $result->fetchArray(SQLITE3_ASSOC);
            echo "<form method='post' class='mt-3'>";
            echo "<div class='form-group'><label for='menu_no'>รหัสเมนู:</label><input type='text' class='form-control' id='menu_no' name='menu_no' value='". $row["menu_no"]."'></div>";
            echo "<div class='form-group'><label for='menu_name'>ชื่อเมนู:</label><input type='text' class='form-control' id='menu_name' name='menu_name' value='". $row["menu_name"] ."'></div>";
            echo "<div class='form-group'><label for='description'>รายละเอียด:</label><input type='text' class='form-control' id='description' name='description' value='". $row["description"] ."'></div>";
            echo "<div class='form-group'><label for='price'>ราคา:</label><input type='text' class='form-control' id='price' name='price' value='". $row["price"] ."'></div>";
            echo "<div class='form-group'><label for='status'>สถานะ:</label><br>";
            echo "<input type='radio' id='available' name='status' value='available' ".(($row['status'] == 'available') ? 'checked' : '').">";
            echo "<label for='available'>Available</label><br>";
            echo "<input type='radio' id='sold_out' name='status' value='sold out' ".(($row['status'] == 'sold out') ? 'checked' : '').">";
            echo "<label for='sold_out'>Sold Out</label>";
            echo "</div>"; 
            echo "<button type='submit' class='btn btn-primary' name='update'>Update</button> ";
            echo "<button type='submit' class='btn btn-danger' name='delete'>Delete</button>";
            echo "</form><br>";
        } else {
            echo "<form method='post' class='mt-3'>";
            echo "<div class='form-group'><label for='menu_no'>รหัสเมนู:</label><input type='text' class='form-control' id='menu_no' name='menu_no' value=''></div>";
            echo "<div class='form-group'><label for='menu_name'>ชื่อเมนู:</label><input type='text' class='form-control' id='menu_name' name='menu_name' value=''></div>";
            echo "<div class='form-group'><label for='description'>รายละเอียด:</label><input type='text' class='form-control' id='description' name='description' value=''></div>";
            echo "<div class='form-group'><label for='price'>ราคา:</label><input type='text' class='form-control' id='price' name='price' value=''></div>";
            echo "<div class='form-group'><label for='status'>สถานะ:</label><br>";
            echo "<input type='radio' id='available' name='status' value='available' checked>";
            echo "<label for='available'>Available</label><br>";
            echo "<input type='radio' id='sold_out' name='status' value='sold out'>";
            echo "<label for='sold_out'>Sold Out</label>";
            echo "</div>";
            echo "<button type='submit' class='btn btn-primary' name='update'>Update</button> ";
            echo "<button type='submit' class='btn btn-danger' name='delete'>Delete</button>";
            echo "</form><br>";
        }
    }

    if (isset($_POST['update'])) {
        $menu_no = $_POST['menu_no'];
        $menu_name = $_POST['menu_name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $status = $_POST['status'];
        
        $sql = "UPDATE menu SET menu_name='$menu_name', description='$description', price='$price', status='$status' WHERE menu_no=$menu_no";
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
            // Refresh the page to reflect updated data
            echo "<meta http-equiv='refresh' content='0'>";
        } else {
            echo "<div class='alert alert-danger mt-3' role='alert'>Error deleting record</div>";
        }
    }

    // Display all records
    displayAllRecords($db);

    // Close connection
    $db->close();
    ?>
</div>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
