<?php

Class Comment
{
    public static function getComments($img_id)
    {
        $sql =  "SELECT `comment`.*, `user`.`uid`, `user`.`username` FROM `comment`
                JOIN `user` ON `comment`.`uid` = `user`.`uid`
                WHERE `comment`.`img_id` = :img_id
                ORDER BY `comment`.`com_id` DESC";

        $params = array(
            ":img_id" => $img_id
        );
        try {
            $handler = Database::pdoQuery($sql, $params);
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
        }
        $query = $handler->fetchAll();
        return $query;
    }

    public static function addComment($uid, $comment, $img_id)
    {
        $sql = "INSERT INTO `comment` (`text`, `img_id`, `uid`)
                VALUES (:com, :iid, :uid)";
        $params = array(
			':com'    => $comment,
			':iid'     => $img_id,
			':uid'   => $uid
		);
		try {
			$handler = Database::pdoQuery($sql, $params);
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
        }
		return ($handler);
    }
    
}