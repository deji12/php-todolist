<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $pwd = $_POST["password"];

    try {

        require_once __DIR__ . '/../utils/db.php';
        require_once __DIR__ . '/../models/user.models.php';
        require_once __DIR__ . '/../utils/validators/login_validator.php';

        $get_user = get_user($pdo, $username);

        $validate_data = new Validate($username, $pwd, $pdo);

        $get_user = get_user($pdo, $username);
    
        if ($validate_data->validate($get_user)) {
            $_SESSION["user_id"] = $get_user["id"];
            $_SESSION["user_username"] = $get_user["username"];

            // echo $_SESSION["user_id"];
            header("Location: ../index.php");
            die();
        }

    } catch (PDOException $e) {
        die("Error: " .$e->getMessage());
    }

} else {
    header("Location: ../auth/login.php");
    die();
}