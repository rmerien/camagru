<?php   include_once('views/v_pageStructure.php');
        require_once('config/db_query.php'); ?>

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



/*      $img_list = pdo_query("SELECT * FROM image", array());?>
                <br><h2>Camagru</h2><br>
                <div class="flexbox" id="main-body">
<?php   while ($row = $img_list->fetch()) {
                echo    "<div class='feed' onclick='alert";
                //echo "(('You clicked me !'))'>
                  //              <img src='img/extern/".$row['owner'].'/'.$row['image']."' >
                    //            <p>".$row['owner'].' : '.$row['text']."</p>
                     //   </div>";
        } */?>

<?php echo $lowerPart; ?>