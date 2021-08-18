<?php 
	session_start();
	require_once('connection.php');
	if(isset($_POST['register']))
	{
		$FnameID = $_POST['FnameID'];
		$LnameID = $_POST['LnameID'];
		$emailID = $_POST['emailID'];
		$passwordID = $_POST['passwordID'];
		$UnameID = $_POST['UnameID'];
		$contactID = $_POST['contactID'];

		$passwordharsh = password_hash($passwordID, PASSWORD_DEFAULT, ['cost'=>12]);
		$_SESSION['passwordharsh'] = $passwordharsh;
		$_SESSION['UnameID'] = $UnameID;	

		$sql = "INSERT INTO users(ID,Fname, Lname, email, userName, `password`, contact) VALUES ('',:FnameID, :LnameID,:emailID,:UnameID,:passwordharsh,:contactID)";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(':FnameID', $FnameID);
		$stmt->bindValue(':LnameID', $LnameID);
		$stmt->bindValue(':emailID', $emailID);
		$stmt->bindValue(':UnameID', $UnameID);
		$stmt->bindValue(':passwordharsh', $passwordharsh);
		$stmt->bindValue(':contactID', $contactID);
   		$stmt->execute();
   		if($stmt === false)
   		{
   			echo "You are not in the system";
   		}
   		else
   		{
   			header('Location : Neurohomepage.php');
   		}
   	}
?>