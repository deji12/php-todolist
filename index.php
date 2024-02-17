<?php

require_once "utils/global_validator.php";
require_once "views/index.views.php";

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
<title>Home</title>

<div class="center-column">
	<h4>Username: <?php echo htmlspecialchars($_SESSION["user_username"]) ?></h4>
	
	<?php check_messages(); ?>

	<form method="post" action="helpers/add_task_helper.php">
		<input type="text" placeholder="Add Task" name="add_task">
		<input class="btn btn-info" value='Add Task' type="submit">
		
	</form>

	<a href="auth/update.php">
		<input class="btn btn-info" type="submit" value="Edit Profile">
	</a>
	<a href="helpers/logout_helper.php">
		<input class="btn btn-info" type="submit" value="Logout">
	</a>
	
	<div class="todo-list">

	<?php created_tasks(); ?>
	
	</div>
</div>