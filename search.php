<?php
	session_start();
	include "Myheader.php";
	$searchkey = "";
	
	if(isset($_POST['search_input'])) $searchkey = $_POST['search_input'];
	else header('location: index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Nil Bus</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Destino project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link href="plugins/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
<link rel="stylesheet" type="text/css" href="mystyle.css">
<link rel="icon" href="images/au.PNG">
<style>
	body{
		background: url('images/about.jpg');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
	}
</style>
</head>
<body>
	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header_container d-flex flex-row align-items-center justify-content-start">

						<!-- Logo -->
						<div class="logo_container">
							<div class="logo">
								<div>Nilbus</div>
								<div>Aub transports</div>
								<div class="logo_image"><img src="images/logo.png" alt=""></div>
							</div>
						</div>

						<!-- Main Navigation -->
						<nav class="main_nav ml-auto">
							<ul class="main_nav_list">
								<li class="main_nav_item active"><a href="#">Home</a></li>
								<li class="main_nav_item">
									<div class="dropdown">
										<a class="dropbtn" onmouseover="makeActive()" href="#">Bus</a>
										<div class="dropdown-content">
											<?php
												addDropdown();
											?>
										</div>
									</div>
								</li>
								<li class="main_nav_item"><a href="about.php">About us</a></li>
								<li class="main_nav_item"><a href="contact.php">Contact</a></li>
								<?php
									if(isset($_SESSION['email']))
									{
										echo '<li class="main_nav_item"><a href="profile.php">Profile</a></li>';
										echo '<li class="main_nav_item"><a href="logout.php">Logout</a></li>';
									}
									else
									{
										echo '<li class="main_nav_item"><a href="Login.php">Sign in</a></li>';
									}
								?>
							</ul>
						</nav>

						<!-- Search -->
						<div class="search">
							<form action="search.php" class="search_form" method="post">
								<input type="search" name="search_input" class="search_input ctrl_class" required="required" placeholder="Keyword">
								<button type="submit" class="search_button ml-auto ctrl_class"><img src="images/search.png" alt=""></button>
							</form>
						</div>

						<!-- Hamburger -->
						<div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>

					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- Menu -->

	<div class="menu_container menu_mm">

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
					<li class="menu_item menu_mm"><a href="#">Home</a></li>
					<li class="menu_item menu_mm"><a href="#">Bus</a></li>
					<li class="menu_item menu_mm"><a href="about.php">About us</a></li>
					<li class="menu_item menu_mm"><a href="contact.php">Contact</a></li>
					<?php
						if(isset($_SESSION['email']))
						{
							echo '<li class="menu_item menu_mm"><a href="profile.php">Profile</a></li>';
							echo '<li class="menu_item menu_mm"><a href="logout.php">Logout</a></li>';
						}
						else
						{
							echo '<li class="menu_item menu_mm"><a href="Login.php">Signin</a></li>';
						}
					?>
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

				<div class="menu_copyright menu_mm">Colorlib All rights reserved</div>
			</div>
		</div>

	</div>
	<div class="search_result">
	<?php
		//echo "<p>You have searched '".$searchkey."'</p>";
		$conn = openmysqlconnection();
		$sql = "SELECT * from businfo";
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result))
		{
			if(strpos($row['stopage'], $searchkey) !== false)
			{
				echo "<p><u>".$row['stopage'] . "</u> can be reached by <a href='Anando.php?var=".getBusName($conn, $row['busid'])."'>" . getBusName($conn, $row['busid']) . "</a></p>";
			}
		}
		closemysql($conn);
	?>
	</div>
</body>
</html>
