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
			include 'header2.php';
		?>
	</section>
	<section class="listings">
		<div class="wrapper">
				<h2 style="text-decoration: underline; color: #303C6C">Customer Orders</h2>
</section>
<?php
								session_start();
								include 'connection.php';
								$cid=$_SESSION['cid'];
								$a=array();
								$i=0;
								$select = "SELECT Distinct Purchase_id as p from purchase_order where Resto_id='$cid' order by Purchase_id";
								$result = $conn->query($select);
								while($row = $result->fetch_assoc()){
									$iid=$row['p'];
									$i++;
									array_push($a,$iid);
								}
								
								while($i>0){
									$i--;
									$select = "SELECT Name from purchase_order p, customers c where p.Purchase_id='$a[$i]' and p.Customer_id=c.Customer_id";
									$result = $conn->query($select);
									while($row = $result->fetch_assoc()){
										$resto=$row['Name'];
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
								session_start();
								include 'connection.php';
								$cid=$_SESSION['cid'];
								$select = "SELECT Item_name,Purchase_quantity,Status from purchase_order p,item i where p.Purchase_id='$a[$i]' and p.Item_id=i.Item_id";
								$result = $conn->query($select);
								while($row = $result->fetch_assoc()){
									$x=$row['Status'];
							?>
							<tr>
								<td><?php echo $row['Item_name'] ?></td>
								<td><?php echo $row['Purchase_quantity'] ?></td>
							</tr>
						
							<?php
								}
							?>
<tr>
							<th> Status </th>
							<th style="text-align:center"><?php
							 if($x==0)
							 {
								echo "In Progress";
								?>
							<form method="post">
										<br>
										<input type="submit" name=<?php echo $a[$i] ?> value="Cancel Order">
										<input type="submit" name=<?php echo $a[$i]*-1 ?> value="Delivered">
							</form>

							<?php
							if(isset($_POST[$a[$i]])){
								$qry2 = "UPDATE item i,purchase_order p set Item_quantity=i.Item_quantity+p.Purchase_quantity where p.Purchase_id='$a[$i]' and p.Item_id=i.Item_id";
								$result = $conn->query($qry2);
								$qry = "UPDATE purchase_order set status='-1' where Purchase_id='$a[$i]'";
								if($result == TRUE){
									$res=$conn->query($qry);
									echo "<script type = \"text/javascript\">
					alert(\"Successfully Cancelled.\");
					window.location = (\"dyour_order.php?\")
					</script>";
								}
							 }
							 if(isset($_POST[-$a[$i]])){
								$qry = "UPDATE purchase_order set status='1' where Purchase_id='$a[$i]'";
								$res=$conn->query($qry);
									if($res == TRUE){
									echo "<script type = \"text/javascript\">
					alert(\"Successfully Delivered.\");
					window.location = (\"dyour_order.php?\")
					</script>";
								}
							 }
							}
							else if($x==-1)
								echo "Cancelled";
							else
								echo "Completed";
							 ?></td>
						</th>
						</table>
						<br><br><br>
						<?php
								}
						?>
</div>
				<!--	<h2 align="center"><input type="submit" onclick="window.print()" align="center" value="Print Here" /></h2>  -->
					
				</div>