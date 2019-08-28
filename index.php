<?PHP   require_once('views/v_header.php');
        require_once('config/db_query.php'); ?>
<head>
        <title>Sign Up | Camagru</title>
        <link rel="stylesheet" href="/camagru/public/stylesheets/feed.css">
</head>
<body>

<?php       $img_list = pdo_query("SELECT * FROM image", array());
            echo "</br> </br>";
            while ($row = $img_list->fetch()) {
                echo "<div class='feed'>";
                echo "<img src='img/extern/".$row['owner'].'/'.$row['image']."' >";
                echo "<p>".$row['text']."</p>";
                echo "</div>";
            } ?>

<?PHP require_once('views/v_footer.php'); ?>