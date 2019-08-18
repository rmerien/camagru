<?PHP

session_start();

unset($_SESSION['logged_on_user']);

header('Location: /camagru');