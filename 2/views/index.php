<?php   
        require '../config/dir_config.php';
        include $DIR_VIEWS . 'v_pageStructure.php';
        include $DIR_CLASS . 'c_database.php';
?>

<?php echo $prePage; ?>

<?php
if ($_GET && isset($_GET['page']))
{
    switch ($_GET['page'])
    {
        case 'upload': $mainPart = $modelUpload;
        break;
        case 'settings': $mainPart = $modelSettings;
        break;
        case 'logout': $mainPart = $logout;
        break;
        case 'signin': $mainPart = $modelSignin;
        break;
        case 'signup': $mainPart = $modelSignup;
        break;
        default: $mainPart = $modelFeed;
    }
    echo $mainPart;
}
?>

<?php echo $postPage; ?>