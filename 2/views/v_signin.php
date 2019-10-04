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
        if (valid_signin($login, $passwd)) {
            $_SESSION['logged_on_user'] = $login;
            $_SESSION['lou_mail'] = get_email($login);
        }
        else {
            unset($_SESSION['logged_on_user']);
            echo "ERROR\n";
        }
    }
}
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

<?php echo $postPage; ?>