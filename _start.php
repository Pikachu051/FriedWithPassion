<?php // ของพนง
session_start();

if (isset($_SESSION['stfLoggedin']) && $_SESSION["stfLoggedin"] === true) {
    ;
} else {
    // echo "<h1>Not logged in, redirecting...</h1>"; 
    header("Refresh: 1; URL = login.php"); // header("Location: login.php"); <- ไม่เอา delay
    exit();
}
?>

<?php
session_start(); // ของผจก

if (isset($_SESSION['mngLoggedin']) && $_SESSION["mngLoggedin"] === true) {
    ;
} else {
    // echo "<h1>Not logged in, redirecting...</h1>";
    header("Refresh: 1; URL = login.php"); // header("Location: login.php"); <- ไม่เอา delay
    exit();
}
?>