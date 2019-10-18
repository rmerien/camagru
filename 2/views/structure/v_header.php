<?PHP
session_start();
include '../config/dir_config.php';
if (isset($_SESSION['logged_on_user'])) {

$nickname = strtoupper($_SESSION['logged_on_user']['uname']);
$navbar = <<<NAV

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

NAV;
}
else {

$navbar = <<<NAV

<div id='navbar'>
	<a href="../views"><img id='logo' src="../img/logo.png" alt="Camagru"/></a>
	<div id='nav-right'>	
		<a class='menu-button' href='./v_signin.php'>SIGN IN</a>
		<a class='menu-button' href='./v_signup.php'>SIGN UP</a>
	</div>
</div>

NAV;
}

$navbar .= <<<HEADSCRIPT

<script>
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("navbar").style.padding = "10px 10px";
    document.getElementById("logo").style.fontSize = "25px";
  } else {
    document.getElementById("navbar").style.padding = "40px 10px";
    document.getElementById("logo").style.fontSize = "35px";
  }
}
</script>

HEADSCRIPT;
