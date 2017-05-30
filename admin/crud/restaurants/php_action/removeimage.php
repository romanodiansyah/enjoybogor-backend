<?php

require_once '../../../../connect/db_connect.php';

	$image_id = $_GET['image_id'];
	$sql = "UPDATE restaurant_image SET active=0 WHERE image_id={$image_id}";
	$connect->query($sql);
	if($connect->query($sql) === TRUE)
	{
		echo "<p>Deleted !</p>";
		echo "<a href='../index.php'><button type='button'>Restaurant</button></a>";
		echo "<a href='../../../home.php'><button type='button'>Home</button></a>";
	}
	else
	{
		echo "Approve Failed : " . $connect->error;
	}
	$connect->close();
?>
