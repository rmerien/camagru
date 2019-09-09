<?php

Class Like
{
    public static function likeAmount($image)
    {
        $sql = "SELECT * FROM `like` WHERE `id_image` = :idImage";

		$params = array(
			':idImage' => $image
        );
        try {
			$handler = Database::pdoQuery($sql, $params);
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
		$query = $handler->fetchAll();
		return (count($query));
    }

    public static function likeModify($img_id)
    {
        $uid = $_SESSION['logged_on_user']['uid'];

        $sql = 'IF NOT EXISTS (SELECT * FROM `like` WHERE `img_id` = :iid AND `uid` = :uid)
                BEGIN
                    INSERT INTO `like`(`uid`, `img_id`)
                    VALUES (:uid, :iid)
                END
                ELSE
                BEGIN
                    DELETE FROM `like`
                    WHERE `img_id` = :iid AND `uid` = :uid
                END';
        $params = array(
            ':iid'     => $img_id,
            ':uid'     => $uid
        );
    }
    
}