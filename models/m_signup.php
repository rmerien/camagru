<?php

session_start();
include './class/c_user.php';
include './class/c_database.php';
include './class/c_mail.php';


if (array_key_exists('uname', $_POST)
        && array_key_exists('mail', $_POST)
        && array_key_exists('psw', $_POST))	{
    try {

	$status = User::signUp($_POST['uname'], $_POST['mail'], $_POST['psw']);

		echo 'asd'; 
	header('Location: ../views/v_newacc.php');
	} catch (Exception $e) {
		$_SESSION['error'] = "Error: " . $e->getMessage();
		header('Location: ../views/v_signup.php');
	}
}
else {
	$_SESSION['error'] =  "Error: Missing or empty field";
	header('Location: ../views/v_signup.php');
}