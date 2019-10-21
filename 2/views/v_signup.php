<?PHP

    $page = 'signup';
     require './structure/v_pageStructure.php';

echo $prePage; 

if (!$_SESSION['logged_on_user']) {   ?>

<div class="page">
<h2 class='page-title'>Sign Up</h2>
<p class='error-alert'>
  <?php
    echo $_SESSION['error'];
    unset($_SESSION['error']);
  ?>
</p>
<form class='form-v1' action="../models/m_signup.php" method="post">
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input require class='form-v1' type="text" placeholder="Your Username" name="uname" required>

    <label for="mail"><b>Mail</b></label>
    <input require class='form-v1' type="text" placeholder="Your E-Mail" name="mail" required>

    <label for="psw"><b>Password</b></label>
    <input require class='form-v1' type="password" placeholder="Your Password" name="psw" required>
        
    <button class='submit-button form-v1' type="submit">Login</button>

  </div>

</form>
</div>

<?php
}
else {
    header("Location: ..");
}

echo $postPage;
