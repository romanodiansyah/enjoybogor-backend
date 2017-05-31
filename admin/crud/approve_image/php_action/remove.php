<?php

require_once '../../../../connect/db_connect.php';

if($_POST)
{
	$image_id = $_POST['image_id'];

	$sql = "UPDATE restaurants_images SET active = 0 WHERE image_id = {$image_id}";
	if($connect->query($sql) === TRUE)
	{
		echo "<p>Successfully Deleted!</p>";
		echo "<a href='../index.php'><button type='button'>Approve Image</button></a>";
		echo "<a href='../../../home.php'><button type='button'>Home</button></a>";
	}
	else
	{
		echo "Delete Failed : " . $connect->error;
	}

	$connect->close();
}
?>
