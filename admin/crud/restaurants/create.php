<!DOCTYPE html>
<html>
<head>
	<title>Add Restaurant</title>

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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<fieldset>
	<legend>Add Restaurant</legend>

	<form action="php_action/create.php" method="post">
		<table cellspacing="0" cellpadding="0">
			<tr>
				<th>Restaurant Name</th>
				<td><input type="text" name="restaurant_name" placeholder="Restaurant Name" /></td>
			</tr>
			<tr>
				<th>Address</th>
				<td><input type"text" name="restaurant_address" placeholder="Address" /></td>
			</tr>
			<tr>
				<th>Category</th>
				<td><input type"text" name="restaurant_category" placeholder="Category" /></td>
			</tr>
			<tr>
				<th>Contact</th>
				<td><input type"text" name="restaurant_contact" placeholder="Contact" /></td>
			</tr>
			<tr>
				<th>Description</th>
				<td><input type="textbox" name="restaurant_description" placeholder="Description" /></td>
			</tr>
			<tr>
				<td><button type="submit">Create</button></td>
				<td><a href="index.php"><button type="button">Back</button></a></td>
			</tr>
		</table>
	</form>

</fieldset>

</body>
</html>
