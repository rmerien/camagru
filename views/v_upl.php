<?php

$page = 'Upload';

include './structure/v_pageStructure.php';

echo $prePage; 

if (!empty($_SESSION['logged_on_user'])) { ?>

<div class="page" id='page' style='width: 90vw;'>
    <div class='flex-container container-2 flex-settings' id='wrap-id-1'>
    </div>
</div>

<script type="text/javascript" src="../models/js/image_mod.js"></script>
<script type="text/javascript" src="../models/js/upl.js"></script>
<script type="text/javascript" src="../models/js/save_file.js"></script>

<?php

}
else {
    header(" Location: ..");
}

echo $postPage; ?>