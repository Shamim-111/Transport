<?php
	session_start();
	include "Myheader.php";
	if(isset($_SESSION['email']))
	{
		echo "Heading<br>";
		header('location: profile.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Registration page</title>
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
			<h1>Register For An Account</h1>
			<p>To sign-up for a free basic account please provide us with some basic information using the contact form below. Please use valid credentials.</p>
			<p>If you have already registered, then go to <a href='Login.php'>Login</a> page</p>
			<form class="form" name="regform" method="post" action="profile.php" onsubmit="return isValid()">
				<input type="text" class="name" name="username" placeholder="Name" required>
				<p class="name-help">Please enter your first and last name.</p>

				<input type="email" class="email" name="useremail" placeholder="Email" required>
				<p class="email-help">Please enter your current email address.</p>

				<select name="status">
					<option value="driver">Driver</option>
					<option value="student">Student</option>
				</select>
				
				<select name="bus">
					<?php
						$buslist = getBuslist();
						$arrlength = count($buslist);
						for($i=0; $i<$arrlength; $i++)
						{
							echo "<option value='".$buslist[$i]."'>".$buslist[$i]."</option>";
						}
					?>
				</select>

				<input type="text" class="session" name="sessionYear" placeholder="Session (if student)">
				<p class="session-help">If you are a student, fill up this</p>

				<input type="password" class="primary" name="firstPass" placeholder="Password" required>
				<p class="pass-help">For your security use strong password as possible for you</p>

				<input type="password" class="secondary" name="confirmPass" placeholder="Re-enter password">
				<p class="repass-help">Re type your password for confirmation</p>

				<input type="submit" class="submit" value="Register">
			</form>
		</div>
		<p class="optimize">!!</p>
		<script>
			$(".name").focus(function(){
				$(".name-help").slideDown(500);
			}).blur(function(){
				$(".name-help").slideUp(500);
			});
			
			$(".email").focus(function(){
				$(".email-help").slideDown(500);
			}).blur(function(){
				$(".email-help").slideUp(500);
			});
			
			$(".session").focus(function(){
				$(".session-help").slideDown(500);
			}).blur(function(){
				$(".session-help").slideUp(500);
			});

			$(".primary").focus(function(){
				$(".pass-help").slideDown(500);
			}).blur(function(){
				$(".pass-help").slideUp(500);
			});

			$(".secondary").focus(function(){
				$(".repass-help").slideDown(500);
			}).blur(function(){
				$(".repass-help").slideUp(500);
			});
			
			function isValid()
			{
				var type = document.forms["regform"]["status"].value;
				var session = document.forms["regform"]["sessionYear"].value;
				var first = document.forms["regform"]["firstPass"].value;
				var second = document.forms["regform"]["confirmPass"].value;

				if(type == "driver")
				{
					if(session != "")
					{
						alert("Driver has not any session");
						return false;
					}
					else
					{
						return true;
					}
				}
				if(session.length != 7 || session.charAt(4) != '-')
				{
					alert("Invalid session");
					return false;
				}
				if(first.length < 5)
				{
					alert("Password should be at least 5 characters");
					return false;
				}
				if(first != second)
				{
					alert("Password isn't confirmed");
					return false;
				}
			}
		</script>
	</body>
</html>
