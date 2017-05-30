<?php
 session_start();
 if (empty($_SESSION['user_id'])) {
	header("location:../commonfunction/login/login.php"); // jika belum login, maka dikembalikan ke file form_login.php
 }
 else {
 ?>
<?php

require_once '../../../connect/db_connect.php';

if ($_GET['voucher_id']) {
    $voucher_id = $_GET['voucher_id'];

    $sql = "SELECT voucher_name,voucher_id,points_needed,voucher_type,quantity FROM vouchers WHERE voucher_id = {$voucher_id}";
    $result = $connect->query($sql);

    $data = $result->fetch_assoc();

    $connect->close(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Voucher</title>

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
	<legend>Edit Voucher</legend>

	<form action="php_action/update.php" method="post">
		<table cellspacing="0" cellpadding="0">
			<tr>
				<th>Voucher Name</th>
				<td><input type="text" name="voucher_name" placeholder="Voucher Name" value="<?php echo $data['voucher_name'] ?>" /></td>
			</tr>
			<tr>
				<th>Points</th>
				<td><input type="text" name="points_needed" placeholder="Points" value="<?php echo $data['points_needed'] ?>" /></td>
			</tr>
			<tr>
				<th>Type</th>
				<td><input type="text" name="voucher_type" placeholder="Type" value="<?php echo $data['voucher_type']?>" /></td>
			</tr>
			<tr>
				<th>Quantity</th>
				<td><input type="number" name="quantity" placeholder="Quantity" value="<?php echo $data['quantity']?>"/></td>
			</tr>
			<tr>
				<input type="hidden" name="voucher_id" value="<?php echo $data['voucher_id']?>" />
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
