<?php
	session_start();
	include "Myheader.php";
	if(isset($_POST['recoverEmail']))
	{
		$conn = openmysqlconnection();
		$sql = "SELECT email FROM userinfo WHERE email = '". $_POST['recoverEmail'] ."'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) == 0)
		 //unregistered email found
		{
			header('location: login.php');
		}
		$pass = generate(8);
		$emailaddr = $_POST['recoverEmail'];
		mail($emailaddr, "Password Recovery", "Your new password is ".$pass);
		closemysql($conn);
		echo "Your new password has been sent to your email address ".$emailaddr.". It will be safe if you change your password later";
	}
?>
