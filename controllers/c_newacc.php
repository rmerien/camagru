<?PHP

function	valid_login($login) {
	try	{
		$db = new PDO('mysql:host=localhost;dbname=rush00', 'root', 'rmerien');
  		$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $e)
	{
		header('Location: /index.php');
		return FALSE;
	}
	$select=$db->query("SELECT * FROM user");

	while($s = $select->fetch(PDO::FETCH_OBJ)) {
		if ($s->login === $login) {
			return FALSE;
		}
	}
	return TRUE;
}

?>