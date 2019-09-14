<?php

Class Comment
{
    public static function commentList($img_id)
    {
        $sql =  "SELECT `comment`.*, `user`.`uid`, `user`.`username` FROM `comment`
                JOIN `user` ON `comment`.`uid` = `user`.`uid`
                WHERE `comment`.`img_id` = :img_id
                ORDER BY `comment`.`com_id` DESC";
        
        $params = array(
            ":img_id" => $img_id
        );

        try {
			$handler = Database::newQuery($query, $params);
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
    }

    public static function commentAdd($uid, $comment, $img_id)
    {
        $sql = "INSERT INTO `comment`(`uid`, `comment`, `c`";
    }
}