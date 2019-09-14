<?PHP

echo "yoyoyoyo";

include './v_data.php';
include './v_header.php';
include './v_footer.php';


echo "asfsadfasdf";
$upperPart = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
	{$metadata}
</head>
<body>
	{$header}
HTML;

$lowerPart = $footer;