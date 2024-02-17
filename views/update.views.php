<?php

session_start();

function check_errors() {
    if (isset($_SESSION["update_errors"])) {
        
        $errors = $_SESSION["update_errors"];

        foreach($errors as $error) {
            echo '<h4 style="color: firebrick;">' . $error . '</h4>';
        }
        echo "<br>";
        unset($_SESSION["update_errors"]);
    }
}