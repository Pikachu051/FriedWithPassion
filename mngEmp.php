<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fwp_project";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$e_id = $_POST['idbox'];
$firstname = $_POST['fnbox'];
$lastname = $_POST['lnbox'];
$sex = $_POST['sexbox'];
$email = $_POST['emailbox'];
$phone = $_POST['phonebox'];
$position = $_POST['posbox'];

if (isset($_POST["addemp"])) {
    $addsql = "INSERT INTO employees
                VALUES($e_id, '$firstname', '$lastname', '$sex', '$email', '$phone', '$position');";
    mysqli_query($conn, $addsql);
}

if (isset($_POST["editemp"])) {
    $editsql = "UPDATE employees
                SET first_name = '$firstname', last_name = '$lastname', sex = '$sex',
                email = '$email', phone = '$phone', position = '$position'
                WHERE emp_id = $e_id";
    mysqli_query($conn, $editsql);
}

if (isset($_POST["delemp"])) {
    $delsql = "DELETE FROM employees WHERE emp_id = $e_id";
    mysqli_query($conn, $delsql);
}

header("location:index.php");
exit();