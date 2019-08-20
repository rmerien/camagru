<?php   require_once('./v_header.php');
        require_once('../config/db_query.php'); ?>
<?php
  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	$image = $_FILES['image']['name'];
  	$image_text = $_POST['image_text'];

  	// image file directory
  	$target = "../img/extern/".basename($image);

    $owner = $_SESSION['logged_on_user'];
  	$sql = "INSERT INTO image (image, text, owner) VALUES ('$image', '$image_text', '$owner')";
  	pdo_query($sql, array());

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
          $msg = "Image uploaded successfully";
          header('Location: ..');
  	}else{
  		$msg = "Failed to upload image";
      }
      echo $msg;
  }

?>
<!DOCTYPE html>
<html>
<head>
        <title>Upload Image | Camagru</title>
</head>
<body>
    <form method="POST" action="#" enctype="multipart/form-data">
        <input type="hidden" name="size" value="1000000">
        <div>
            <input type="file" name="image">
        </div>
        <div>
            <textarea id="text" cols="40" rows="4" name="image_text" placeholder="Caption..."></textarea>
  	    </div>  	        <div>
        	<button type="submit" name="upload">POST</button>
  	    </div>
    </form>
</body>
</html>

<?php require_once('./v_footer.php'); ?>