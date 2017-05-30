<?php
 session_start();
 if (empty($_SESSION['user_id'])) {
	header("location:../commonfunction/login/login.php"); // jika belum login, maka dikembalikan ke file form_login.php
 }
 else {
	 	$restaurant_id = $_GET['restaurant_id'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Menu</title>

	<style type="text/css">
		fieldset
		{
			margin: auto;
			margin-top: 100px
			widthL 50%;
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
	<legend>Add Menu</legend>

	<form action="php_action/create.php" enctype="multipart/form-data" method="post">
		<table cellspacing="0" cellpadding="0">
			<tr>
				<th>Food Name</th>
				<td><input type="text" name="food_name" placeholder="Food Name" /></td>
			</tr>
			<tr>
				<th>Price</th>
				<td><input type"text" name="price" placeholder="Price" /></td>
			</tr>
			<tr>
				<th>Portion Size</th>
				<td><input type"text" name="portion_size" placeholder="Portion Size" /></td>
			</tr>
			<tr>
				<th>Description</th>
				<td><input type="textbox" name="menu_description" placeholder="Description" /></td>
			</tr>
      <tr>
  			<th>Upload 1</th>
  			<td>
  				<input type="file" name="image1">
  			</td>
  	  </tr>
      <tr>
  			<th>Upload 2</th>
  			<td>
  				<input type="file" name="image2">
  			</td>
  	  </tr>
			<tr>
				<input type="hidden" name="restaurant_id" value=<?php echo "$restaurant_id";?> />
				<td><button type="submit">Create</button></td>
				<td><a href="index.php"><button type="button">Back</button></a></td>
			</tr>
		</table>
	</form>

</fieldset>

</body>
</html>
 <?php }?>