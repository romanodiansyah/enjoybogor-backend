<?php

require_once '../../../connect/db_connect.php';

if($_GET['menu_id'])
{
	$menu_id = $_GET['menu_id'];
	
	$sql = "SELECT * FROM menus WHERE menu_id = {$menu_id}";
	$result = $connect->query($sql);
	
	$data = $result->fetch_assoc();
	
	$connect->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Menu</title>
		
		<style type="text/css">
			fieldset
			{
				margin: auto;
				margin-top: 100px
				width: 50%
			}
			
			table tr th
			{
				padding-top: 20px;
			}
		</style>
</head>
<body>

<fieldset>
	<legend>Edit Menu</legend>
	
	<form action="php_action/update.php" method="post">
		<table cellspacing="0" cellpadding="0">
			<tr>
				<th>Food Name</th>
				<td><input type="text" name="food_name" placeholder="Food Name" value="<?php echo $data['food_name'] ?>" /></td>
			</tr>
			<tr>
				<th>Price</th>
				<td><input type"text" name="price" placeholder="Price" value="<?php echo $data['price'] ?>" /></td>
			</tr>
			<tr>
				<th>Portion Size</th>
				<td><input type"text" name="portion_size" placeholder="Portion Size" value="<?php echo $data['portion_size']?>" /></td>
			</tr>
			<tr>
				<th>Description</th>
				<td><input type="textbox" name="menu_description" placeholder="Description" value="<?php echo $data['menu_description']?>" /></td>
			</tr>
			<tr>
				<input type="hidden" name="menu_id" value="<?php echo $data['menu_id']?>" />
				<td><button type="submit">Save Changes</button></td>
				<td><a href="index.php"><button type="button">Back</button></a></td>
			</tr>
		</table>
	</form>
	
</fieldset>

</body>
</html>

<?php
}
?>
