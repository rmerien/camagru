<?PHP
require_once('../config/db_query.php');

function	valid_login($login)	{
	$query = "SELECT uname FROM user WHERE uname = :login";
	$handler = pdo_query($query, array('login' => $login));
	if ($handler->rowCount() > 0){
		return FALSE;
	}
	return TRUE;
}

function	valid_email($email)	{
	$query = "SELECT mail FROM user WHERE mail = :mail";
	$handler = pdo_query($query, array('mail' => $email));
	if ($handler->rowCount() > 0){
		return FALSE;
	}
	return TRUE;
}
?>