<?PHP
require_once('./v_header.php');

session_start();

if (isset($_POST) && isset($_SESSION)) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $login = $_POST['username'];
        $passwd = $_POST['password'];
        $passwd = hash('sha512', $passwd);
        if (auth($login, $passwd)) {
            $_SESSION['logged_on_user'] = $login;
            echo "OK\n";
        }
        else {
            $_SESSION['logged_on_user'] = "";
            echo "ERROR\n";
        }
    }
}
if (($_SESSION['logged_on_user']) === "" || !(isset($_SESSION['logged_on_user']))) {
?>

<html>
    <head>
        <title>Sign In | Camagru</title>
		<link rel="stylesheet" href="../public/stylesheets/form.css">
    </head>
    
    <body>
        <div class="mid-wrap">
            <div class="form-wrap flex-container">
                <form method="POST" action="#">
                    <h1>Sign In</h1>
                    <input type="text" placeholder="Username">
                    <input type="password" placeholder="Password">
                    <input type="submit" value="Sign In">
                </form>
            </div>
        </div>
    </body>
</html>

<?PHP
}
else {
    header("Location: /");
}
require_once('./v_footer.php'); ?>