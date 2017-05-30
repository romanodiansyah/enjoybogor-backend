<?php
 session_start();
 if (empty($_SESSION['user_id'])) {
	header("location:../commonfunction/login/login.php"); // jika belum login, maka dikembalikan ke file form_login.php
 }
 else {
 ?>
<?php

require_once '../../../connect/db_connect.php';

if ($_GET['menu_id']) {
    $menu_id = $_GET['menu_id'];

    $sql = "SELECT food_name,price,portion_size,menu_description,menu_id FROM menus WHERE menu_id = {$menu_id}";
    $result = $connect->query($sql);

    $data = $result->fetch_assoc();

    $connect->close(); ?>

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
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

 }}
?>
