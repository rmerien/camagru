<?php

    $page = 'Upload';

     require './structure/v_pageStructure.php';

echo $prePage; 

if ($_SESSION['logged_on_user']) {   ?>

<div class="page">

    <h2 class='page-title'>Upload</h2>
    <p class='error-alert'>
    <?php
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    ?>
    </p>


</div>

<?php
}
else {
    header("Location: ..");
}

echo $postPage; ?>