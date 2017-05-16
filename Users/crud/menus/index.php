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
	<a href="create.php"><button type="button">Add Menu</button></a>
	<a href="../../home.php"><button type="button">Home</button></a>
	<table border="1" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th>Food Name</th>
				<th>Price</th>
				<th>Portion Size</th>
				<th>Description</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$sql = "SELECT * FROM menus WHERE active = 2";
			$result = $connect->query($sql);
			
			if($result->num_rows >0)
			{
				while($row = $result->fetch_assoc())
				{
					echo "
					<tr>
						<td> ".$row['food_name']."</td>
						<td> ".$row['price']."</td>
						<td> ".$row['portion_size']."</td>
						<td> ".$row['menu_description']."</td>
						<td>
							<a href='edit.php?menu_id=".$row['menu_id']."'><button type='button'>Edit</button></a>
							<a href='remove.php?menu_id=".$row['menu_id']."'><button type='button'>Remove Request</button></a>
						</td>
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