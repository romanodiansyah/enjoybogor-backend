<?php
	require_once '../../../../connect/db_connect.php';
	
	if($_POST)
	{
		$restaurant_name = $_POST['restaurant_name'];
		$restaurant_address = $_POST['restaurant_address'];
		$restaurant_category = $_POST['restaurant_category'];
		$restaurant_contact = $_POST['restaurant_contact'];
		$restaurant_description = $_POST['restaurant_description'];
		
		$restaurant_id = $_POST['restaurant_id'];
		
		$sql = "UPDATE restaurants SET restaurant_name='$restaurant_name',restaurant_address='$restaurant_address',restaurant_category='$restaurant_category',restaurant_contact='$restaurant_contact',restaurant_description='$restaurant_description' WHERE restaurant_id={$restaurant_id}";
		if($connect->query($sql) === TRUE)
		{
			echo "<p>Succsessfully Updated!</p>";
			echo "<a href='../edit.php?restaurant_id=".$restaurant_id."'><button type='button'>Back</button></a>";
			echo "<a href='../index.php'><button type='button'>Restaurant</button></a>";
			echo "<a href='../../../home.php'><button type='button'>Home</button></a>";
		}
		else
		{
			echo "Update Failed : ". $connect->error;
		}
		$connect->close();
	}
?>