<?php

session_start();

require_once "../views/register.views.php";
require_once "../utils/global_validator.php";

redirect_if_logged_in();
?>

<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Todo list | Register</title>
    <link rel="stylesheet" href="../static/style.css">
  </head>
  <body>
    <div class="center">
      <h1>Register</h1>
      
       <?php check_for_errors() ?>
        
      <form method="post" action="../helpers/register_helper.php">
      
        <div class="txt_field">
          <input type="text" required name="username">
          <span></span>
          <label>Username</label>
        </div>

        <div class="txt_field">
          <input type="password" required name="password">
          <span></span>
          <label>Password</label>
        </div>

        <div class="txt_field">
          <input type="password" required name="confirm_password">
          <span></span>
          <label>Confirm Password</label>
        </div>
    

        <!-- <div class="pass">Forgot Password?</div> -->
        <input type="submit" value="Register">
        <div class="signup_link">
          Already have an account? <a href="login.php">Login</a>
        </div>
      </form>
    </div>

  </body>
</html>