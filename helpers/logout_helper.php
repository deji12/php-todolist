<?php

session_start();
session_unset();
session_destroy();

if (isset($_GET["action"]) && $_GET["action"] == "password_reset") {
    header("Location: ../auth/login.php?action=password_reset");
    die();
}

header("Location: ../auth/login.php");
die();