<!DOCTYPE html>
<html lang="en">
<head>
	<title>Food Donation</title>
	<link rel="stylesheet" type="text/css" href="style/reset.css">
	<link rel="stylesheet" type="text/css" href="style/responsive.css">
	<style>

table, th, td {
  border-collapse: collapse;
  margin-left: auto;
  margin-right: auto;
}
th, td {
  padding: 2px;
}
</style>
</head>
<body>
<section class="">
		<?php
			include 'header.php';
		?>
		<br>
		<br>
		<br>
		<section class="search">
		<div class="wrapper">
		<br>
				<h2 style="text-align:center; color: green; font-weight:bold; text-decoration:underline">Signup Here</h2>
				<form method="post">
					<table>
						<tr>
							<td><h3>Restaurant Name:</h3></td>
							<td><input type="text" name="name" required></td>
						</tr>
						<tr>
							<td><h3>Phone Number:</h3></td>
							<td><input type="text" name="phone" required></td>
						</tr>
						<tr>
							<td><h3>Email Address:</h3></td>
							<td><input type="email" name="email" required></td>
						</tr>
						<tr>
							<td><h3>Password:</h3></td>
							<td><input type="password" name="password" required></td>
						</tr>
						<tr>
						<td><h3>Restaurant Address:</h3></td>
							<td><textarea name="address" required></textarea> <!--<input type="text" name="address" required></td>-->
						</tr>
						<td><h3>Image:</h3></td>
							<td><input type="file" name="image" accept="image/*" required></td>
						</tr>
						<tr>
							<td colspan="2" style="text-align:right"><input type="submit" name="save" value="Submit Details"></td>
						</tr>
					</table>
					<br>
				</form>
				<?php
						if(isset($_POST['save'])){
							include 'connection.php';
							$name = $_POST['name'];
							$password = $_POST['password'];
							$image = $_POST['image'];
							$email = $_POST['email'];
							$phone = $_POST['phone'];
							$address = $_POST['address'];
							
							$qry = "INSERT INTO restaurant(Password,Phone_number,Name,Address,Email_Address,Image)
							VALUES('$password','$phone','$name','$address','$email','$image')";
							$result = $conn->query($qry);
							if($result == TRUE){
								echo "<script type = \"text/javascript\">
											alert(\"Successfully Registered.\");
											window.location = (\"login.php\")
											</script>";
							} else{
								echo "<script type = \"text/javascript\">
											alert(\"Registration Failed. Try Again\");
											window.location = (\"signup.php\")
											</script>";
							}
						}
						
					  ?>
			</ul>
		</div>
		</section>
</section>
</body>
</html>