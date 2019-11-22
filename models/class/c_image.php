<?php

class Image
{
    public static function newImage($uid, $path, $caption)
    {
        include '../config/db_config.php';
        if (!self::$_conn) {
            try {
                self::_pdoConnect($DB_DSN, $DB_USER, $DB_PWORD);
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        }
        try {
            $query = self::$_conn->prepare($sql);
            $query->execute($params);
	    } catch (PDOException $e) {
            throw new Exception($e->getMessage());
	    }
        return ($query);
    }
}