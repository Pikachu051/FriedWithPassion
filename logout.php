<?php
session_start();

if (
    (isset($_SESSION['stfLoggedin']) && $_SESSION["stfLoggedin"] === true) ||
    (isset($_SESSION['mngLoggedin']) && $_SESSION["mngLoggedin"] === true)
) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}