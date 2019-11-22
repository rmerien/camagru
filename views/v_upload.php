<?php

$page = 'Upload';

include './structure/v_pageStructure.php';

echo $prePage; 

if (!empty($_SESSION['logged_on_user'])) { ?>

<div class="page" id='page'>
    <!-- page loaded with JS -->
</div>

<script type="text/javascript" src="../models/js/picture.js"></script>

<?php

}
else {
    header("Location: ..");
}

echo $postPage; ?>