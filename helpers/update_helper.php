<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"] ?? "";
    $password = $_POST["new_password"] ?? "";
    $confirm_password = $_POST["confirm_new_password"] ?? "";

    require_once __DIR__ . '/../utils/db.php';
    require_once __DIR__ . '/../models/user.models.php';

    // Validation

    $errors = [];

    if (!empty($_SESSION["user_username"]) && $username === $_SESSION["user_username"]) {
        $errors["same_username"] = "You can't update username to your current username";
    }

    // Check if both new password and confirm new password are provided
    if (($password || $confirm_password) && $password && $confirm_password) {
        if ($password !== $confirm_password) {
            $errors["password_mismatch"] = "New password and confirm password do not match";
        }
    } elseif ($password || $confirm_password) {
        $errors["incomplete_password"] = "Please provide both new password and confirm new password";
    }

    if (empty($username) && empty($password) && empty($confirm_password)) {
        $errors["empty_fields"] = "Fill the fields you wish to update";
    }

    if (empty($errors)) {
        if ($username && !$password) {
            update_user_username($pdo, $username);
            $_SESSION["index_success"] = "Username updated successfully";
            header("Location: ../index.php");
            die();
        }
        else if ($password && !$username) {
            update_user_password($pdo, $password);
        }
        else if ($username && $password) {
            update_user_username($pdo, $username);
            update_user_password($pdo, $password);
        }
        header("Location: ../helpers/logout_helper.php?action=password_reset");
        die();

    } else {
        $_SESSION["update_errors"] = $errors;
        header("Location: ../auth/update.php");
        die();
    }
}
