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
  padding: 5px;
}
</style>
</head>
<body>
<section class="">
		<?php
			include 'header2.php';
		?>
		<section class="listings">
		<div class="wrapper">
			
				<center><h2>Enter Item Details Here:</h2></center>
				<div id="fom">
				<form method="post">
					<table>
						<tr>
							<td><h3>Item Name:</h3></td>
							<td><input type="text" name="name" required></td>
						</tr>
						<tr>
							<td><h3>Quantity:</h3></td>
							<td><input type="text" name="quantity" required></td>
						</tr>
						<tr>
							<td colspan="2" style="text-align:right"><input type="submit" name="save" value="Submit Details"></td>
						</tr>
					</table>
				</form>
				<?php
						if(isset($_POST['save'])){
							include 'connection.php';
							$name = $_POST['name'];
							$quantity = $_POST['quantity'];
							$rid=$_SESSION['cid'];
							
							$qry = "INSERT INTO item (Resto_id,Item_name,Item_quantity)
							VALUES('$rid','$name','$quantity')";
							$result = $conn->query($qry);
							if($result == TRUE){
								echo "<script type = \"text/javascript\">
											alert(\"Successfully Added Item.\");
											window.location = (\"donation.php\")
											</script>";
							} else{
								echo "<script type = \"text/javascript\">
											alert(\"Failed. Try Again\");
											window.location = (\"donation.php\")
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