<html>
<head>
	<title>Food Donation</title>

	<link rel="stylesheet" type="text/css" href="style/reset.css">
	<link rel="stylesheet" type="text/css" href="style/responsive.css">
</head>
<body>
<section class="">
		<?php
			include 'header.php';
		?>
</section>
	<h1><center> EXTRA FOODS </center></h1>
<h3><center><i> WHERE ZERO HUNGER BECOMES A REALITY  <i></center></h3>
<section class="listings">
		<div class="wrapper">
			<ul class="properties_list">
			<?php
				include 'connection.php';
				$sel = "SELECT * FROM restaurant";
				$rs = $conn->query($sel);
				while($rws = $rs->fetch_assoc()){
			?>
			<li>
                <a href="booking.php?id=<?php echo $rws['Resto_id'] ?>">
					<img class="thumb" src="images/<?php echo $rws['Image'];?>" width="300" height="200">
				</a>
				<div class="property_details">
					<h2><a href="booking.php?id=<?php echo $rws['Resto_id'] ?>"><span class="property_size"> Place Name:<?php echo $rws['Resto_name'];?></span></h2></a>
				</div>
			</li>
			<?php
				}
			?>
			</section>

</body>
</html>