<?PHP

$logout = <<<THIS

session_start();

session_destroy();

header('Location: /camagru');

THIS;
