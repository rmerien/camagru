<!DOCTYPE html>

<?PHP session_start(); ?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="165c. uniques">
	<link rel="stylesheet" href="/camagru/public/stylesheets/style.css">
	<link href="https://fonts.googleapis.com/css?family=Cardo:400,700|Oswald" rel="stylesheet">

<body>
	<header class="flex-container">
		<a href="/camagru"><img style="width: 70%;" src="/camagru/img/private/logo.png" alt="Camagru"/></a>
		<?PHP
			if (isset($_SESSION['logged_on_user']))
				echo "<ul>
				<li><a class='redir' href='/camagru/views/v_upload.php'>UPLOAD</a></div></li>
				<li><a class='redir' href='/camagru/views/v_signout.php'>LOGOUT</a></div></li>
				<li><a class='redir' href='/camagru/views/v_user.php'>".$_SESSION['logged_on_user']."</p></li>
				</ul>";
			else
				echo "<ul>
				<li><a class='redir' href='/camagru/views/v_signin.php'>SIGN IN</a></div></li>
				<li><a class='redir' href='/camagru/views/v_signup.php'>SIGN UP</a></div></li>
				</ul>";
			?>
	</header>
</body>
</html>