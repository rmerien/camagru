<?php

include './class/c_image.php';
include './class/c_database.php';

$uname = $_POST['uname'];

var_dump($_POST);
echo $uname;

try {
    $query = Image::getImages($uname);
} catch (Exception $e) {
    echo 'Could not retrieve images, try again later';
}
echo 'loool';
echo $query;
