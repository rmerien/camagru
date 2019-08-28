<?PHP   require_once('views/v_header.php');
        require_once('config/db_query.php'); ?>

<?php       $img_list = pdo_query("SELECT * FROM image", array());
            while ($row = $img_list->fetch()) {
                echo "<div class='feed'>";
                echo "<img max-width='100px' max-height='100px' src='img/extern/".$row['owner'].'/'.$row['image']."' >";
                echo "<p>".$row['text']."</p>";
                echo "</div>";
            } ?>

<?PHP require_once('views/v_footer.php'); ?>