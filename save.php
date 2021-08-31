<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	<nav class="navbar">
    <a class="navbar-brand" href="#">NeuroBox</a>
        <button type="button" class="btn btn-light"><a href="home.php">Home</a></button>
        <button type="button" class="btn btn-light"><a href="forgot-password.php">Change-password</a></button>
        <button type="button" class="btn btn-light"><a href="">Profile</a></button>
        <button type="button" class="btn btn-light"><a href="logout-user.php">Logout</a></button>
    
    </nav>
    <div class="form-">
    	<a href="video.php">Videos</a><br>
		<form method="POST" enctype="multipart/form-data">
		<input type="file" name="file"><br>
		<input type="submit" name="submit" value="upload">
	</form>
    </div>
</body>
</html>

<?php
	include("connection.php");
	if (isset($_POST['submit'])) {
		$name = $_FILES['file']['name'];
		$temp = $_FILES['file']['tmp_name'];

		move_uploaded_file($temp, "upload".$name);
		$q = "INSERT INTO `uploads`(`id`, `Name`,`documentation`) VALUES ('', '$name', '')";
		if (mysqli_query($con, $q))
	 	{
			echo "Submmited to the database";
			echo "<br>".$name." had been uploaded.";
		}
	}
?>