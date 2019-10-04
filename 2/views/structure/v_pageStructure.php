<?PHP

session_start();

require 'v_data.php';
require 'v_header.php';
require 'v_footer.php';


$prePage = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
	{$metadata}
</head>
<body>
	{$navbar}
HTML;

$postPage = <<<FOOT

	{$footer}
</body>
</html>

FOOT;
