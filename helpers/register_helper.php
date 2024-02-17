<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    try {
        require_once __DIR__ . '/../utils/db.php';
        require_once __DIR__ . '/../models/user.models.php';
        require_once __DIR__ . '/../utils/validators/register_validator.php';
        

        $validate_data = new Validate($username, $password, $confirm_password, $pdo);

        $validate_data->validate();

        create_user($pdo, $username, $password);

        $_SESSION["signup_success"] = "Signup successful. Proceed to login";

        header("Location: ../auth/login.php?signup=success");

        die();

    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }

} else {
    header("Location: ../auth/register.php");
    die();
}