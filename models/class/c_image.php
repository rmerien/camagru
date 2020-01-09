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

	public static function getImageDetails($path)
	{
		$sql = "SELECT image.*, comment.username FROM `image` INNER JOIN `comment` USING (image_id) WHERE image.image_id LIKE :imgid";
	}
}