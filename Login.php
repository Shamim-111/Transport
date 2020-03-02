<?php
	session_start();
	$err = "";
	if(isset($_SESSION['email']))
	{
		echo "Heading<br>";
		header('location: profile.php');
	}
	if(isset($_GET['err']))
	{
		if($_GET['err'] == 'p') $err = 'Registered but password not correct.';
		if($_GET['err'] == 'u') $err = 'You are not registered. register <a href="register.php">here</a>';
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login page</title>
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
				color:#6E6E6E;
				text-shadow:#000 0px 1px 5px;
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
			<h1>Login to your existing account</h1>
			<p>To sign-up for a free basic account please go to <a href='register.php'>Registration page</a>.</p>
			<p>You can directly go to <a href='index.php'>Home</a> page</p>
			<form class="form" method="post" action="profile.php">
				<input type="text" class="name" name="logemail" placeholder="Email" required>
				<div>
					<p class="name-help">Please enter your email by which you have registered.</p>
				</div>
				<input type="password" class="pass" name="logpass" placeholder="Password" required>
				<div>
					<p class="pass-help">Please enter your password.</p>
				</div>
				<div>
					<?php
						echo "<p class='error'>$err</p>";
					?>
				</div>
				<input type="submit" class="submit" value="login" title="Login button">
			</form>
		</div>
		<p class="optimize">!!</p>
		<script>
			$(".name").focus(function(){
				$(".name-help").slideDown(500);
			}).blur(function(){
				$(".name-help").slideUp(500);
			});
			
			$(".pass").focus(function(){
				$(".pass-help").slideDown(500);
			}).blur(function(){
				$(".pass-help").slideUp(500);
			});
		</script>
	</body>
</html>
