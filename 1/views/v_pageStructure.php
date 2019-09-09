<?PHP

require('v_data.php');
require('v_header.php');
require('v_footer.php');

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