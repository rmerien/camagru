<?php


class Database
{

    private static $_conn = NULL;

    private static function _pdoConnect($dsn, $user, $pword)
    {
        $options = array(
            PDO::ATTR_CASE                  =>  PDO::CASE_LOWER,
            PDO::ATTR_ERRMODE               =>  PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE    =>  PDO::FETCH_ASSOC
        );
        try {
            self::$_conn = new PDO($dsn, $user, $pword, $options);
            self::$_conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function pdoQuery($sql, $params)
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