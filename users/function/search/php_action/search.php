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
	<a href="../../../../home.php"><button type="button">Home</button></a>
	<a href="../search.php"><button type="button">Back</button></a>
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
			if($connect->query("SELECT * FROM menus WHERE food_name LIKE '%".$search."%' || menu_description LIKE '%".$search."%'")->num_rows >0 AND $connect->query("SELECT * FROM restaurants WHERE restaurant_name LIKE '%".$search."%' || restaurant_address LIKE '%".$search."%' || 
						restaurant_category LIKE '%".$search."%' || restaurant_contact LIKE '%".$search."%' || restaurant_description LIKE '%".$search."%'")->num_rows >0) {
			$sql = 
			"
				(SELECT * from
						(SELECT DISTINCT restaurant_id FROM menus WHERE food_name LIKE '%".$search."%' || menu_description LIKE '%".$search."%') 
					M JOIN 
						(SELECT * FROM restaurants) 
					R ON M.restaurant_id=R.restaurant_id)
				UNION
				(SELECT * from 
						(SELECT DISTINCT restaurant_id FROM menus WHERE food_name LIKE '%".$search."%' || menu_description LIKE '%".$search."%') 
					M JOIN 
						(SELECT * FROM restaurants WHERE restaurant_name LIKE '%".$search."%' || restaurant_address LIKE '%".$search."%' || 
						restaurant_category LIKE '%".$search."%' || restaurant_contact LIKE '%".$search."%' || restaurant_description LIKE '%".$search."%') 
					R ON not M.restaurant_id=R.restaurant_id)
			";}
			if($connect->query("SELECT * FROM menus WHERE food_name LIKE '%".$search."%' || menu_description LIKE '%".$search."%'")->num_rows <1 AND $connect->query("SELECT * FROM restaurants WHERE restaurant_name LIKE '%".$search."%' || restaurant_address LIKE '%".$search."%' || 
						restaurant_category LIKE '%".$search."%' || restaurant_contact LIKE '%".$search."%' || restaurant_description LIKE '%".$search."%'")->num_rows >0) {

			$sql = 
			"
				SELECT * FROM restaurants WHERE restaurant_name LIKE '%".$search."%' || restaurant_address LIKE '%".$search."%' || 
						restaurant_category LIKE '%".$search."%' || restaurant_contact LIKE '%".$search."%' || restaurant_description LIKE '%".$search."%'
			";}
			if($connect->query("SELECT * FROM menus WHERE food_name LIKE '%".$search."%' || menu_description LIKE '%".$search."%'")->num_rows >0 AND $connect->query("SELECT * FROM restaurants WHERE restaurant_name LIKE '%".$search."%' || restaurant_address LIKE '%".$search."%' || 
						restaurant_category LIKE '%".$search."%' || restaurant_contact LIKE '%".$search."%' || restaurant_description LIKE '%".$search."%'")->num_rows <1) {

			$sql = 
			"
				(SELECT * from
						(SELECT DISTINCT restaurant_id FROM menus WHERE food_name LIKE '%".$search."%' || menu_description LIKE '%".$search."%') 
					M JOIN 
						(SELECT * FROM restaurants) 
					R ON M.restaurant_id=R.restaurant_id)
			";}
			if($connect->query("SELECT * FROM menus WHERE food_name LIKE '%".$search."%' || menu_description LIKE '%".$search."%'")->num_rows <1 AND $connect->query("SELECT * FROM restaurants WHERE restaurant_name LIKE '%".$search."%' || restaurant_address LIKE '%".$search."%' || 
						restaurant_category LIKE '%".$search."%' || restaurant_contact LIKE '%".$search."%' || restaurant_description LIKE '%".$search."%'")->num_rows <1) {

			$sql = 
			"
				(SELECT * from 
						(SELECT * FROM menus WHERE food_name LIKE '%".$search."%' || menu_description LIKE '%".$search."%') 
					M JOIN 
						(SELECT * FROM restaurants WHERE restaurant_name LIKE '%".$search."%' || restaurant_address LIKE '%".$search."%' || 
						restaurant_category LIKE '%".$search."%' || restaurant_contact LIKE '%".$search."%' || restaurant_description LIKE '%".$search."%') 
					R ON M.restaurant_id!=R.restaurant_id)
				UNION ALL
				(SELECT * from 
						(SELECT * FROM menus WHERE food_name LIKE '%".$search."%' || menu_description LIKE '%".$search."%') 
					M JOIN 
						(SELECT * FROM restaurants WHERE restaurant_name LIKE '%".$search."%' || restaurant_address LIKE '%".$search."%' || 
						restaurant_category LIKE '%".$search."%' || restaurant_contact LIKE '%".$search."%' || restaurant_description LIKE '%".$search."%') 
					R ON M.restaurant_id=R.restaurant_id)
			";}
			$result = $connect->query($sql);
			
			if($result->num_rows >0)
			{
				while($row = $result->fetch_assoc())
				{
					echo "
					<tr>
						<td><a href='../../../crud/restaurants/restaurant/index.php?restaurant_id=".$row['restaurant_id']."'> ".$row['restaurant_name']."</td>
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