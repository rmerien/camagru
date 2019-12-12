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

	public static function getImages($uname)
	{
		if ($uname) {
			$sql = "SELECT `uid` FROM `user` WHERE `uname` LIKE :uname";
			$params = array(
				'uname' => $uname . '%'
			);
			return($params);
		}
		$sql = "INSERT INTO `image` (`uid`, `path`, `caption`)
				VALUES (:uid, :path, :caption)";
		return ('ahah');
	}
}