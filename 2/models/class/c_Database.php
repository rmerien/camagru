<?php

class Database
{
    private static $_conn = NULL;

    public static function _pdoConnect($dsn, $user, $pword) {
        echo 'asdf';
        if (!$_conn) {
            echo '123';
            $options = array(
                PDO::ATTR_CASE                  =>  PDO::CASE_LOWER,
                PDO::ATTR_ERRMODE               =>  PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE    =>  PDO::FETCH_ASSOC
            );
            echo 'uio';
            try {
                self::$_conn = new PDO($dsn, $user, $pword, $options);
                self::$_conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            } catch (PDOException $e) {
                throw new Exception($e->getMessage());
            }
        }
    }

    public static function pdoQuery($sql, $params) {
        try {
		    $query = self::$_conn->prepare($sql);
	    	$query->execute($params);
	    } catch (PDOException $e) {
    	    throw new Exception($e->getMessage());
	    }
    return ($query);
    }
}