<?php
	session_start();
	if(isset($_SESSION['email']))
	{
		header('location: profile.php');
	}
	include "Myheader.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Password reset</title>
		<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link href='mystyle.css' rel='stylesheet' type='text/css'>
		<link rel='icon' href='images/au.PNG'>
		<style>
			body{
				background-image: url('images/dark_wall.png');
			}
			h1{
				text-align: center;
				padding:30px 0px 0px 0px;
				font:25px Oswald;
				color:#FFF;
				text-transform:uppercase;
				text-shadow:#000 0px 1px 5px;
				margin:0px;
			}

			p{
				font:13px Open Sans;
				color: #6E6E6E;
				text-shadow: #000 0px 1px 5px;
				margin-bottom:30px;
			}

			a{
				text-decoration: none;
				color: #207f86;
			}
		</style>
		<script src='js/jquery-3.2.1.min.js'></script>
	</head>
	<body>
		<div class="wrapper">
			<h1>Reset password</h1>
			<p>Enter your email address that is registered</p>
			<form class="form" method="post" action="action.php">
				<input type="text" name="recoverEmail" placeholder="Email">
				<input type="submit" value="send"/>
			</div>
		</div>
	</body>
</html>
