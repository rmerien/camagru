<?php

    $page = 'Sign in';

     require './structure/v_pageStructure.php';

echo $prePage; 

if (empty($_SESSION['logged_on_user'])) {   ?>

<div class="page">
<h2 class='page-title'>Sign In</h2>
<p class='error-alert'>
  <?php
    echo $_SESSION['error'];
    unset($_SESSION['error']);
  ?>
</p>
<form class='form-v1' action="../models/m_signin.php" method="post">
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input require class='form-v1' type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input require class='form-v1' type="password" placeholder="Enter Password" name="psw" required>
        
    <button class='submit-button form-v1' type="submit">Login</button>
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

echo $postPage; ?>