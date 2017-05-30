<?php

require_once '../../../../connect/db_connect.php';

if($_POST)
{
	$restaurant_id = $_POST['restaurant_id'];
	
	$sql = "UPDATE restaurants SET active = 0 WHERE restaurant_id = {$restaurant_id}";
	if($connect->query($sql) === TRUE)
	{
		echo "<p>Successfully Deleted!</p>";
		echo "<a href='../index.php'><button type='button'>Restaurant</button></a>";
		echo "<a href='../../../home.php'><button type='button'>Home</button></a>";
	}
	else
	{
		echo "Delete Failed : " . $connect->error;
	}
	
	$connect->close();
}
?>