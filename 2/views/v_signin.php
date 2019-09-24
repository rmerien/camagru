<?php   
        require './v_pageStructure.php';
        require '../models/class/c_database.php';
?>

<?php echo $prePage; ?>

<?php

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


        <div class="mid-wrap">
            <div class="form-wrap flex-container">
                <form method="POST" action="#">
                    <h1>Sign In</h1>
                    <input type="text" placeholder="Username" name="username">
                    <input type="password" placeholder="Password" name="password">
                    <input type="submit" value="Sign In">
                </form>
            </div>
        </div>


<?PHP
}
else {
    header("Location: ..");
}

?>

<?php echo $postPage; ?>