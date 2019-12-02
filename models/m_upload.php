<?php

include './class/c_image.php';
include './class/c_database.php';

session_start();

$uid = $_SESSION['logged_on_user']['uid'];


if ($uid) {
    $ext = $_POST['ext'];
    $b64_data = $_POST['data'];
    $caption = $_POST['caption'];
    $data = base64_decode($b64_data);

    $folder = '../img/' . $uid . '/';
    if (!file_exists($folder)) {
        mkdir($folder);
    }
    $img_name = uniqid($uid . '_') . '.' . $ext;
    $path = $folder . $img_name;

    $success = file_put_contents($path, $data);

    if (!$success) {
        echo 'Upload Failed: Error code 1';
        return;
    }
    try {
        Image::addImage($uid, $img_name, $caption);
    } catch (Exception $e) {
        echo 'Upload Failed: Error code 2';
    }
}