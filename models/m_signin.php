<?php

session_start();
include './class/c_user.php';
include './class/c_database.php';

if (array_key_exists('uname', $_POST)
        && array_key_exists('psw', $_POST))	{
    try {
		$status = User::signIn($_POST["uname"], $_POST["psw"]);
		session_regenerate_id();
	} catch (Exception $e) {
		$_SESSION['error'] = "Error: " . $e->getMessage();
	}
	
}
else
	$_SESSION['error'] =  "Error: Missing or empty field";

header('Location: ../views/v_signin.php');