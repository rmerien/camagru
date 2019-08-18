<?php   require_once('./v_header.php');
        require_once('../config/db_query.php'); ?>
<?php
  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = $_POST['image_text'];

  	// image file directory
  	$target = "/camagru/img/extern/".basename($image);

  	$sql = "INSERT INTO images (image, image_text) VALUES ('$image', '$image_text')";
  	pdo_query($sql, array());

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM images");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Upload Image | Camagru</title>
    </head>
    <body>
        <div id="content">
            <?php
            while ($row = mysqli_fetch_array($result)) {
            echo "<div id='img_div'>";
            echo "<img src='images/".$row['image']."' >";
            echo "<p>".$row['image_text']."</p>";
            echo "</div>";
            } ?>
        <form method="POST" action="index.php" enctype="multipart/form-data">
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
</div>
</body>
</html>

<?php require_once('./v_footer.php'); ?>