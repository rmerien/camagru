<?PHP

$page = 'Settings';

include './structure/v_pageStructure.php';

echo $prePage;

if (!empty($_SESSION['logged_on_user']['username'])){//&& $_SESSION['logged_on_user']['mail_c']) {   ?>

<div class="page">
    <h2 class='page-title'>Settings</h2>
    <div class='flex-container container-2 flex-settings'>
        <div id='set-menu'>
            <button id='menu-1' class='set-index' type="submit" name='display' value='view_info'></button>
            <button id='menu-2' class='set-index' type="submit" name='display' value='mod_mail'></button>
            <button id='menu-3' class='set-index' type="submit" name='display' value='mod_pwrd'></button>
            <button id='menu-4' class='set-index' type="submit" name='display' value='privacy'></button>
        </div>
        <div id='content'>
        </div>
    </div>
</div>

<script type='text/javascript'>
function loggedUsername(){
    return '<?php echo $_SESSION['logged_on_user']['username'];?>';
}
function loggedMail(){
    return '<?php echo $_SESSION['logged_on_user']['mail'];?>';
}
</script>
<script type="text/javascript" src="../models/js/settings.js"></script>

    <?php
}
else {
    header('Location: ../views');
}
echo $postPage; 
