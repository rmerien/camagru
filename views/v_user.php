<?PHP
require_once('./v_header.php');
//require_once('../controllers/c_userMod.php');



if (isset($_SESSION['logged_on_user'])) {
?>
<html>
    <head>
        <title>Sign Up | Camagru</title>
        <link rel="stylesheet" href="../public/stylesheets/form.css">
    </head>

    <body>
        </br>
        </br>
        </br>
        <div class="mid-wrap">
            <div class="form-wrap flex-container">
                <form method="POST" action="#">
                    <input type="submit" value="Change Password" name="pword"> </br>
                    <input type="submit" value="Change Mail" name="mail"> </br>
                </form>
            </div>
        </div>
    </body>
</html>

<?PHP
}
else {
    header('Location: /camagru/views/v_signin.php');
}

require_once('./v_footer.php');
?>