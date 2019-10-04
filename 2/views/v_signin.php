<?php
echo 'a';


        $page = 'Sign in';

        require './structure/v_pageStructure.php';
        require '../models/class/c_database.php';
 echo $prePage; 


 
if (isset($_POST) && isset($_SESSION) && !$_SESSION['logged_on_user']) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $login = $_POST['username'];
        $passwd = hash('sha512', $_POST['password']);
        /*if (valid_signin($login, $passwd)) {
            $_SESSION['logged_on_user'] = $login;
            $_SESSION['lou_mail'] = get_email($login);
        }
        */
            unset($_SESSION['logged_on_user']);
            echo "ERROR\n";
        
    }
}
?><body>


<div class="page">
<h2 class='page-title'>Sign In</h2>

<form action="../models/m_signin.php" method="post">
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <button class='submit-button' type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>
</div>
<?php
/*
if (!(isset($_SESSION['logged_on_user']))) {
?>


        <div class="page">
            <h1 class='page_title'>Sign In</h1>
            <form method="POST" action="#" class='form-template'>    
                <input type="text" placeholder="Username" name="username">
                <input type="password" placeholder="Password" name="password">
                <input type="submit" value="Sign In">
            </form>
        </div>


<?PHP
}
else {
    header("Location: ..");
}

?>

<?php */echo $postPage; ?>