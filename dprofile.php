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
			include 'header2.php';
			include 'connection.php';
			$user_id = $_SESSION['cid'];
			$qy = "SELECT * FROM restaurant WHERE Resto_id='$user_id'";
			$log = $conn->query($qy);
			$num = $log->num_rows;
			$row = $log->fetch_assoc();
			if($num > 0){
			$name = $row['Resto_name'];	
			$address = $row['Address'];
			$phone = $row['Phone_number'];
			$email = $row['Email_Address'];
			$password = $row['Password'];
			}
		?>
		<br><br><br><br>
		<section class="search">
		<div class="wrapper">
			<br>
			<h2 style="text-align:center; color: #303C6C; font-weight:bold; text-decoration:underline">Update Your Details Here</h2>
				<form method="post">
					<table>
						<tr>
							<td><h3>Name:</h3></td>
							<td><input type="text" name="name" required value="<?php echo $name;?>"></td>
						</tr>
						<tr>
							<td><h3>Phone Number:</h3></td>
							<td><input type="text" name="phone" required value="<?php echo $phone;?>"></td>
						</tr>
						<tr>
							<td><h3>Email Address:</h3></td>
							<td><input type="email" name="email" required value="<?php echo $email;?>"></td>
						</tr>
						<tr>
							<td><h3>Password</h3></td>
							<td><input type="password" name="password" required value="<?php echo $password;?>"></td>
						</tr>
						<tr>
							<td><h3>Address:</h3></td>
							<td><textarea name="address" ><?php echo $address;?></textarea></td>
						</tr>
						<tr>
							<td colspan="2" style="text-align:right"><input type="submit" name="save" value="Submit Details"></td>
						</tr>
						
					</table>
					<br>
				</form>
				<?php
						if(isset($_POST['save'])){
							$namea = $_POST['name'];
							$passworda = $_POST['password'];
							$emaila = $_POST['email'];
							$phonea = $_POST['phone'];
							$addressa = $_POST['address'];
							
							$qry = "UPDATE restaurant SET 
							Password='$passworda',
							Phone_number='$phonea',
							Resto_name='$namea',
							Address='$addressa',
							Email_Address='$emaila' WHERE Resto_id='$user_id'";
							$result = $conn->query($qry);
							if($result == TRUE){
								echo "<script type = \"text/javascript\">
											alert(\"Successfully Update\");
											window.location = (\"donation.php\")
											</script>";
							} else{
								echo "<script type = \"text/javascript\">
											alert(\"Updation Failed. Try Again\");
											window.location = (\"dprofile.php\")
											</script>";
							}
						}
						
					  ?>
			</div>
			</section>
</section>
</body>
</html>