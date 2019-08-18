<?PHP
require_once('../config/db_query.php');

function    valid_signin($login, $pword) {
    $query = "SELECT passwd FROM user WHERE uname = :login ORDER BY id DESC LIMIT 1";
    $handler = pdo_query($query, array('login' => $login));
    $db_pw = $handler->fetch();
    if ($db_pw[0] === $pword) {
        return TRUE;
    }
    return FALSE;
}

function    get_email($login) {
    $query = "SELECT mail FROM user WHERE uname = :login";
    $handler = pdo_query($query, array('login' => $login));
    $db_mail = $handler->fetch();
    return $db_mail[0];
}