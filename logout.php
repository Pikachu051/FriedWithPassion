<?php
session_start();

if (
    (isset($_SESSION['stfLoggedin']) && $_SESSION["stfLoggedin"] === true) ||
    (isset($_SESSION['mngLoggedin']) && $_SESSION["mngLoggedin"] === true)
) {
    echo "<h1>Logging you out...</h1>";
    session_unset();
    session_destroy();
    header("Refresh: 1; URL = login.php");
    exit;
}