<?PHP
require_once('./v_header.php');
require_once('../controllers/c_newacc.php');

session_start();

if (isset($_POST) && isset($_POST['password'])) {
		try
	{
  $db = new PDO('mysql:host=localhost;dbname=rush00', 'root', 'rmerien');
  $db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
  echo '<p style="font-size:2vw">Une erreur est survenue</p>';
  die();
}

	$login = $_POST["username"];
	$passwd = $_POST["password"];
	$passwd2 = $_POST["password2"];
	if (!isset($login) || !$passwd) {
		echo "ERROR, do not leave any empty fields\n";
	}
	else if ($passwd !== $passwd2) {
		echo "ERROR : Passwords do not match\n";
	}
	else if (!valid_login($login))
				exit("ERROR : Username already taken, please chose another one\n");
	else {
		$group = "client";
		$passwd = hash('sha512', $passwd);
	$category=$_POST['category'];
	$insert = $db->prepare("INSERT INTO user VALUES('','$login', '$group', '$passwd')");
	$insert->execute();
		echo "Account successfully created";
	}
}

if (($_SESSION['loggued_on_user']) === "" || !(isset($_SESSION['loggued_on_user']))) {
?>
<html>

    
    <head>
        <title>Sign Up | Camagru</title>
		<link rel="stylesheet" href="../public/stylesheets/form.css">
    </head>
    
    <body>
        <div class="mid-wrap">
            <div class="form-wrap flex-container">
                <form method="POST" action="#">
                    <h1>Sign Up</h1>
                    <input type="text" placeholder="Username" name="user">
                    <input type="email" placeholder="Email" name="mail">
                    <input type="password" placeholder="Password" name="pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
                    <input type="password" placeholder="Confirm Password" name="pwd2">
                    <input type="submit" value="Sign Up">
                </form>
            </div>
        </div>
    </body>
</html>

<?PHP 
}

require_once('./v_footer.php'); ?>