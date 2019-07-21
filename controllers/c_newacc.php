<?PHP

require_once('./c_db_query.php');

function	valid_login($login) {
	
	$select = pdo_query("SELECT * FROM user", array());
	if (!$select)
		return FALSE;
	while ($s = $select->fetch(PDO::FETCH_OBJ)) {
		var_dump("$s");
		if ($s->login === $login) {
			return FALSE;
		}
	}
	return TRUE;
}

?>