<?php

include './class/c_image.php';
include './class/c_database.php';

$uname = $_POST['uname'];

try {
    $query = Image::getImages($uname);
} catch (Exception $e) {
    echo 'Error: Could not retrieve images: ' . $e;
}
foreach($query as $user) {
    echo $user['uid'];
}
//var_dump($query);
