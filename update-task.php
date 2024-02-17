<?php

require_once "utils/global_validator.php";

redirect_to_login_if_not_authenticated();

?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style>

	body{
		background-color: #638CB8;
	}

	input{
		width: 100%;
		padding: 12px 20px;
		margin: 8px 0;
		box-sizing: border-box;
	}

	input::placeholder {
	  color: #d3d3d3;
	}

	.submit{
		background-color: #6BA3E8;
	}

	.center-column{
		width:600px;
		margin: 20px auto;
		padding:20px;
		background-color: #fff;
		border-radius: 3px;
		box-shadow: 6px 2px 30px 0px rgba(0,0,0,0.75);
	}

	.item-row{
		background-color: #906abd;
		margin: 10px;
		padding: 20px;
		border-radius: 3px;
		color: #fff;
		font-size: 16px;
		box-shadow: 0px -1px 10px -4px rgba(0,0,0,0.75);
	}

	.btn-danger{
		background-color: #ffae19;
		border-color: #e59400;
	}

</style>

<title>Update task</title>

<?php

if (!isset($_GET["id"])) {
    header("Location: index.php");
    die();
}

require_once 'utils/db.php';
require_once 'models/tasks.models.php';

$id = $_GET["id"];

$getTask = get_task($pdo, $id); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $task = $_POST["update_task"];
    $completed = null;

    if (isset($_POST["completed"])) {
        $completed = $_POST["completed"];
    } else {
        $completed = 0;
    }

    try {
        if ($task) {
            update_task_detail($pdo, $task, $id);
        }
        if (!$completed) {
            update_task_status($pdo, $id, $status=0);
        } else {
            update_task_status($pdo, $id, $status=1);
        }
        $_SESSION["index_success"] = "Task updated successfully";
        header("Location: index.php");
        die();
    }
    catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }

}

?>

<div class="center-column">

	<form method="post">
		<input type="text" placeholder="Update Task Name" value="<?php echo htmlspecialchars($getTask["task"]); ?>" required name="update_task">

        <?php 
        
        if ($getTask["completed"]) {
            echo '<p>Tick Checkbox below to mark as  un-completed</p>
            <input type="checkbox" name="completed" value="completed" checked>';
        } else {
            echo '<p>Tick Checkbox below to mark as completed</p>
            <input type="checkbox" name="completed" value="completed">';
        }
        
        ?>

		<input class="btn btn-info" type="submit" value="Update">
	</form>
</div>