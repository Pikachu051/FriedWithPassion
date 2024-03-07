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

$e_id = $_POST['idbox'];
$firstname = $_POST['fnbox'];
$lastname = $_POST['lnbox'];
$sex = $_POST['sexbox'];
$email = $_POST['emailbox'];
$phone = $_POST['phonebox'];
$position = $_POST['posbox'];

if (isset($_POST["addemp"])) {
    $addsql = "INSERT INTO employees (emp_id, first_name, last_name, sex, email, phone, position)
               VALUES ($e_id, '$firstname', '$lastname', '$sex', '$email', '$phone', '$position')";
    $db->exec($addsql);
}

if (isset($_POST["editemp"])) {
    $editsql = "UPDATE employees
                SET first_name = '$firstname', last_name = '$lastname', sex = '$sex',
                email = '$email', phone = '$phone', position = '$position'
                WHERE emp_id = $e_id";
    $db->exec($editsql);
}

if (isset($_POST["delemp"])) {
    $delsql = "DELETE FROM employees WHERE emp_id = $e_id";
    $db->exec($delsql);
}

header("location:index.php");
exit();
?>
