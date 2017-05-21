<?php require_once '../../../../connect/db_connect.php'; ?>

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
	<a href="create.php"><button type="button">Add Member</button></a>
	<a href="../../home.php"><button type="button">Home</button></a>
	<table border="1" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th>Restaurant Name</th>
				<th>Restaurant Address</th>
				<th>Restaurant Category</th>
				<th>Restaurant Contact</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$search = $_POST['search'];
			$sql = "SELECT 'schema_name' FROM information_schema.schemata WHERE schema_name LIKE '%".$search."%' ";
			$result = $connect->query($sql);
			
			if($result->num_rows >0)
			{
				while($row = $result->fetch_assoc())
				{
					echo "
					<tr>
						<td> ".$row['restaurant_name']."</td>
						<td> ".$row['restaurant_address']."</td>
						<td>".$row['restaurant_category']."</td>
						<td>".$row['restaurant_contact']."</td>
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