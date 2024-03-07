<?php
session_start();

if (isset($_SESSION['mngLoggedin']) && $_SESSION["mngLoggedin"] === true) {
    ;
} else {
    header("Location: login.php");
    exit();
}