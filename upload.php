<?php
include("connection.php");
require 'controllerUserData.php';
$msg = "";
$email = $_SESSION['email'];
if (isset($_POST['upload'])) {
	$target = "Uploads/".basename($_FILES['file']['name']);
	$file = $_FILES['file']['name'];
	$text = $_POST['text'];

	$sql = "INSERT INTO `uploads`(`Name`, `text`, `email`) VALUES ('$file', '$text', '$email')";
	mysqli_query($con, $sql);
	if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
		$msg = "Uploaded Successfully";
	}
	else
	{
		$msg = "there was a problem uploading the image";
	}

}
 
?>
<!doctype html> 
<html> 
  <head>
    <title>NeuroBox</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	</head>
  <body>
    <form method="post" action="" enctype='multipart/form-data'>
      <input type="hidden" name="size" value="1000000">
      <div>
      	<input type="file" name="file">
      </div>
      <div>
      	<textarea name="text" cols="40" rows="4" placeholder=" Say something about the upload"></textarea>
      </div>
      <div>
      	<input type="submit" name="upload" value="Upload!">
      </div>
    </form>

  </body>
</html>