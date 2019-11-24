<?PHP

include '../config/web_config.php';

$pageTitle = $page . ' | ' . $WEB_NAME;

$metadata = <<<DATA

    <title>{$pageTitle}</title>
    <meta charset="utf-8">
    <meta name="description" content="165c. uniques">
    <link rel="stylesheet" href="../style/camagru.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cardo:400,700|Oswald">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">

DATA;
