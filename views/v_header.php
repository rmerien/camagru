<?PHP session_start() ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="165c. uniques">
	<link rel="stylesheet" href="../public/stylesheets/style.css">
	<link href="https://fonts.googleapis.com/css?family=Cardo:400,700|Oswald" rel="stylesheet">
</head>

<body>
	<header class="flex-container">
		<a href="/"><img style="width: 70%;" src="../img/logo.png" alt="Camagru"/></a>
		<?PHP
			//if (isset($_SESSION['logged_on_user']))
				echo "<ul><li><a class='redir' href='./views/v_upload.php'>UPLOAD</a></div></li>
				<li><a class='redir' href='./views/v_signup.php'>LOGOUT</a></div></li></ul>";
			//else
			//	echo "<ul><li><a class='redir' href='./views/v_signin.php'>LOGIN</a></div></li>
			//	<li><a class='redir' href='/views/v_signup.php'>SIGN UP</a></div></li></ul>";
			?>
	</header>
</body>
</html>