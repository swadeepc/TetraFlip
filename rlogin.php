<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style/reset.css">
	<link rel="stylesheet" type="text/css" href="style/responsive.css">
<style>
table {
    margin-left: auto;
  margin-right: auto;
}
</style>

</head>
<body>
<section class="">
		<?php
			include 'header.php';
		?>
</section>

<br><br><br><br>
	<section class="search">
		<div class="wrapper">
		<div id="fom">
			<nav>
			<form method="post">
				<br>
			<h2 style="text-align:center; color: green; font-weight:bold; text-decoration:underline">Receiver Login Area</h2>
				<table height="150" align="center">
					<tr>
						<td><h3>Email Address:</h3></td>
						<td><input type="email" name="email" placeholder="Enter Email Address" required></td>
					</tr>
					<tr>
						<td><h3>Password:</h3></td>
						<td><input type="password" name="pass" placeholder="Enter Password" required></td>
					</tr>
					<tr>
						<td><input type="submit" name="log" value="Login Here"></td>
						<td style="text-align:right;"><a href="rsignup.php">Signup Here</a></td>
					</tr>
				</table>
			</form>
			</nav>
			<?php
				if(isset($_POST['log'])){
					include 'connection.php';
					
					$uname = $_POST['email'];
					$pass = $_POST['pass'];
					
					$qy = "SELECT * FROM customers WHERE Email_Address = '$uname' AND Password= '$pass'";
					$log = $conn->query($qy);
					$num = $log->num_rows;
					$row = $log->fetch_assoc();
					if($num > 0){
						session_start();
						$_SESSION['email'] = $row['Email_Address'];
						$_SESSION['pass'] = $row['Password'];
						$_SESSION['cid']=$row['Customer_id'];
						echo "<script type = \"text/javascript\">
									alert(\"Login Successful.\");
									window.location = (\"resto_names.php\")
									</script>";
					} else{
						echo "<script type = \"text/javascript\">
									alert(\"Login Failed. Try Again.\");
									window.location = (\"rlogin.php\")
									</script>";
					}
				}
			?>
		</div>
		</div>
		</section>
</body>
</html>