<?php

session_start();
require './class/c_user.php';
require './class/c_database.php';
require '../config/db_config.php';

var_dump($_POST);

Database::_pdoConnect($DB_DSN, $DB_USER, $DB_PWORD);

if (array_key_exists('uname', $_POST)
        && array_key_exists('psw', $_POST))
{
    try {
		$status = User::signIn($_POST["uname"], $_POST["psw"]);
	} catch (Exception $e) {
		$_SESSION['error'] = "Error: " . $e->getMessage();
		header('Location: ../views/v_signin.php');
	}
	session_regenerate_id();
	echo "Welcome back " . $_SESSION['logged_on_user']['uname'] . "!";
}
else
	$_SESSION['error'] =  "Error: Missing or empty field";


header('Location: ../views/v_signin.php');