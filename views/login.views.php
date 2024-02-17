<?php

function check_for_message() {
    if (isset($_SESSION["login_errors"])) {
        $errors = $_SESSION["login_errors"];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<center><h4 style="color: firebrick;">' . $error . '</h4></center>';
        }

        unset($_SESSION["login_errors"]);
    } else if (isset($_SESSION["signup_success"])) {
        $message = $_SESSION["signup_success"];

        echo "<br>";

        echo '<center><h4 style="color: #2980b9;">' . $message . '</h4></center>';

        unset($_SESSION["signup_success"]);
    }
}