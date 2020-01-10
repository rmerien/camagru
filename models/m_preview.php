<?php

include './class/c_image.php';
include './class/c_database.php';

$uname = $_POST['path'];

try {
    $query = Image::getImageDetails($path);
} catch (Exception $e) {
    echo 'Error: Could not retrieve image details: ' . $e;
    return;
}

$response = json_encode($query);
echo $response;