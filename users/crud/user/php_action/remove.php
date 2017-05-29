<?php

require_once '../../../../connect/db_connect.php';

if($_POST)
{
	$user_id = $_POST['user_id'];
	
	$sql = "UPDATE users SET active = 0 WHERE user_id = {$user_id}";
	if($connect->query($sql) === TRUE)
	{
		echo "<p>Successfully Deleted!</p>";
		echo "<a href='../index.php'><button type='button'>Back</button></a>";
		echo "<a href='../index.php'><button type='button'>User</button></a>";
		echo "<a href='../../../home.php'><button type='button'>Home</button></a>";
	}
	else
	{
		echo "Delete Failed : " . $connect->error;
	}
	
	$connect->close();
}
?>