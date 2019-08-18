<?PHP
require_once('../config/db_query.php');

function	valid_login($login) {
	$select = pdo_query("SELECT uname FROM user", array());
	if (!$select)
		return FALSE;
	$data = $select->fetchAll();
	$select = NULL;
		foreach ($data as $name)
		{
			if ($name[0] == $login) {
				return FALSE;
			}
		}
	return TRUE;
}

?>