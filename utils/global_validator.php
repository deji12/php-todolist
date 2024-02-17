<?php

session_start();
function redirect_to_login_if_not_authenticated() {
    if (!isset($_SESSION["user_id"])) {
        header("Location: auth/login.php");
        die();
    }
}

function redirect_if_logged_in() {
    if (isset($_SESSION["user_id"])) {
        header("Location: ../index.php");
        die();
    }
}