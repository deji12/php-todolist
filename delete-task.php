<?php

if (!isset($_GET["id"])) {
    header("Location: index.php");
    die();
} 

require_once 'utils/db.php';
require_once 'models/tasks.models.php';

$id = $_GET["id"];

delete_task($pdo, $id);

$_SESSION["index_success"] = "Task deleted successfully";

header("Location: index.php");
die();