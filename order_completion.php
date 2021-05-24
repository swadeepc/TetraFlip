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
  background-color: #303C6C;
  color: white;
}
tr:nth-child(1) {
  background-color: #D2FDFF;
  color: white;
}
</style>
</head>
<body>
<section class="">
		<?php
			include 'header.php';
		?>
	</section>
	<section class="listings">
		<div class="wrapper">
				<h2 style="text-decoration: underline;  color: #303C6C">Your Order</h2>
</section>

<?php
								session_start();
								include 'connection.php';
								$cid=$_SESSION['cid'];
								$select = "SELECT Resto_name  from purchase_order p,restaurant r where p.Purchase_id='$_GET[id]' and p.Resto_id=r.Resto_id";
								$result = $conn->query($select);
								while($row = $result->fetch_assoc()){
									$resto=$row['Resto_name'];
								}
							?>
<table align="center">
						<tr>
							<td colspan="2" style="text-align:center"><b><h2><?php echo $resto ?><h2></b></td>
						</tr>
							<tr>
								<th>Item Name</th>
								<th>Quantity</th>
							</tr>
							<?php
								$select = "SELECT Item_name,Purchase_quantity from purchase_order p,item i where p.Purchase_id='$_GET[id]' and p.Item_id=i.Item_id";
								$result = $conn->query($select);
								while($row = $result->fetch_assoc()){
							?>
							<tr>
								<td><?php echo $row['Item_name'] ?></td>
								<td><?php echo $row['Purchase_quantity'] ?></td>
							</tr>
						
							<?php
								}
							?>
						</table>
</div>
				<!--	<h2 align="center"><input type="submit" onclick="window.print()" align="center" value="Print Here" /></h2>  -->
					
				</div>



