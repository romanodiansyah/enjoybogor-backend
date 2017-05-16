<?php

require_once '../../../../connect/db_connect.php';

if($_POST)
{
	$menu_id = $_POST['menu_id'];
	
	$sql = "UPDATE menus SET active = 2 WHERE menu_id = {$menu_id}";
	if($connect->query($sql) === TRUE)
	{
		echo "<p>Approved!</p>";
		echo "<a href='../index.php'><button type='button'>Restaurant</button></a>";
		echo "<a href='../../../home.php'><button type='button'>Home</button></a>";
	}
	else
	{
		echo "Approve Failed : " . $connect->error;
	}
	
	$connect->close();
}
?>