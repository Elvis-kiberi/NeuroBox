<?php
	require 'connection.php';
	require_once "controllerUserData.php"; 
	$email = $_SESSION['email'];
	$password = $_SESSION['password'];
	$name = "SELECT name FROM usertable WHERE email = $email";
	$name = mysqli_query($con, $name);
	if (isset($_POST['save'])) {
		$fname = mysqli_real_escape_string($con, $_POST['fname']); 
            $mail = mysqli_real_escape_string($con, $_POST['mail']); 
            $password = mysqli_real_escape_string($con, $_POST['password']); 
            $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']); 
            $Contact = mysqli_real_escape_string($con, $_POST['Contact']); 
            $DOB = mysqli_real_escape_string($con, $_POST['DOB']); 
            if ($password !== $cpassword) {
                $errors['password'] = "Confirm password not matched!";
            }else{
                $enc = password_hash($password, PASSWORD_BCRYPT);
                $update_save = "UPDATE `usertable` SET `name`= $fname,`email`=$mail,`password`=$enc,`Contact`=$Contact,`DOB`= $DOB";
                $run_query = mysqli_query($con, $update_save);
                if ($run_query) {
                    $info = "Your info has been updated";
                    $_SESSION['info'] = $info;
                    header('Location : home.php');
                }
                else
                {
                    $errors['save-error'] = "Failed to update Info";
                }
            }
	}

?>
<!DOCTYPE html>
<html>
<title>NeuroBox</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="jumbotron">
        <h3>NeuroBox</h3>
        <h5>Edit your data</h5>
    </div>
   	<form class="was-validated" action="profile.php">
		<div class="form-group">
			<label>Full Name</label>
			<input type="text" name="fname" class="" placeholder="Key in your new name" value="<?php echo $name ?>" required>
		</div>
		<div class="form-group">
			<label>Email</label>
				<input type="text" name="mail" class="" placeholder="Key in your new name" value="<?php echo $email?>" required>
		</div>
		<div class="form-group">
			<label>Password</label>
				<input type="text" name="password" class="" placeholder="Key in your new name" value="<?php echo $password?>" required>
		</div>    		
		<div class="form-group">
			<label>Confirm password</label>
				<input type="text" name="cpassword" class="" placeholder="" value="" required>
		</div>
		<div class="form-group">
			<label>Contact</label>
				<input type="number" name="Contact" class="" placeholder="Key in your Contact" value="" required>
		</div>
		<div class="form-group">
			<label>DOB</label>
				<input type="date" name="DOB" class="" placeholder="Key in your new name" value="" required>
		</div>
		<div class="form-group">
			<input class="form-control button" type="submit" name="save" value="Save">
		</div>
   	</form>
</body>
</html>
