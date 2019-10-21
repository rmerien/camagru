<?PHP

$page = 'Settings';

include './structure/v_pageStructure.php';

echo $prePage;

if ($_SESSION['logged_on_user']['username'] ){//&& $_SESSION['logged_on_user']['mail_c']) {   ?>

<div class="page">
<h2 class='page-title'>Settings</h2>
<?php var_dump($_GET); 

echo '<br>';
var_dump($_POST);?>
<div class='flex-container container-2 flex-settings'>
    <div class='set-menu'>
       <form id='set-nav' action='#' method='get'>
            <button class='set-index' type="submit" name='display' value='view_info'>User Info</button>
            <button class='set-index' type="submit" name='display' value='mod_mail'>Change Mail</button>
            <button class='set-index' type="submit" name='display' value='mod_pwrd'>Change Password</button>
            <button class='set-index' type="submit" name='display' value='privacy'>Privacy</button>
<!--       <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label> -->
        </form>
    </div>

    <?php
    if ($_GET['display'] === 'mod_pwrd') {
    ?>

    <div class='set-body'>
        <form action='#' method='post'>
            <label for="psw"><b>Old Password</b></label><br>
            <input require class='form-v1' type="password" placeholder="Old Password" name="oldpsw" required style='width:80%;'><br>
            <label for="psw"><b>New Password</b></label><br>
            <input require class='form-v1' type="password" placeholder="New Password" name="newpsw" required style='width:80%;'>
        
            <button class='submit-button form-v1' type="submit" style='width:50%;'>Confirm</button>
        </form>
    </div>

    <?php
    } else if ($_GET['display'] === 'mod_mail') {
    ?>

    <div class='set-body'>
        <form action='#' method='post'>
            <label for="psw"><b>New Mail</b></label><br>
            <input require class='form-v1' type="text" placeholder="New Mail" name="oldmail" required style='width:80%;'><br>
            <label for="psw"><b>Confirm Mail</b></label><br>
            <input require class='form-v1' type="text" placeholder="Confirm Mail" name="newmail" required style='width:80%;'>
        
            <button class='submit-button form-v1' type="submit" style='width:50%;'>Confirm</button>
        </form>
    </div>

    <?php
    } else if ($_GET['display'] === 'privacy') {
    ?>
    <div class='set-body'>
        Lol
    </div>

    <?php
    } else {
    ?>
    <div class='set-body'>
        <h3><?php echo $_SESSION['logged_on_user']['uname']; ?></h3>
        <p>Mail: <?php echo $_SESSION['logged_on_user']['mail']; ?></p>

    </div>
</div>
</div>
    <?php
    }
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
