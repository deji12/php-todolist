<?php

function check_messages() {
    if (isset($_SESSION["index_success"])) {

        echo '<br>';

        echo '<h4 style="color: #007bff;">' . $_SESSION["index_success"] . '</h4>';

        unset($_SESSION["index_success"]);
    } else if (isset($_SESSION["index_error"])) {
        echo '<br>';

        echo '<h4 style="color: firebrick;">' . $_SESSION["index_error"] . '</h4>';

        unset($_SESSION["index_error"]);
    }
}

function created_tasks() {

    require_once __DIR__ . '/../utils/db.php';
    require_once __DIR__ . '/../models/tasks.models.php';
    
    $tasks = get_user_tasks($pdo);

    if ($tasks) {
        foreach ($tasks as $task) {
            echo '<div class="item-row">';
            echo '<a class="btn btn-sm btn-info" href="./update-task.php?id=' . $task["id"] . '">Update</a> &nbsp;';
            echo '<a class="btn btn-sm btn-danger" href="./delete-task.php?id=' . $task["id"] . '">Delete</a>';

            if ($task["completed"]) {
                echo '&nbsp; <strike>' . htmlspecialchars($task["task"]) . '</strike>';
            } else {
                echo '&nbsp; ' . htmlspecialchars($task["task"]);
            }
            echo '</div>';
        }
    } else {
        echo "You have no tasks";
    }
}