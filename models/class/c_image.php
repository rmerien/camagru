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
}