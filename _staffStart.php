<?php
session_start();

if (isset($_SESSION['stfLoggedin']) && $_SESSION["stfLoggedin"] === true) {
    ;
} else {
    header("Location: login.php");
    exit();
}