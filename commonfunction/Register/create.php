<!DOCTYPE html>
<html>
<head>
	<title>Add Member</title>
	
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
	
</head>
<body>

<fieldset>
	<legend>Add Member</legend>
	
	<form action="php_action/create.php" method="post">
		<table cellspacing="0" cellpadding="0">
			<tr>
				<th>Name</th>
				<td><input type="text" name="user_name" placeholder="Name" /></td>
			</tr>
			<tr>
				<th>Username</th>
				<td><input type="text" name="username" placeholder="Username" /></td>
			</tr>
			<tr>
				<th>Contact</th>
				<td><input type="text" name="user_contact" placeholder="Contact" /></td>
			</tr>
			<tr>
				<th>E-mail</th>
				<td><input type="email" name="email" placeholder="E-mail" /></td>
			</tr>
			<tr>
				<th>Password</th>
				<td><input type="password" name="password" placeholder="Password" /></td>
			</tr>
			<tr>
				<td><button type="submit">Create</button></td>
				<td><a href="../login/login.php"><button type="button">Back</button></a></td>
			</tr>
		</table>
	</form>
	
</fieldset>

</body>
</html>