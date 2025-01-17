<?php

Class User
{
	public static function checkValidInfo($uname, $mail, $passwd, $oldpasswd) {
        try {
			$allUsers = self::getFromAllUsers('username', 'mail');
		} catch (Exception $e) {
			throw $e;
		}

		if (!filter_var($mail, FILTER_VALIDATE_EMAIL) && $mail) {
			throw new Exception("Mail is invalid");
		}
		else if ($mail)
		{
			foreach($allUsers as $user)
			{
				if ($user["mail"] === $mail)
					throw new Exception("e-mail already registered.");
			}
		}

		if (!preg_match('/^[a-zA-Z0-9]{3,30}+$/', $uname))
			throw new Exception("The username can only be composed of alphanumerical characters.");
		else
		{
			foreach($allUsers as $user)
			{
				if ($user["username"] === $uname)
					throw new Exception("Username already taken.");
			}
		}

		if ($passwd)
		{
			if (strlen($passwd) < 8)
				throw new Exception("Password too short!");
			else if (!preg_match('/[0-9]+/', $passwd))
				throw new Exception("Password must include at least one number!");
			else if (!preg_match('/[A-Z]+/', $passwd))
				throw new Exception("Password must include at least one upper case letter!");
			else if (!preg_match('/[a-z]+/', $passwd))
				throw new Exception("Password must include at least one lower case letter!");
		}
        if ($oldpasswd)
        {
            $sql = "SELECT * FROM `user` WHERE `username` = :uname AND `passwd` = :oldpasswd";
            $param = array(
                ':oldpasswd' => $oldpasswd
            );
            try {
                $allUsers = self::getFromAllUsers('username', 'mail');
            } catch (Exception $e) {
                throw $e;
            }

		}
	}

	public static function signUp($uname, $mail, $passwd) {
 		$allUsers = null;

		try {
			self::checkValidInfo(
				$uname,
				$mail,
				$passwd,
				null
			);
		} catch (Exception $e) {
			throw $e;
		}

		$sql = "INSERT INTO `user` (`username`, `mail`, `passwd`)
				VALUES (:uname, :mail, :passwd)";
		$params = array(
			':uname'    => $uname,
			':mail'     => $mail,
			':passwd'   => hash('sha512', $passwd)
		);

		try {
			$handler = Database::pdoQuery($sql, $params);
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
		return ($handler);
	}

	public static function deleteUser($uname) {
		$sql = "DELETE FROM `user` WHERE `username` = :uname";

		$params = array(
			':uname' => $uname
		);
		
		try {
            $handler = Database::pdoQuery($sql, $params);
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
		return ($handler);
	}

	public static function signIn($uname, $passwd) {
		$passwd = hash('sha512', $passwd);
		$sql = "SELECT * FROM `user` WHERE `username` = :uname AND `passwd` = :passwd";

		$params = array(
			':uname'    => $uname,
			':passwd'   => $passwd
		);

		try {
			$handler = Database::pdoQuery($sql, $params);
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
		$query = $handler->fetch();
		
		if ($query === FALSE)
			throw new Exception("Incorrect username / password");
		if ($query['account_confirmed'] == 0)
			throw new Exception("Your account has not been confirmed yet");
		
		unset($query['passwd']);
		$_SESSION['logged_on_user'] = $query;
		return ($query);
	}

	public static function signOut() {
		if ($_SESSION && isset($_SESSION['logged_on_user']))
			unset($_SESSION['logged_on_user']);
	}

	public static function confirmAccount($token) {
		$sql = "UPDATE `user`
				INNER JOIN `token` ON `user`.`id_user` = `token`.`id_user`
				SET `user`.`account_confirmed` = 1 
				WHERE `token`.`token` = :token";

		$params = array(
			':token' => $token
		);

		try {
            $handler = Database::pdoQuery($sql, $params);
			if ($handler->rowCount() === 0)
				throw new Exception("This token is invalid");
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}

	public static function getFromAllUsers(...$toGet) {
		$sql = "SELECT ";
		$count = 0;
		foreach ($toGet as $column) {
			$sql .= $column;
			if (($count) + 1 < count($toGet))
				$sql .= ", ";
			$count++;
		}
		$sql .= " FROM `user`";

		try {
			$handler= Database::pdoQuery($sql, null);
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
		$query = $handler->fetchAll();
		return ($query);
	}

	public static function getUserByMail($mail) {
		$sql = "SELECT * FROM `user` WHERE `mail` = :mail";

		$params = array(
			':mail'  => $mail
		);

		try {
            $handler = Database::pdoQuery($sql, $params);
			$query = $handler->fetch();
			if ($query === FALSE)
				throw new Exception("There is no account registered with this e-mail");
		} catch (Exception $e) {
			throw $e;
		}
		return ($query);
	}

	public static function changePassword($uname, $passwd, $oldpasswd)
	{
		try {
			self::checkValidInfo($uname, 0, $passwd, $oldpasswd);
		} catch (Exception $e) {
			throw $e;
		}

		$sql = "UPDATE `user` SET `passwd` = :passwd WHERE `username` = :uname";

		
	}

	public static function updateUserInfo($updatedInfo) {
		try {
			self::checkValidInfo(
				$updatedInfo['uname'],
				$updatedInfo['mail'],
				$updatedInfo['passwd']
			);
		} catch (Exception $e) {
			throw $e;
		}
		$params = array();

		$sql = "UPDATE `user` SET";
		if ($updatedInfo['mail'] !== null)
		{
			$sql .= " `mail` = :mail,";
			$sql .= " `account_confirmed`=0,";
			$params[':mail'] = $updatedInfo['mail'];
		}
		if ($updatedInfo['passwd'] !== null)
		{
			$sql .= " `passwd` = :pword,";
			$params[':pword'] = hash('sha512', $updatedInfo['passwd']);
		}
		$sql = substr($sql, 0, -1);
		$sql .= " WHERE `username` = :uname";

		$params[':uname'] = $_SESSION['logged_on_user']['uname'];
		try {
            $handler = Database::pdoQuery($sql, $params);
			if ($updatedInfo['mail'] !== null)
				$_SESSION['logged_on_user']['mail'] = $updatedInfo['mail'];
			if ($updatedInfo['passwd'] !== null)
				$_SESSION['logged_on_user']['pword'] = $updatedInfo['passwd'];
		} catch (Exception $e) {
			throw $e;
		}
	}

	public static function updateUserPassword($uname, $oldpwd, $newpwd) {
		try {
			self::checkValidInfo(null, null, $pword, null);
			$sql = "UPDATE `user`
					SET `passwd` = :pword 
					WHERE `username` = :uname";

			$params = array(
				':pword' => hash('sha512', $pword),
				':uname'    => $uname
			);
            $handler = Database::pdoQuery($sql, $params);
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}

	public static function updateUserMail($uname, $mail) {
		try {
			self::checkValidInfo(null, null, $pword, null);
			$sql = "UPDATE `user`
					SET `passwd` = :pword 
					WHERE `username` = :uname";

			$params = array(
				':pword' => hash('sha512', $pword),
				':uname'    => $uname
			);
            $handler = Database::pdoQuery($sql, $params);
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}

}