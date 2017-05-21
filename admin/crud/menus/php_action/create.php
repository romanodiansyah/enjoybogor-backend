<?php

require_once '../../../../connect/db_connect.php';

if($_POST)
{
	$food_name = $_POST['food_name'];
	$price = $_POST['price'];
	$portion_size = $_POST['portion_size'];
	$menu_description = $_POST['menu_description'];
		
	$sql = "INSERT INTO menus (menu_id,restaurant_id,food_name,price,portion_size,menu_description,active) VALUES ('',2,'$food_name','$price','$portion_size', '$menu_description',2)";
	if($connect->query($sql) === TRUE)
	{
		echo "<p> New Menu Successfully Created</p>";
		echo "<a href='../create.php'><button type='button'>Back</button></a>";
		echo "<a href='../index.php'><button type='button'>Menu</button></a>";
		echo "<a href='../../../home.php'><button type='button'>Home</button></a>";
	}
	else
	{
		echo "Error " . $sql . ' ' . $connect->connect_error;
	}
	
	$connect->close();
}

?>