<?php

$page = 'Preview';

include './structure/v_pageStructure.php';

echo $prePage; 

if (!empty($_SESSION['logged_on_user'])) { ?>

<div class="page" id='page' style='width: 90vw;'>
    <div class='flex-container container-2 flex-settings'>
        <div id='up-main'><img alt='preview' id='prev'></img></div>
        <div id='up-strip'></div>
    </div>
</div>

<script type="text/javascript" src="../models/js/picture.js"></script>

<?php

}
else {
    header("Location: ..");
}

echo $postPage; ?>