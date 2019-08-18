<?PHP
require_once('../config/db_query.php');

function    valid_signin($login, $pword) {
    $query = "SELECT passwd FROM user WHERE uname = :login";
    $handler = pdo_query($query, array('login' => $login));
    var_dump($handler);
    return TRUE;
}