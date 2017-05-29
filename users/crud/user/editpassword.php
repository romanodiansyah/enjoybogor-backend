<?php
 session_start();
 if (empty($_SESSION['user_id'])) {
	header("location:../commonfunction/login/login.php"); // jika belum login, maka dikembalikan ke file form_login.php
 }
 else {
 ?>
<?php

require_once '../../../connect/db_connect.php';

if ($_SESSION['user_id']) {
    $user_id = $_SESSION['user_id'];

    $sql = "SELECT user_id FROM users WHERE user_id = {$user_id}";
    $result = $connect->query($sql);

    $data = $result->fetch_assoc();

    $connect->close(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit User</title>

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
	<legend>Edit User</legend>

	<form action="php_action/updatepassword.php" method="post">
		<table cellspacing="0" cellpadding="0">
			<tr>
				<th>Password</th>
				<td><input type="password" name="password" placeholder="Password"/></td>
			</tr>
			<tr>
				<input type="hidden" name="user_id" value="<?php echo $data['user_id']?>" />
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
