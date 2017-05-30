<?php
 session_start();
 if (empty($_SESSION['user_id'])) {
	header("location:../commonfunction/login/login.php"); // jika belum login, maka dikembalikan ke file form_login.php
 }
 else {
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Voucher</title>

	<style type="text/css">
		fieldset
		{
			margin: auto;
			margin-top: 100px
			widthL 100%;
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
	<legend>Add Voucher</legend>

	<form action="php_action/create.php" enctype="multipart/form-data" method="post">
		<table cellspacing="0" cellpadding="0">
			<tr>
				<th>Voucher Name</th>
				<td><input type="text" name="voucher_name" placeholder="Voucher Name"/></td>
			</tr>
			<tr>
				<th>Points</th>
				<td><input type="number" name="points_needed" placeholder="Points"/></td>
			</tr>
			<tr>
				<th>Type</th>
				<td><input type="text" name="voucher_type" placeholder="Type"/></td>
			</tr>
			<tr>
				<th>Quantity</th>
				<td><input type="number" name="quantity" placeholder="Quantity"/></td>
			</tr>
			<tr>
			<th>Upload</th>
			<td>
				<input type="file" name="images">
			</td>
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

 <?php } ?>