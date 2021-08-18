<?php
 session_start();
 require_once('connection.php');

 $sql = "SELECT * FROM `users` WHERE userName = $_SESSION['username']";
 

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<title>NeuroBox</title>	
</head>
<body>

	<div class="container">
		<form>
			<div class="form-group">
				<label>Image</label>
			</div>
			<div class="form-group">
				<label>User Name</label>
				<input type="text" name="">
			</div>
			<div class="form-group">
				<label>First Name</label>
				<input type="text" name="">
			</div>
			<div class="form-group">
				<label>Last Name</label>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" name="">
			</div>
			<div class="form-group">
				<label>Contact</label>
				<input type="number" name="">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="Password" name="">
			</div>
			<div class="form-group">
				<button>Edit</button>
			</div>
		</form>
	</div>

</body>
</html>