<?php   
        require 'config/dir_config.php';
        echo getcwd();
        echo ' ' .$DIR_VIEWS . 'v_pageStructure.php';
       // require $DIR_VIEWS . 'v_pageStructure.php';
        include $DIR_CLASS . 'c_database.php';
        echo "123";?>

<?php echo $upperPart; ?>
<body>

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

<?php echo $lowerPart; ?>