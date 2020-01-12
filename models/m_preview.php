<?php

include './class/c_image.php';
include './class/c_database.php';

/*$action = $_POST['action'];

switch ($action) {
    case 'comments':
        $response = getComments();
        break;
    case 'likeAmount':
        $response = getLikeAmount();
        break;
    case 'addLike':
        $response = addLike();
}
$path = $_POST['path'];

try {
    $query = Image::getImageDetails($path);
} catch (Exception $e) {
    echo 'Error: Could not retrieve image details: ' . $e;
    return;
}

//$response = json_encode($query);
//echo $response;