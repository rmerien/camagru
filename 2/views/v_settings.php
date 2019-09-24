<?PHP


require_once('./v_header.php');
require('../config/db_query.php');
//require_once('../controllers/c_userMod.php');

if (isset($_SESSION['logged_on_user'])) {
    $user = $_SESSION['logged_on_user'];
    $sql = "SELECT mail FROM user WHERE uname=:login";
    $handler = pdo_query($sql, array('login' => $user));
    $mail = $handler->fetch()[0];
?>

<html>
    <head>
        <title>Settings | Camagru</title>
        <link rel="stylesheet" href="../public/stylesheets/form.css">
    </head>
    <body>
        <br>
        <ul>
            <li><h3>Username: <?php echo $user?></h3></li>
            <li><h3>E-Mail: <?php echo $mail?></h3></li>
        </ul>
        <br>
        <div class="mid-wrap">
            <div class="form-wrap flex-container">
                <form method="POST" action="#">
                    <input type="submit" value="Change Password" name="pword"> <br>
                    <input type="submit" value="Change Mail" name="mail"> <br>
                </form>
            </div>
        </div>
    </body>
</html>

<?php
    if (array_search('Change Mail', $_POST)) {
    ?>
    <form method="POST" action="#">
        <h1>Change e-mail</h1>
        <input type="email" required placeholder="New e-mail" name="email">
        <input type="email" required placeholder="Confirm e-mail" name="email_check">
        <input type="submit" value="Submit changes" name='m_change'>
    </form>
    <?php
    }
    else if (array_search('Change Password', $_POST)) {
        ?>
        <form method="POST" action="#">
            <h1>Change password</h1>
            <input type="password" required placeholder="Old Password" name="old_pword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
            <input type="password" required placeholder="New password" name="pword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
            <input type="password" required placeholder="Repeat" name="pword_check" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
            <input type="submit" value="Submit changes" name='p_change'>
        </form>
        <?php
    }
}
else {
        echo 'PLEASE SIGN IN';
}
