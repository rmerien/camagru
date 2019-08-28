<?php   require('./v_header.php');
        require('../config/db_query.php');
        require('../controllers/c_namegen.php'); ?>
<?php
  if (isset($_POST['upload'])) {
    echo ('a');
    $owner = $_SESSION['logged_on_user'];
    echo ('b');
    $image = $_FILES['image']['name'];
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    echo ('c');
    $img_name = generateRandomString(20).'.'.$ext;
    echo ('d');
    $img_text = $_POST['image_text'];
    
    if (!file_exists('../img/extern'))
        mkdir('../img/extern');
    if (!file_exists('../img/extern'.$owner))
        mkdir('../img/extern/'.$owner);

  	$target = "../img/extern/".$owner.'/'.$img_name;
    $sql = "INSERT INTO image (image, text, owner) VALUES ('$img_name', '$img_text', '$owner')";
    pdo_query($sql, array());
  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        header('Location: ..');
        echo("Image uploaded successfully");
    } else {
  		echo("Failed to upload image");
      }
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