<?PHP

$page = 'Settings';

include './structure/v_pageStructure.php';

echo $prePage;

if ($_SESSION['logged_on_user']['uname'] ){//&& $_SESSION['logged_on_user']['mail_c']) {   ?>

    <div class="page">
    <h2 class='page-title'>Settings</h2>

    <p>
        username: <?php echo $_SESSION['logged_on_user']['uname'];?>
        <a href='./settings/v_modName.php'>modify</a>
    </p>
    <p>
        e-mail: <?php echo $_SESSION['logged_on_user']['mail'];?>
        <a href='./settings/v_modMail.php'>modify</a>
    </p>
    <p>
        <a href='./settings/v_modPsw.php'>Change password</a>
    </div>
<?php
}
else {
    header('Location: ../views');
}
echo $postPage; 


/*
require_once('./v_header.php');
require('../config/db_query.php');
//require_once('../controllers/c_userMod.php');

if (isset($_SESSION['logged_on_user'])) {
    $user = $_SESSION['logged_on_user'];
    $sql = "SELECT mail FROM user WHERE uname=:login";
    $handler = pdo_query($sql, array('login' => $user));
    $mail = $handler->fetch()[0];
?>

<div class="page">
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

<?php
    if (array_search('Change Mail', $_POST)) {
    ?>
    <form method="POST" action="#">
        <h1>Change e-mail</h1>
        <input type="email" required placeholder="New e-mail" name="email">
        <input type="email" required placeholder="Confirm e-mail" name="email_check">
        <input type="submit" value="Submit changes" name='m_change'>
    </form>
    </div>
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
        </div>
        <?php
    }
    else
        echo '</div>';
}
else {
        echo 'PLEASE SIGN IN';
}
