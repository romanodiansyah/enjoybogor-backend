<?php

require_once '../../../connect/db_connect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
		
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
	<legend>Search</legend>
	
	<form action="php_action/search.php" method="post">
		<table cellspacing="0" cellpadding="0">
			<tr>
				<th>Search Restaurant</th>
				<td><input type="text" name="search" placeholder="Search" /></td>
			</tr>
			<tr>
				<td><button type="submit">Search</button></td>
				<td><a href="index.php"><button type="button">Back</button></a></td>
			</tr>
		</table>
	</form>
	
</fieldset>

</body>
</html>

