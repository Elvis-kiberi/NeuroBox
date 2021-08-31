<?php
	$to = "ngio.glenn@strathmore.edu";
	$subject = 'Test email';
	$message = "Hello world";
	$headers = "From: ngiog06@gmail.com";
	$mail_sent = mail($to, $subject, $message, $headers);
	if ($mail_sent == true) {
		echo "Sent mail";
	}
	else
	{
		echo "Mail Failed";
	}

?>