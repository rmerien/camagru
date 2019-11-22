<?php

session_start();

$uid = $_SESSION['logged_on_user']['uid'];


if ($uid) {
    $ext = $_POST['ext'];
    $b64_data = $_POST['data'];
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
    }

  //  Image::addImage();
}


//$meta = str_replace 
/*
function base64ToImage($imageData, $folder){
    list($type, $imageData) = explode(';', $imageData);
 //   $extension = explode('/',$type)[1];
    list(,$imageData)      = explode(',', $imageData);
    $fileName = $folder . uniqid().'.'.$extension;
    $fileName = $folder . uniqid().'.jpeg';
    $imageData = base64_decode($imageData);
    $success = file_put_contents($fileName, $imageData);
    print $success ? $fileName : 'Unable to save the file.';
}
*/
/*session_start();

define('UPLOAD_DIR', '../img/' . $_SESSION['logged_on_user']['username'] . '/');

if (!file_exists(UPLOAD_DIR)) {
    mkdir(UPLOAD_DIR);
}

$img = $_POST['photo'];

$img = str_replace('data:image/jpeg;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = UPLOAD_DIR . uniqid() . '.jpeg';
$success = file_put_contents($file, $data);
print $success ? $file : 'Unable to save the file.';
*/