<?php

declare(strict_types= 1);

class Validate{

    private $username;
    private $password;
    private $pdo;

    function __construct(string $_username, string $_password, object $_pdo) {
        $this->username = $_username;
        $this->password = $_password;
        $this->pdo = $_pdo;
    }

    function validate($user) {

        $errors = [];

        if (empty($this->username) || empty($this->password)) {
            $errors["empty_input"] = "Fill all fields";
        } 

        if (!$user) {
            $errors["invalid_username"] = "Invalid username entered";
        }

        if ($user && !password_verify($this->password, $user["pwd"])) {
            $errors["invalid_password"] = "Invalid password entered";
        }

        if ($errors) {
            $_SESSION["login_errors"] = $errors;
            header("Location: ../auth/login.php");
            die();
        } else {
            return true;
        }
    }
}