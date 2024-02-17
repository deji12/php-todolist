<?php

declare(strict_types=1);

class Validate {
    private $username;
    private $password;
    private $confirm_password;
    private $pdo;

    function __construct(string $_username, string $_password, string $_confrm_password, object $_pdo) {
        $this->username = $_username;
        $this->password = $_password;
        $this->confirm_password = $_confrm_password;
        $this->pdo = $_pdo;
    }

    function validate() {

        $errors = [];

        if (empty($this->username) || empty($this->password) || empty($this->confirm_password)){
            $errors["empty_input"] = "All fields must be filled!";
        }

        if ($this->password !== $this->confirm_password) {
            $errors["passwords_not_match"] = "Passwords do not match";
        }

        if (strlen($this->password) < 5) {
            $errors["less_than_5_characters"] = "Password must be at least 5 characters long";
        } 

        if (get_username($this->pdo, $this->username)) {
            $errors["username_taken"] = "Username already taken!";
        }

        if ($errors) {
            $_SESSION["signup_errors"] = $errors;
            header("Location: ../register.php");
            die();
        }
    }

}