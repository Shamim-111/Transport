<?php
	session_start();
	include "Myheader.php";

	if(isset($_POST['username'])) //checking after registration.
	{
		$username = $_POST['username'];
		$email = $_POST['useremail'];
		$stat = $_POST['status'];
		$sessionyear = $_POST['sessionYear'];
		$password = $_POST['firstPass'];
		$conn = openmysqlconnection();
		$busid = getBusId($conn, $_POST['bus']);
		closemysql($conn);
		addAccount($username, $email, $password, $stat, $sessionyear, $busid);

		//set the session variable
		$_SESSION['user'] = $username;
		$_SESSION['email'] = $email;
		$_SESSION['status'] = $stat;
		$_SESSION['session'] = $sessionyear;
		$_SESSION['bus'] = $_POST['bus'];
	}
	else if(isset($_POST['logemail']))
	{
		$email = $_POST['logemail'];
		$pass = $_POST['logpass'];
		$result = checkLog($email, $pass);
		if($result == "OK")
		{
			//login successful
			$info = getInfo($email);
			//setting session
			$_SESSION['user'] = $info['username'];
			$_SESSION['email'] = $email;
			$_SESSION['status'] = $info['type'];
			$_SESSION['session'] = $info['session'];
			$_SESSION['bus'] = $info['busid'];
		}
		else if($result == "passError")
		{
			//password error
			header('location: Login.php?err=p');
		}
		else if($result == "unregistered")
		{
			//not registered
			header('location: Login.php?err=u');
		}
		else
		{
			echo "Unexpected result<br>";
		}
	}
	else if(isset($_SESSION['user'])) //checking whether user is logged in or not.
	{
		//html will be shown
	}
	else
	{
		header('location: Login.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Profile</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
		<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
		<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
		<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
		<link href="plugins/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
		<link rel="stylesheet" type="text/css" href="styles/responsive.css">
		<link href="//fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link href="//fonts.googleapis.com/css?family=Lato" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="mystyle.css">
		<link rel="stylesheet" type="text/css" href="styles/style.css">
		<link rel="icon" href="images/au.PNG">
	</head>
	<body>
		<header class="header">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_container d-flex flex-row align-items-center justify-content-start">
							<div class="logo_container">
								<div class="logo">
									<div>Nilbus</div>
									<div>aub transports</div>
									<div class="logo_image"><img src="images/logo.png" alt="Image"></div>
								</div>
							</div>
							<nav class="main_nav ml_auto">
								<ul class="main_nav_list">
									<li class="main_nav_item"><a href="index.php">Home</a></li>
									<li class="main_nav_item active"><a href="#">Profile</a></li>
									<li class="main_nav_item"><a href="logout.php">Logout</a></li>
								</ul>
							</nav>
							<div class="search">
								<form action="#" class="search_form">
									<input type="search" name="search_input" class="search_input ctrl_class" required="required" placeholder="Keyword">
									<button type="submit" class="search_button ml-auto ctrl_class"><img src="images/search.png" alt=""></button>
								</form>
							</div>
							<div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
						</div>
					</div>
				</div>
			</div>
		</header>

		<div class="w3-main" style="margin-top:200px;">
			<div class="form-w3l">
				<div class="img">
					<img src="images/profile.jpg" alt="image">
					<h2>profile</h2>
				</div>
				<div class="formlike">
					<div class="w3l-common">
						<span><i class="fa fa-user-circle w3l-1" aria-hidden="true"></i></span>
						<p><?php echo $_SESSION['user'];?></p>
						<div class="clear"></div>
					</div>
				
					<!--<div class="w3l-password">
						<span><i class="fa fa-lock w3l-2" aria-hidden="true"></i></span>
						<input type="password" name="password" placeholder="password" required=""/>
						<div class="clear"></div>
					</div>-->
				
					<div class="w3l-common">
						<span><i class="fa fa-envelope w3l-3" aria-hidden="true"></i></span>
						<p><?php echo $_SESSION['email'];?></p>
						<div class="clear"></div>
					</div>
					
					<?php
						if($_SESSION['status'] == 'student')
						{
							echo '<div class="w31-common">
								<span><i class="fa fa-graduation-cap w31-3" aria-hidden="true"></i></span>
								<p>Student</p>
								<div class="clear"></div>
								</div>';
						}
						else
						{
					
						echo '<div class="w31-common">
							<span><i class="fa fa-drivers-license w31-3" aria-hidden="true"></i></span>
							<p>Driver</p>
							<div class="clear"></div>
							</div>';
						}
					?>

					<?php
						if($_SESSION['status'] == 'student'){
						echo '<div class="w3l-common">
							<span><i class="fa fa-mobile w31-3" aria-hidden="true"></i></span>
							<p>'.$_SESSION["session"].'</p>
							<div class="clear"></div>
							</div>';
						}
					?>

					<div class="w3l-common">
						<span><i class="fa fa-bus" aria-hidden="true"></i></span>
						<p><?php echo $_SESSION['bus'];?></p>
						<div class="clear"></div>
					</div>
					
					<?php
						if($_SESSION['status'] == 'driver')
						{
							echo '<div class="w31-common">
								<form action="temp.php" method="post">
								<p>Select start time of your bus</p>
								<select name="startTime">';
							$arr = getStartTime($_SESSION['bus']);
							foreach($arr as $value)
							{
								echo '<option value="'.$value.'">'.$value.'</option>';
							}
							echo'</select>
								<input type="submit" value="Check in"/>
								</form>
								</div>';
						}
					?>
				<div>
			</div>
		</div>

		<div class="menu_container menu_mm" style="overflow:auto;">

			<!-- Menu Close Button -->
			<div class="menu_close_container">
				<div class="menu_close"></div>
			</div>

			<!-- Menu Items -->
			<div class="menu_inner menu_mm">
				<div class="menu menu_mm">
					<div class="menu_search_form_container">
						<form action="#" id="menu_search_form">
							<input type="search" class="menu_search_input menu_mm">
							<button id="menu_search_submit" class="menu_search_submit" type="submit"><img src="images/search_2.png" alt=""></button>
						</form>
					</div>
					<ul class="menu_list menu_mm">
						<li class="menu_item menu_mm"><a href="#">Home</a></li>
						<li class="menu_item menu_mm">
							<div class="dropdown">
								<a class="dropbtn" onclick="makeActive()" href="#">Bus</a>
								<div class="dropdown-content">
									<?php
										addDropdown();
									?>
								</div>
							</div>
						</li>
						<li class="menu_item menu_mm"><a href="about.php">About us</a></li>
						<li class="menu_item menu_mm"><a href="contact.php">Contact</a></li>
						<li class="menu_item menu_mm"><a href="logout.php">Logout</a></li>
					</ul>

					<!-- Menu Social -->

					<div class="menu_social_container menu_mm">
						<ul class="menu_social menu_mm">
							<li class="menu_social_item menu_mm"><a href="https://www.pinterest.com"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
							<li class="menu_social_item menu_mm"><a href="https://www.linkedin.com"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
							<li class="menu_social_item menu_mm"><a href="https://www.instagram.com"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							<li class="menu_social_item menu_mm"><a href="https://www.facebook.com"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li class="menu_social_item menu_mm"><a href="https://www.twitter.com"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						</ul>
					</div>

					<div class="menu_copyright menu_mm">Shamim & abdullah All rights reserved</div>
				</div>
			</div>

		</div>

		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="styles/bootstrap4/popper.js"></script>
		<script src="styles/bootstrap4/bootstrap.min.js"></script>
		<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
		<script src="plugins/easing/easing.js"></script>
		<script src="plugins/parallax-js-master/parallax.min.js"></script>
		<script src="plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="js/custom.js"></script>
	</body>
</html>
