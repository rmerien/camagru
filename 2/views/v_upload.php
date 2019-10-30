<?php

    $page = 'Upload';

    include './structure/v_pageStructure.php';

    echo $prePage; 

if (!empty($_SESSION['logged_on_user']) { ?>

<div class="page">

    <video id="video" width="640" height="480" autoplay></video>
    <button id="snap">Snap Photo</button>
    <canvas id="canvas" width="640" height="480"></canvas>
    <div><button onclick="to_image()">Draw to Image</button></div>

</div>


<script src="../models/js/picture.js"></script>

<?php
}
else {
    header("Location: ..");
}

echo $postPage; ?>    