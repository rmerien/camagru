<?PHP

$page = 'Settings';

include './structure/v_pageStructure.php';

echo $prePage;

if ($_SESSION['logged_on_user']['uname'] ){//&& $_SESSION['logged_on_user']['mail_c']) {   ?>

<div class="page">
<h2 class='page-title'>Settings</h2>
<?php var_dump($_GET); ?>
<div class='container-2'>
    <form id='set-nav' action='#' method='get'>
        <div class='set-menu'>
            <button class='set-index' type="submit" name='display' value='view_info'>User Info</button>
            <button class='set-index' type="submit" name='display' value='mod_mail'>Change Mail</button>
            <button class='set-index' type="submit" name='display' value='mod_pwrd'>Change Password</button>
            <button class='set-index' type="submit" name='display' value='manage_acc'>Privacy</button>
<!--    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label> -->
        </div>
    </form>
    <form id='form-v1' action='#' method='post'>
        <div class='set-body'>
        <label for="uname"><b>Username</b></label>
    <input require class='form-v1' type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input require class='form-v1' type="password" placeholder="Enter Password" name="psw" required>
        
    <button class='submit-button v1' type="submit">Login</button>
<!--    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label> -->
        </div>
        <br style="clear: left;" />
</div>
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
