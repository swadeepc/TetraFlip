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
				<h3 style="text-decoration: underline;">Food Items Available:</h3>
</section>
					<form method="post">
						<table align="center">
							<tr>
								<th>Food Name:</th>
								<th>Quantity Available (KG)</th>
								<th>Quantity (KG) </th>
							</tr>
							<?php
								session_start();
								include 'connection.php';
								$rid=$_SESSION['cid'];
								$a=array();
								$i=0;
								$pid=0;
								$qry2= "SELECT Purchase_id from purchase_order";
								$result = $conn->query($qry2);
								while($row = $result->fetch_assoc()){
									$pid=$row['Purchase_id'];
								}
								$pid++;
								$select = "SELECT Item_name,Item_quantity,Item_id from item where Resto_id='$_GET[id]' and Item_quantity>0 ";
								$result = $conn->query($select);
								while($row = $result->fetch_assoc()){
								$iid=$row['Item_id'];
								$max=$row['Item_quantity'];
							?>
							
							<tr>
								<td><?php echo $row['Item_name'] ?></td>
								<td><?php echo $row['Item_quantity'] ?></td>
								<td><input type="number" id=<?php echo $iid?> name=<?php echo $iid?> min="0" max="<?php echo $max?>"></td>
							</tr>
							<?php
								$i++;
								array_push($a,$iid);
							}
							?>
							<tr>
								<td colspan="3" style="text-align:center"><input type="submit" name="save" value="Proceed"></td>
							</tr>
						</table>
					</form>
					<?php
					echo $pid;
					if(isset($_POST['save'])){
						while($i>0){
							$i--;
							$id = $_POST[$a[$i]];
							if($id>0){
							$qry = "INSERT INTO purchase_order (Purchase_id,Customer_id,Resto_id,Item_id,Purchase_quantity)
							VALUES('$pid','$rid','$_GET[id]','$a[$i]','$id')";
							$qry2 = "UPDATE item set Item_quantity=Item_quantity-'$id' where Item_id='$a[$i]'";
							$result = $conn->query($qry);
							if($result == TRUE){
								$res=$conn->query($qry2);
							}
						}
						}
						echo "<script type = \"text/javascript\">
					alert(\"Successfully Ordered.\");
					window.location = (\"order_completion.php?id=$pid\")
					</script>";
					}
					
						
					  ?>
</div>				
</div>
