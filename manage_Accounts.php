<?php
// 1. Connect to Database 
class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('fwp.db');
    }
}

// 2. Open Database 
$db = new MyDB();
if (!$db) {
    die($db->lastErrorMsg());
}

if (isset($_POST["addemp"])) {
    $firstname = $_POST['fnbox'];
    $lastname = $_POST['lnbox'];
    $sex = $_POST['sexbox'];
    $email = $_POST['emailbox'];
    $phone = $_POST['phonebox'];
    $position = $_POST['posbox'];
    $hash = password_hash("fwp1234", PASSWORD_DEFAULT); 

    if (isset($_POST['idbox'])) {
        $e_id = $_POST['idbox'];
        $addEmpSql = "INSERT INTO employees (emp_id, first_name, last_name, sex, email, phone, position)
               VALUES ($e_id, '$firstname', '$lastname', '$sex', '$email', '$phone', '$position')";
        $db->exec($addEmpSql);
        $addAccSql = "INSERT INTO accounts (username, pass, emp_id) VALUES ('fwp' || $e_id, $hash, $e_id)";
        $db->exec($addAccSql);
    } else {
        $addEmpSql = "INSERT INTO employees (first_name, last_name, sex, email, phone, position)
        VALUES ('$firstname', '$lastname', '$sex', '$email', '$phone', '$position')";
        $db->exec($addEmpSql);
        $sql = "SELECT emp_id FROM employees ORDER BY emp_id DESC LIMIT 1";
        $ret = $db->query($sql);
        $row = $ret->fetchArray(SQLITE3_ASSOC);
        $e_id = $row["emp_id"];
        $addAccSql = "INSERT INTO accounts (username, pass, emp_id) VALUES ('fwp' || $e_id, '$hash', $e_id)";
        $db->exec($addAccSql);
    }

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <style>
        body {
            background-color: #FFECD9;
            padding-top: 10px;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
    <div class="container">
        <div class="text-center">
            <h1>จัดการบัญชีผู้ใช้</h1>
        </div>
        <div class="text-center">
            <form method="post" action="add_user.php">
                <button type="submit" name="add" class="btn btn-success m-3"><i class="fas fa-plus"></i>
                    เพิ่มผู้ใช้ใหม่</button>
            </form>
        </div>
        <?php
        // SQL SELECT 
        $sql = "SELECT * FROM employees";
        $ret = $db->query($sql);

        echo "<table class='table'>";
        echo "<thead class='thead-dark'>";
        echo "<tr>";
        echo "<th>รหัสพนักงาน</th>";
        echo "<th>ชื่อ</th>";
        echo "<th>นามสกุล</th>";
        echo "<th>เพศ</th>";
        echo "<th>อีเมล</th>";
        echo "<th>เบอร์โทรศัพท์</th>";
        echo "<th>ตำเเหน่ง</th>";
        echo "<th>Actions</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row["emp_id"] . "</td>";
            echo "<td>" . $row["first_name"] . "</td> ";
            echo "<td>" . $row["last_name"] . "</td>";
            echo "<td>" . $row["sex"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "<td>" . $row["position"] . "</td>";
            echo "<td>";
            echo "<form method='post' action='edit_user.php'>";
            echo "<input type='hidden' name='idbox' value='" . $row["emp_id"] . "'>";
            echo "<button type='submit' name='editemp' class='btn btn-primary'><i class='fas fa-edit'></i> แก้ไข</button>";
            echo "</form>";
            echo "<form method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>";
            echo "<input type='hidden' name='idbox' value='" . $row["emp_id"] . "'>";
            echo "<button type='submit' name='delemp' class='btn btn-danger'><i class='fas fa-trash'></i> ลบ</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        // Close database
        $db->close();
        ?>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>