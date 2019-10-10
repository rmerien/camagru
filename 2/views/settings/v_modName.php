<!DOCTYPE html>
<html lang="en">

<head>
    <title>Modify Name</title>
    <meta charset="utf-8">
    <meta name="description" content="165c. uniques">
    <link rel="stylesheet" href="../../style/camagru.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cardo:400,700|Oswald">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<?php

    if (!$_SESSION['logged_on_user']) {   ?>

    <div class="page">
    <h2 class='page-title'>Sign In</h2>
    <p class='error-alert'>
      <?php
        echo $_SESSION['error'];
        unset($_SESSION['error']);
      ?>
    </p>
    <form action="../models/m_signin.php" method="post">
      <div class="container">
        <label for="uname"><b>Username</b></label>
        <input require type="text" placeholder="Enter Username" name="uname" required>
    
        <label for="psw"><b>Password</b></label>
        <input require type="password" placeholder="Enter Password" name="psw" required>
            
        <button class='submit-button' type="submit">Login</button>
    <!--    <label>
          <input type="checkbox" checked="checked" name="remember"> Remember me
        </label> -->
      </div>
    
      <div class="container" style="background-color:#f1f1f1">
        <span class="psw">Forgot <a href="#">password?</a></span>
      </div>
    </form>
    </div>
    
    <?php
    }
    else {
        header("Location: ..");
    }