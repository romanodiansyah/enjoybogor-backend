<?php

require_once '../../../../connect/db_connect.php';

if($_POST)
{
	$menu_id = $_POST['menu_id'];
	
	$sql = "UPDATE menus SET active = 0 WHERE menu_id = {$menu_id}";
	if($connect->query($sql) === TRUE)
	{
		echo "<p>Successfully Deleted!</p>";
		echo "<a href='../index.php'><button type='button'>Back</button></a>";
		echo "<a href='../index.php'><button type='button'>Menu</button></a>";
		echo "<a href='../../../home.php'><button type='button'>Home</button></a>";
	}
	else
	{
		echo "Delete Failed : " . $connect->error;
	}
	
	$connect->close();
}
?>