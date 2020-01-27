<?php

Class Like
{
    public static function getLikeAmount($image_id)
    {
        $sql = "SELECT * FROM `like` WHERE `img_id` = :idImage";

		$params = array(
			':idImage' => $image_id
        );

        try {
			$handler = Database::pdoQuery($sql, $params);
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
        }
		$query = $handler->fetchAll();
		return (count($query));
    }

    public static function toggleLike($img_id, $uid)
    {
        $img_id = 2;
        $uid = 2;

        $sql = 'IF (NOT EXISTS (SELECT 1 FROM `like` WHERE `img_id` = :iid AND `uid` = :uid))
                BEGIN
                    INSERT INTO `like`(`uid`, `img_id`)
                    VALUES (:uid, :iid)
                END
                ELSE
                BEGIN
                    DELETE FROM `like`
                    WHERE `img_id` = :iid AND `uid` = :uid
                END';

        $sql = 'SET @variable = SELECT 1 FROM `like` WHERE `img_id` = :iid AND `uid` = :uid
                IF  (@variable != NULL)
                BEGIN
                INSERT INTO `like`(`uid`, `img_id`)
                VALUES (:uid, :iid)
                END
                ELSE IF (@variable = NULL)
                BEGIN
                DELETE FROM `like`
                WHERE `img_id` = :iid AND `uid` = :uid
                END';
    
        $params = array(
            ':iid'     => $img_id,
            ':uid'     => $uid
        );

        try {
			$handler = Database::pdoQuery($sql, $params);
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
        }
		$query = $handler->fetchAll();
		return (count($query));
    }
    
}