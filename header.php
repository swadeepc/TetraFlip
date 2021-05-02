<?php
	session_start();
	error_reporting("E-NOTICE");
?>
<header>
			<div class="wrapper">
				<h1 class="logo"> EXTRA FOODS </h1>
				<h5 class="logo2"> Contact:9902655879</h5>
				<nav>
					<?php
						if(!$_SESSION['email'] && (!$_SESSION['pass'])){
					?>
					<?php
						} else{
					?>
							<ul>
								<li><a  href="resto_names.php">Home</a></li>
							</ul>
					<a  href="logout.php">Logout</a>
					<ul>
						<li><a href="rprofile.php">Profile</a></li>
					</ul>
					<ul>
						<li><a class='top-btn' href="ryour_order.php">Your Orders</a></li>
					</ul>

					<?php
						}
					?>
				</nav>
			</div>
		</header>