<?php

class Image
{
    public static function addImage($uid, $path, $caption)
    {
		$sql = "INSERT INTO `image` (`uid`, `path`, `caption`)
				VALUES (:uid, :path, :caption)";
		$params = array(
			':uid'    => $uid,
			':path'     => $path,
			':caption'   => $caption
		);

		try {
			$handler = Database::pdoQuery($sql, $params);
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
		return ($handler);
	}

	/*public static function getImages($uname)
	{
		if ($uname) {
			$sql = "SELECT `uid` FROM `user` WHERE `username` LIKE :uname";
			$params = array(
				'uname' => $uname . '%'
			);
			try {
				$handler = Database::pdoQuery($sql, $params);
			} catch (Exception $e) {
				throw new Exception($e->getMessage());
			}
			$users = $handler->fetchAll();
			$arrayUser = array();

			if (count($users)) {
				foreach ($users as $u) {
					if (gettype($u['uid']) === 'integer') {
						$arrayUser[] = $u['uid'];
					}
				}

				$clause = implode(',', array_fill(0, count($arrayUser), '?'));

				$sql = "SELECT * FROM `image` WHERE `uid` IN ($clause)";
				$params = $arrayUser;
				try {
					$handler = Database::pdoQuery($sql, $params);
				} catch (Exception $e) {
					throw new Exception($e->getMessage());
				}
				$query = $handler->fetchAll();
			}
			else {
				$query = array();
			}
		}
		else {
			$sql = "SELECT * FROM `image`";
			$params = array();
			try {
				$handler = Database::pdoQuery($sql, $params);
			} catch (Exception $e) {
				throw new Exception($e->getMessage());
			}
			$query = $handler->fetchAll();
		}
		return ($query);
	}*/

	public static function getImages($uname)
	{
		$sql = "SELECT image.*, user.username FROM `image` INNER JOIN `user` USING (uid) WHERE user.username LIKE :uname";
		$params = array(
			'uname' => $uname . '%'
		);
		try {
			$handler = Database::pdoQuery($sql, $params);
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
		$query = $handler->fetchAll();
		return ($query);
	}

}