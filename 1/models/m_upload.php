<?php   require('./v_header.php');
        require('../config/db_query.php');
        require('../controllers/c_namegen.php'); ?>
<?php
if ($_SESSION['logged_on_user']) {
  if (isset($_POST['upload'])) {
    $owner = $_SESSION['logged_on_user'];
    $image = $_FILES['image']['name'];
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    $img_name = generateRandomString(20).'.'.$ext;
    $img_text = $_POST['image_text'];
    
    if (!file_exists('../img/extern'))
        mkdir('../img/extern');
    if (!file_exists('../img/extern'.$owner))
        mkdir('../img/extern/'.$owner);

    $target = "../img/extern/".$owner.'/'.$img_name;
    $time = $_SERVER['REQUEST_TIME'];
    $sql = "INSERT INTO image (image, text, owner, time) VALUES ('$img_name', '$img_text', '$owner', '$time')";
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
        <link rel="stylesheet" href="/camagru/public/stylesheets/video.css">
</head>
<body>
    <form method="POST" action="#" enctype="multipart/form-data">
        <input type="hidden" name="size" value="1000000">
        <div>
            <input type="file" name="image">
        </div>
        <div>
            <textarea id="text" cols="40" rows="4" name="image_text" placeholder="Caption..."></textarea>
  	    </div>
        <div>
        	  <button type="submit" name="upload">POST</button>
  	    </div>
    </form>
    <div id="container">
	    <video autoplay="true" id="videoElement">
	    </video>
  </div>
  <script>
    var video = document.querySelector("#videoElement");

    if (navigator.mediaDevices.getUserMedia) {
      navigator.mediaDevices.getUserMedia({ video: true })
        .then(function (stream) {
          video.srcObject = stream;
        })
        .catch(function (err0r) {
          console.log("Something went wrong!");
        });
    }
  </script>
</body>
</html>
<?php
}
else {
  header('Location: /camagru/views/v_signin.php');
}
require_once('./v_footer.php'); ?>