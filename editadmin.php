<?php
	require_once ('connection.php');
	$ID = null;
	$FnameID = null;
	$LnameID = null;
	$emailID = null;
	$passwordID = null;
	$contactID = null;
	$descriptionID = null;
	$UnameID = null;
	$descriptionID =null;

	if (isset($_GET['ID'])) {
		$ID = $_GET['ID'];
		$sql = "SELECT * FROM `users` WHERE ID = '$ID'";
		$stmt = $conn->prepare($sql);
		$result = $stmt->execute(array(':ID' => $ID));
		if ($result) {
			foreach ($result as $person ) {
			$ID= $person->ID;
			$FnameID= $person->FnameID;			
			$LnameID= $person->LnameID;
			$emailID= $person->emailID;
			$passwordID= $person->passwordID;
			$contactID= $person->contactID;
			$descriptionID= $person->descriptionID;
			$UnameID= $person->UnameID;
			}
	}
}
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
		<div class="form-group">
			<form action="" method="GET">
				<input type="text" name="ID", value="<?php if(isset($_GET['ID'])) echo $_GET['ID'] ?>" class="form-control">
				<div class="col-md-4">
					<button class="btn btn-primary" type="submit">Search</button>
				</div>
			</form>
		</div>
		<form action="" class="was-validated" method="POST">
		<div class="form-group">
			<labal for= ID> ID: </label>
			<input type="number" class="form-control" id="ID" placeholder="Enter the ID" name="ID" required
			 value="<?php echo $ID;?>">
			<div class="valid-feedback">Valid.</div>
      		<div class="invalid-feedback">Please fill out this field.</div>
		</div> 
			<div class="form-group">
			<labal for= Uname> User Name: </label>
			<input type="text" class="form-control" id="UnameID" placeholder="Enter new User name" name="UnameID" required 
			value="<?php echo $UnameID;?>">
			<div class="valid-feedback">Valid.</div>
      			<div class="invalid-feedback">Please fill out this field.</div>
		</div>
		<div class="form-group">
			<label for="Fname">First Name : </label>
			<input type="text" class="form-control" id="FnameID" placeholder="Enter new first name" name="FnameID" required 
			value="<?php echo $FnameID;?>">
      			<div class="valid-feedback">Valid.</div>
      			<div class="invalid-feedback">Please fill out this field.</div>
		</div>
		<div class="form-group">
			<label for="Lname">Last Name : </label>
			<input type="text" class="form-control" id="LnameID" placeholder="Enter new Last name" name="LnameID" required 
			value="<?php echo $LnameID;?>">
      			<div class="valid-feedback">Valid.</div>
      			<div class="invalid-feedback">Please fill out this field.</div>
		</div>
		<div class="form-group">
			<label for="email">Email : </label>
			<input type="email" class="form-control" id="emailID" placeholder="Enter new Email" name="emailID" required
			 value="<?php echo $emailID;?>">
      			<div class="valid-feedback">Valid.</div>
      			<div class="invalid-feedback">Please fill out this field.</div>
		</div>
		<div>
			<labal for= contact> Contact </label>
			<input type="number" class="form-control" id="contactID" placeholder="Enter new phone number" name="contactID" required
			 value="<?php echo $contactID;?>">
			<div class="valid-feedback">Valid.</div>
      			<div class="invalid-feedback">Please fill out this field.</div>
		</div>
		<div class="form-group">
			<label for="password">Password : </label>
			<input type="password" class="form-control" id="passwordID" placeholder="Enter new Password" name="passwordID" required
			 value="<?php echo $passwordID;?>">
      			<div class="valid-feedback">Valid.</div>
      			<div class="invalid-feedback">Please fill out this field.</div>
		</div>
		<div class="form-group">
			<label for="description">Description : </label>
			<input type="text" class="form-control" id="descrptionID" placeholder="Enter new description" name="descriptionID" required
			 value="<?php echo $descriptionID;?>">
      			<div class="valid-feedback">Valid.</div>
      			<div class="invalid-feedback">Please fill out this field.</div>
		</div>
			<button type="submit" class="btn btn-primary" id="save" value="save" name="save">Submit</button>
		</form>		
	</div>
</body>
</html>