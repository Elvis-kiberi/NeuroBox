<?php 
	require_once("connection.php");
	require_once("registerButton.php");
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
	<div class="jumbotron text-center">
		<h1>NeuroBox</h1>
	</div>
	<div class="container">
		<h2>Registration</h2>
		<form action="registerButton.php" class="was-validated" method="POST" >
		<div class="form-group">
			<labal for= Uname> User Name: </label>
			<input type="text" class="form-control" id="UnameID" placeholder="Enter User name" name="UnameID" required>
			<div class="valid-feedback">Valid.</div>
      		<div class="invalid-feedback">Please fill out this field.</div>
		</div>
		<div class="form-group">
			<label for="Fname">First Name : </label>
			<input type="text" class="form-control" id="FnameID" placeholder="Enter first name" name="FnameID" required>
      		<div class="valid-feedback">Valid.</div>
      		<div class="invalid-feedback">Please fill out this field.</div>
		</div>
		<div class="form-group">
			<label for="Lname">Last Name : </label>
			<input type="text" class="form-control" id="LnameID" placeholder="Enter Last name" name="LnameID" required>
      		<div class="valid-feedback">Valid.</div>
      		<div class="invalid-feedback">Please fill out this field.</div>
		</div>
		<div class="form-group">
			<label for="email">Email : </label>
			<input type="email" class="form-control" id="emailID" placeholder="Enter Email" name="emailID" required>
      		<div class="valid-feedback">Valid.</div>
      		<div class="invalid-feedback">Please fill out this field.</div>
		</div>
		<div>
			<labal for= contact> Contact </label>
			<input type="number" class="form-control" id="contactID" placeholder="Enter your phone number" name="contactID" required>
			<div class="valid-feedback">Valid.</div>
      		<div class="invalid-feedback">Please fill out this field.</div>
		</div>
		<div class="form-group">
			<label for="password">Password : </label>
			<input type="password" class="form-control" id="passwordID" placeholder="Enter Password" name="passwordID" required>
      		<div class="valid-feedback">Valid.</div>
      		<div class="invalid-feedback">Please fill out this field.</div>
		</div>
		<button type="submit" class="btn btn-primary" id="register" value="Register" name="register">Register</button>
		</form>
	</div>
</body>
</html>
