<?PHP   require_once('views/v_header.php');
        require_once('config/db_query.php'); ?>
<head>
        <title>Sign Up | Camagru</title>
        <link rel="stylesheet" href="/public/stylesheets/feed.css">
</head>
<?php       $img_list = pdo_query("SELECT * FROM image", array());
            echo "</br> </br>";
            while ($row = $img_list->fetch()) {
                echo "<div class='feed'>";
                echo "<img  style='max-height:300px;max-width:300px' src='img/extern/".$row['owner'].'/'.$row['image']."' >";
                echo "<p>".$row['text']."</p>";
                echo "</div>";
            } ?>

<?PHP require_once('views/v_footer.php'); ?>