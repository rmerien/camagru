<?PHP
session_start();
include '../config/dir_config.php';
if (isset($_SESSION['logged_on_user'])) {

$nickname = strtoupper($_SESSION['logged_on_user']['username']);
$navbar = <<<NAV

<script type="text/javascript" src="../models/js/ajax.js"></script>

<div id='navbar'>
	<a id='menu-link-logo' href="../views"><img id='logo' src="../img/logo.png" alt="Camagru"/></a>
	<div id='nav-right' style='text-align: center;'>
		<div class='dropdown menu-button'>
			<span class='menu-button'>{$nickname} <img src='../img/settings.jpg' alt='Settings' height=18px'/></span>	
			<div class='dropdown-content'>  
				<a class='menu-button drop-menu name='settings' href='./v_settings.php'>SETTINGS</a>
				<a class='menu-button drop-menu' href='../models/m_signout.php'>LOGOUT</a>
			</div>
		</div>
		<a class='menu-button' href='./v_upload.php'>UPLOAD</a>
	</div>
</div>

<script type="text/javascript" src="../models/js/navbar.js"></script>

NAV;
}
else {

$navbar = <<<NAV

<script type="text/javascript" src="../models/js/ajax.js"></script>

<div id='navbar'>
	<a href="../views"><img id='logo' src="../img/logo.png" alt="Camagru"/></a>
	<div id='nav-right'>	
		<a class='menu-button' href='./v_signin.php'>SIGN IN</a>
		<a class='menu-button' href='./v_signup.php'>SIGN UP</a>
	</div>
</div>

<script type="text/javascript" src="../models/js/navbar.js"></script>

NAV;
}