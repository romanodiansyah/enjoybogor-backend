<?php

require_once '../../../connect/db_connect.php';

if($_GET['user_id'])
{
	$user_id = $_GET['user_id'];
	
	$sql = "SELECT * FROM users WHERE user_id = {$user_id}";
	$result = $connect->query($sql);
	
	$data = $result->fetch_assoc();
	
	$connect->close();
?>

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
</head>
<body>

<fieldset>
	<legend>Edit User</legend>
	
	<form action="php_action/update.php" method="post">
		<table cellspacing="0" cellpadding="0">
			<tr>
				<th>Name</th>
				<td><input type="text" name="user_name" placeholder="Name" value="<?php echo $data['user_name'] ?>" /></td>
			</tr>
			<tr>
				<th>Username</th>
				<td><input type="text" name="username" placeholder="Username" value="<?php echo $data['username'] ?>" /></td>
			</tr>
			<tr>
				<th>Contact</th>
				<td><input type="text" name="user_contact" placeholder="Contact" value="<?php echo $data['user_contact'] ?>" /></td>
			</tr>
			<tr>
				<th>E-mail</th>
				<td><input type="email" name="email" placeholder="E-mail" value="<?php echo $data['email']?>" /></td>
			</tr>
			<tr>
				<th>Password</th>
				<td><input type="password" name="password" placeholder="Password" value="<?php echo $data['password']?>"/></td>
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
?>
