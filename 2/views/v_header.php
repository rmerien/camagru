<?PHP
session_start();
include '../config/dir_config.php';
if (isset($_SESSION['logged_on_user'])) {

$header = <<<HEAD

<header class="flex-container">
	<a href=".."><img style="width: 70%;" src="../img/logo.png" alt="Camagru"/></a>
		<ul>
			<li><a class='redir' href='./v_upload.php'>UPLOAD</a></li>
			<li><a class='redir' href='./settings.php'>
			<img src='../img/settings.jpg' alt='Settings' height=18px'/> {$_SESSION['logged_on_user']}</a></li>
			<li><a class='redir' href='./v_signout.php'>LOGOUT</a></li>
		</ul>
</header>
HEAD;

}
else {
$header = <<<HEAD

<header class="flex-container">
	<a href=".."><img style="width: 70%;" src="../img/logo.png" alt="Camagru"/></a>
		<ul>
			<li><a class='redir' href='./v_signin.php'>SIGN IN</a></li>
			<li><a class='redir' href='./v_signup.php'>SIGN UP</a></li>
		</ul>
</header>

HEAD;
}
