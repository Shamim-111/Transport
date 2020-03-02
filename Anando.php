<?php
	session_start();
	include "Myheader.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<?php
			setTitle($_GET['var']);
		?>
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
				<?php
					setBackground($_GET['var']);
				?>
				background-repeat: no-repeat;
				background-attachment: fixed;
				background-size: 100% 100%;
			}
		</style>
		<link rel="stylesheet" type="text/css" href="mystyle.css">
		<link rel="icon" href="images/au.PNG">
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
								<li class="main_nav_item"><a href="index.php">Home</a></li>
								<li class="main_nav_item active">
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
							<form action="search.php" id="form2" class="search_form" method="post">
								<input type="search" name="search_input" class="search_input ctrl_class" required="required" placeholder="Keyword">
								<button type="submit" form="form2" class="search_button ml-auto ctrl_class"><img src="images/search.png" alt=""></button>
							</form>
						</div>

						<!-- Hamburger -->
						<div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>

					</div>
				</div>
			</div>
		</div>
		</header>

		<div class="menu_container menu_mm" style="overflow:auto;">

		<!-- Menu Close Button -->
		<div class="menu_close_container">
			<div class="menu_close"></div>
		</div>

		<!-- Menu Items -->
		<div class="menu_inner menu_mm">
			<div class="menu menu_mm">
				<div class="menu_search_form_container">
					<form action="search.php" id="menu_search_form" method="post">
						<input type="search" name="search_input" class="menu_search_input menu_mm">
						<button id="menu_search_submit" form="menu_search_form" class="menu_search_submit" type="submit"><img src="images/search_2.png" alt="S"></button>
					</form>
				</div>
				<ul class="menu_list menu_mm">
					<li class="menu_item menu_mm"><a href="index.php">Home</a></li>
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
					<li class="menu_item menu_mm"><a href="#">Contact</a></li>
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
		
		<div class="tab">
			<button class="tablinks" onclick="openPage(event, 'Home')" id="defaultOpen">Home</button>
			<button class="tablinks" onclick="openPage(event, 'Uptrip')">Uptrip</button>
			<button class="tablinks" onclick="openPage(event, 'Downtrip')">Downtrip</button>
			<button class="tablinks" onclick="openPage(event, 'Stoppage')">Stoppage</button>
			<button class="tablinks" onclick="openPage(event, 'Comittee')">Comittee</button>
			<button class="tablinks" onclick="openPage(event, 'Track')">Track</button>
		</div>
		
		<div id="Home" class="tabcontent">
			<h1>Bus name</h1>
			<?php
				echo "<p>Bus name is ".$_GET['var']."</p>";
			?>
		</div>

		<div id="Stoppage" class="tabcontent">
			<h1>Stoppage</h1>
			<?php
				$conn = openmysqlconnection();
				$sql = "SELECT stopage, latitude, longitude from businfo where busid = '".getBusId($conn, $_GET['var'])."' ORDER BY serial ASC";
				$result = mysqli_query($conn, $sql);
				echo "<ul>";
				while($row = mysqli_fetch_assoc($result))
				{
					echo "<li><a href=\"https://maps.google.com?q=".$row['latitude'].",".$row['longitude']."\" target='_blank'>" . $row['stopage'] . "</a><br></li>";
				}
				echo "</ul>";
				closemysql($conn);
			?>
		</div>

		<div id="Uptrip" class="tabcontent">
			<h1>Uptrip</h1>
			<?php
				$conn = openmysqlconnection();
				$sql = "SELECT schedule from uptrip where busid = '".getBusId($conn, $_GET['var'])."'";
				$result = mysqli_query($conn, $sql);
				echo "<ul>";
				while($row = mysqli_fetch_assoc($result))
				{
					$data = $row['schedule'];
					$hour = substr($data, 0, 2);
					if((int)$hour < 12)
					{
						echo "<li><p>" . $data . " AM</p></li>";
					}
					else
					{
						echo "<li><p>" . ((int)$hour - 12) . substr($data, 2, 6) . " PM</p></li>";
					}
				}
				echo "</ul>";
				closemysql($conn);
			?>
		</div>

		<div id="Downtrip" class="tabcontent">
			<h1>Downtrip</h1>
			<?php
				$conn = openmysqlconnection();
				$sql = "SELECT schedule from downtrip where busid = '".getBusId($conn, $_GET['var'])."'";
				$result = mysqli_query($conn, $sql);
				echo "<ul>";
				while($row = mysqli_fetch_assoc($result))
				{
					$data = $row['schedule'];
					$hour = substr($data, 0, 2);
					if((int)$hour < 12)
					{
						echo "<li><p>" . $data . " AM</p></li>";
					}
					else
					{
						if((int)$hour>12)
						echo "<li><p>" . ((int)$hour - 12) . substr($data, 2, 6) . " PM</p></li>";
						else
							echo "<li><p>" . $data . " PM</p></li>";
					}
				}
				echo "</ul>";
				closemysql($conn);
			?>
		</div>
		
		<div id="Comittee" class="tabcontent">
			<h1>Comittee</h1>
			<p>Here are comittee members</p>
		</div>

		<div id="Track" class="tabcontent">
			<h1>Location</h1>
			<?php
				showTrackHistory($_GET['var']);
				/*echo getIP();
				echo "Your location: ".getLatitude().", ".getLongitude()."<br>";
				date_default_timezone_set("Asia/Dhaka");
				echo "<br>Now time is: ".date("h:i:sa")."<br>";
				echo "Distance: ".getDistance(23, 90, 23.1, 90.1)." km<br>";*/
			?>
		</div>
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="styles/bootstrap4/popper.js"></script>
		<script src="styles/bootstrap4/bootstrap.min.js"></script>
		<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
		<script src="plugins/easing/easing.js"></script>
		<script src="plugins/parallax-js-master/parallax.min.js"></script>
		<script src="plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="js/custom.js"></script>
		<script src="js/myjs.js"></script>
	</body>
</html> 
