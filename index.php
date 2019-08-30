<?PHP   require_once('views/v_header.php');
        require_once('config/db_query.php'); ?>
<head>
        <link rel="stylesheet" href="/camagru/public/stylesheets/feed.css">
</head>
<body>

<?php       $img_list = pdo_query("SELECT * FROM image", array());?>
                <br><h2>Camagru</h2><br>
                <div class="flexbox" id="main-body">
<?php   while ($row = $img_list->fetch()) {
                echo    "<div class='feed'>
                                <img src='img/extern/".$row['owner'].'/'.$row['image']."' >
                                <p>".$row['text']."</p>
                        </div>";
        } ?>    </div>

<?PHP require_once('views/v_footer.php'); ?>