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

    public static function likeAdd($image)
    {
        $user = $_SESSION['logged_on_user']['uname'];

        $sql = 'IF NOT EXISTS (SELECT * FROM `like` WHERE `image` = :img AND `user` = :user)
                BEGIN
                    INSERT INTO `like`(`user`, `image`, `like`)
                    VALUES (:user, :img, 1)
                END
                ELSE
                BEGIN
                    DELETE FROM `like`
                    WHERE `image` = :img AND `user` = :user
                END';
        $params = array(
            ':image'    => $image,
            ':user'     => $user
        );
    }
}