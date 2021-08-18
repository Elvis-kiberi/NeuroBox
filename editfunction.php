<?php
 require_once 'connection.php';
 if(isset($_POST['save']))
	{
		$Id = $_POST['ID']
		$FnameID = $_POST['FnameID'];
		$LnameID = $_POST['LnameID'];
		$emailID = $_POST['emailID'];
		$passwordID = $_POST['passwordID'];
		$UnameID = $_POST['UnameID'];
		$contactID = $_POST['contactID'];
		$descriptionID = $_POST['descriptionID'];

		$passwordharsh = password_hash($passwordID, PASSWORD_DEFAULT, ['cost'=>12]);

		$sql = "UPDATE `users` SET `Fname`= :FnameID,`Lname`=:LnameID,`email`=:emailID,`userName`=:UnameID,`password`=:passwordharsh,`contact`= :contactID,`Description`= :descriptionID WHERE ID = :ID";
		$stmt=$conn->prepare($sql);

		// $stmt->bindValue(':FnameID', $FnameID);
		// $stmt->bindValue(':LnameID',$LnameID);
		// $stmt->bindValue(':emailID',$emailID);
		// $stmt->bindValue(':UnameID',$UnameID);
		// $stmt->bindValue(':passwordharsh',$passwordharsh);
		// $stmt->bindValue(':contactID',$contactID);
		// $stmt->bindValue(':descriptionID', $descriptionID);
		$stmt->execute(array(':FnameID' => $FnameID,":LnameID"=>$LnameID; ););
		header('location:adminprofile.php');
	}
?>