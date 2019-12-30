<?PHP

$page = 'Settings';

include './structure/v_pageStructure.php';

echo $prePage;

if (!empty($_SESSION['logged_on_user']['username'])){//&& $_SESSION['logged_on_user']['mail_c']) {   ?>

<div class="page">
<h2 class='page-title'>Settings</h2>
<?php var_dump($_GET); 

echo '<br>';
var_dump($_POST);?>
    <div class='flex-container container-2 flex-settings'>
        <div class='set-menu'>
            <div id='set-nav'>
                <button class='set-index' type="submit" name='display' value='view_info'>User Info</button>
                <button class='set-index' type="submit" name='display' value='mod_mail'>Change Mail</button>
                <button class='set-index' type="submit" name='display' value='mod_pwrd'>Change Password</button>
                <button class='set-index' type="submit" name='display' value='privacy'>Privacy</button>
<!--       <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label> -->
            </div>
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

    <?php
    }
    ?>

    </div>
</div>

    <?php
}
else {
    header('Location: ../views');
}
echo $postPage; 
