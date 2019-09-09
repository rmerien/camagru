<?PHP   include_once('views/v_pageStructure.php');
        require_once('config/db_query.php'); ?>

<?PHP echo $upperPart; ?>
<body>

<?php /*      $img_list = pdo_query("SELECT * FROM image", array());?>
                <br><h2>Camagru</h2><br>
                <div class="flexbox" id="main-body">
<?php   while ($row = $img_list->fetch()) {
                echo    "<div class='feed' onclick='alert";
                //echo "(('You clicked me !'))'>
                  //              <img src='img/extern/".$row['owner'].'/'.$row['image']."' >
                    //            <p>".$row['owner'].' : '.$row['text']."</p>
                     //   </div>";
        } */?>

<?PHP echo $lowerPart; ?>