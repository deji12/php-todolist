<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $task = $_POST["add_task"];

    require_once __DIR__ . '/../utils/db.php';
    require_once __DIR__ . '/../models/tasks.models.php';

    if ($task) {

        add_task($pdo, $task);

        $_SESSION["signup_success"] = "Task added successfully";

        header("Location: ../index.php");
        die();

    } else {
        $_SESSION["index_error"] = "Fill the form to add a new task";
        header("Location: ../index.php");
        die();
    }

} else {
    header("Location: ../index.php");
    die();
}