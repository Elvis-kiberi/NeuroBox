 <?php
 require_once('connection.php');
 session_start();
 $sql = "SELECT * FROM `users`";
 $stmt = $conn->prepare($sql);
 $stmt->execute();
 $users = $stmt->fetchAll();

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
		<h2>Users</h2>
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th>User name</th>
					<th> First Name </th>
					<th> Last Name </th>
					<th>Email</th>
					<th>Contact</th>
					<th>Password</th>
					<th>Description</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<?php
					foreach ($users as $user) {
						echo "
							<tr>
							<td>".$user->userName."</td>
							<td>".$user->Fname."</td>
							<td>".$user->Lname."</td>
							<td>".$user->email."</td>
							<td>".$user->contact."</td>
							<td>".$user->password."</td>
							<td>".$user->Description."</td>	
							<td>
								<a href = 'editadmin.php'>
									Edit
								</a>
								<a href = ''>
									Delete
								</a>
							</td>
						";
					}
					?>
				</tr>
			</tbody>
		</table>
	</div>
</body>
</html>