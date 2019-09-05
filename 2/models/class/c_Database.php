<?php

class Database
{
    private static $_conn = NULL;

    private static function _pdoConnect($dsn, $name, $user, $pword) {
        if (!$_conn) {
            $options = array(
                PDO::ATTR_CASE                  =>  PDO::CASE_LOWER,
                PDO::ATTR_ERRMODE               =>  PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE    =>  PDO::FETCH_ASSOC
            );

            try {
                self::$_conn = new PDO("mysql:host=$dsn;dbname=$name", $user, $pword, $options);
            } catch (PDOException $e) {
                throw new Exception($e->getMessage());
            }
        }
    }

    public static function pdoQuery($sql, $params) {
        try {
		    $query = self::$_conn->prepare($queryStr);
	    	$query->execute($params);
	    } catch (PDOException $e) {
    	    throw new Exception($e->getMessage());
	    }
    return ($query);
    }
}