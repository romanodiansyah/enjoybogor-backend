<?php require_once '../../../connect/db_connect.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Enjoy Bogor</title>
	
	<style type="text/css">
		.manageMember
		{
			width: 100%;
			margin: auto;
		}
		
		table
		{
			width: 100%;
			margin-top: 20px;
		}
	</style>
	
</head>
<body>

<div class="manageMember">
	<a href="create.php"><button type="button">Add Voucher</button></a>
	<a href="../../home.php"><button type="button">Home</button></a>
	<table border="1" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th>Voucher Name</th>
				<th>Points</th>
				<th>Type</th>
				<th>Quantity</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$sql = "SELECT * FROM vouchers WHERE active = 1";
			$result = $connect->query($sql);
			
			if($result->num_rows >0)
			{
				while($row = $result->fetch_assoc())
				{
					echo "
					<tr>
						<td> ".$row['voucher_name']."</td>
						<td>".$row['points_needed']."</td>
						<td>".$row['voucher_type']."</td>
						<td>".$row['quantity']."</td>
					</tr>";
				}
			}
				else
				{
					echo "<tr><td colspan='5'><center>No Data Available</center></td></tr>";
				}
			?>
		</tbody>
	</table>
</div>

</body>
</html>
</html>