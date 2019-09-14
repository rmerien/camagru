<?PHP
session_start();
if (isset($_SESSION['logged_on_user'])) {
$header = <<<HEAD

<header class="flex-container">
	<a href="/camagru"><img style="width: 70%;" src="/camagru/img/private/logo.png" alt="Camagru"/></a>
		<ul>
			<li><a class='redir' href='/camagru/views/v_upload.php'>UPLOAD</a></li>
			<li><a class='redir' href='/camagru/views/v_user.php'>
			<img src='/camagru/img/private/settings.jpg' alt='Settings' height=18px'/> {$_SESSION['logged_on_user']}</a></li>
			<li><a class='redir' href='/camagru/views/v_signout.php'>LOGOUT</a></li>
		</ul>
</header>

HEAD;
}

else {
$header = <<<HEAD

<header class="flex-container">
	<a href="/camagru"><img style="width: 70%;" src="/camagru/img/private/logo.png" alt="Camagru"/></a>
		<ul>
			<li><a class='redir' href='/camagru/views/v_signin.php'>SIGN IN</a></li>
			<li><a class='redir' href='/camagru/views/v_signup.php'>SIGN UP</a></li>
		</ul>
</header>

HEAD;
}