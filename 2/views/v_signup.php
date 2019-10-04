<?PHP

$page = 'signup';

require_once('../controllers/c_newacc.php');
require_once('../config/db_query.php');

$uname = $_POST["user"];
$mail = $_POST["mail"];
$passwd = $_POST["pwd"];
$passwd2 = $_POST["pwd2"];
if ($passwd !== $passwd2) {
    echo "<p class='alert error'> Error : passwords don't match </p>";
}
else if (isset($_POST) && isset($_POST['pwd'])) {
    if (!valid_login($uname)) {
        echo '<p class="alert error">Username already taken.</p>';
    }
    else if (!valid_email($mail)) {
        echo '<p class="alert error">E-mail already registered.</p>';
    }
	else {
        $passwd = hash('sha512', $passwd);
        pdo_query("INSERT INTO `user` (`uname`, `mail`, `passwd`) VALUES (:uname, :mail, :passwd)", array("uname" => $uname, "mail" => $mail, "passwd" => $passwd)); 
	    echo "<p class='alert'> Account successfully created </p>";
	}
}

if (($_SESSION['logged_on_user']) === "" || !(isset($_SESSION['logged_on_user']))) {
?>
<html>
    <head>
        <title>Sign Up | Camagru</title>
        <link rel="stylesheet" href="../public/stylesheets/form.css">
    </head>

    <body>
        <div class="mid-wrap">
            <div class="form-wrap flex-con tainer">
                <form method="POST" action="#">
                    <h1>Sign Up</h1>
                    <input type="text" placeholder="Username" required name="user">
                    <input type="email" placeholder="Email" required name="mail">
                    <input type="password" placeholder="Password" required name="pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
                    <input type="password" placeholder="Confirm Password" required name="pwd2">
                    <input type="submit" value="Sign Up" name="submit">
                </form>
            </div>
        </div>
    </body>
</html>

<?PHP
}
else {
    echo $_SESSION['logged_on_user'];
}

require_once('./v_footer.php');
?>