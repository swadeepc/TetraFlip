<!DOCTYPE html>
<html lang="en">
<head>
	<title>Food Donation</title>

	<link rel="stylesheet" type="text/css" href="style/reset.css">
	<link rel="stylesheet" type="text/css" href="style/responsive.css">
	<style>
table, th, td,tr {
  padding: 15px;
  border: 1px solid black;
  text-align:center;
}
  table {
    width:50%; 
    margin-left:25%; 
    margin-right:25%;
  }

tr:nth-child(even) {
  background-color: #eee;
}
tr:nth-child(odd) {
 background-color: #fff;
}
th {
  background-color: black;
  color: white;
}

</style>
</head>
<body>
<section class="">
		<?php
			include 'header2.php';
		?>
	</section>
	<section class="listings">
		<div class="wrapper">
				<h3 style="text-decoration: underline;">Your Donations</h3>
</section>

<table align="center">
							<tr>
								<th>Food Name:</th>
								<th>Quantity Available (KG)</th>
							</tr>
							<?php
								session_start();
								include 'connection.php';
								$rid=$_SESSION['cid'];
								$select = "SELECT Item_name,Item_quantity from item where Resto_id='$rid' and Item_quantity>0 ";
								$result = $conn->query($select);
								while($row = $result->fetch_assoc()){
							?>
							<tr>
								<td><?php echo $row['Item_name'] ?></td>
								<td><?php echo $row['Item_quantity']?></td>
							</tr>
							<?php
								}
								?>
</table>
