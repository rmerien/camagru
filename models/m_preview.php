<?php

include './class/c_image.php';
include './class/c_like.php';
include './class/c_comment.php';
include './class/c_database.php';

$action = $_POST['action'];
$iid = intval($_POST['iid']);

switch ($action) {
    case 'getComments':
        try {
            $response = JSON_encode(Comment::getComments($iid));
        } catch (Exception $e) {
            echo 'Error';
        }
        break;
    case 'likeAmount':
        try {
            $response = Like::getLikeAmount($iid);
        } catch (Exception $e) {
            echo 'Error';
        }
        break;
    case 'likeToggle':
        try {
            $response = Like::toggleLike($idd, $_POST['uid']);
        } catch (Exception $e) {
            echo 'Error';
        }
        break;
    case 'addComment':
        try {
            Comment::addComment($_POST['uid'], $_POST['comment'], $iid);
        } catch (Exception $e) {
            echo $e;
        }
        break;
    case 'delImage':
        try {
            Image::delImage($iid);
        } catch (Exception $e) {
            echo $e;
        }
        break;
}

echo $response;