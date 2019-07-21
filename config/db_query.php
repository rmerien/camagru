<?php

function pdo_connect() {
    require_once ('db_config.php');
    try {
        $db = new PDO("mysql:host=$DB_DSN;dbname=$DB_NAME", $DB_USER, $DB_PWORD);
        $db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    }
    catch(PDOException $e) {
        echo "Database connection failed:" . $e->getMessage();
        die();
    }
}

function pdo_query($sql, $tab) {
    try {
        echo "12341235123";
        $db = pdo_connect();
        echo "asdfasdf";
        try {
        $req = $db->prepare($sql);
        echo $req->pdo->errorInfo;

        echo "prepared";
        $req->execute($tab);
        echo "executed";
    }
    catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    $db = null;
    return ($req);
}