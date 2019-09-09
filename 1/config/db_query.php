<?php

function pdo_connect() {
    require ('db_config.php');
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
    return ($db);
}

function pdo_query($sql, $tab) {
    try {
        $db = pdo_connect();
        $req = $db->prepare($sql);
        $req->execute($tab);
    }
    catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    $db = NULL;
    return ($req);
}

?>