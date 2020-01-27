<?php

include './class/c_image.php';
include './class/c_mail.php';
include './class/c_comment.php';
include './class/c_database.php';

$action = $_POST['action'];

switch ($action) {
    case 'disableNotif':
        try {
        } catch (Exception $e) {
            echo 'Error';
        }
        break;
    case 'statusNotif':
        try {
            $response = Mail::checkNotif($_POST['uname']);
        } catch (Exception $e) {
            echo 'Error';
        }
        break;
    case 'enableNotif':
        try {
        } catch (Exception $e) {
            echo 'Error';
        }
        break;
    case 'changePassword':
        try {
        } catch (Exception $e) {
            echo $e;
        }
        break;
    case 'changeMail':
        try {
        } catch (Exception $e) {
            echo $e;
        }
        break;
}

echo $response;