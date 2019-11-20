<?php
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

echo 'a';