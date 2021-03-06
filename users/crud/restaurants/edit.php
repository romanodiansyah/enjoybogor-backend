<?php
 session_start();
 if (empty($_SESSION['user_id'])) {
	header("location:../commonfunction/login/login.php"); // jika belum login, maka dikembalikan ke file form_login.php
 }
 else {
 ?>
<?php

require_once '../../../connect/db_connect.php';

if($_GET['restaurant_id'])
{
	$restaurant_id = $_GET['restaurant_id'];
	
	$sql = "SELECT * FROM restaurants WHERE restaurant_id = {$restaurant_id}";
	$result = $connect->query($sql);
	
	$data = $result->fetch_assoc();
	
	$connect->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Restaurant</title>
		
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
	<legend>Edit Restaurant</legend>
	
	<form action="php_action/update.php" method="post">
		<table cellspacing="0" cellpadding="0">
			<tr>
				<th>Restaurant Name</th>
				<td><input type="text" name="restaurant_name" placeholder="Restaurant Name" value="<?php echo $data['restaurant_name'] ?>" /></td>
			</tr>
			<tr>
				<th>Address</th>
				<td><input type"text" name="restaurant_address" placeholder="Address" value="<?php echo $data['restaurant_address'] ?>" /></td>
			</tr>
			<tr>
				<th>Category</th>
				<td><input type"text" name="restaurant_category" placeholder="Category" value="<?php echo $data['restaurant_category']?>" /></td>
			</tr>
			<tr>
				<th>Contact</th>
				<td><input type"text" name="restaurant_contact" placeholder="Contact" value="<?php echo $data['restaurant_contact']?>"/></td>
			</tr>
			<tr>
				<th>Description</th>
				<td><input type="textbox" name="restaurant_description" placeholder="Description" value="<?php echo $data['restaurant_description']?>" /></td>
			</tr>
			<tr>
				<input type="hidden" name="restaurant_id" value="<?php echo $data['restaurant_id']?>" />
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
 }
?>
