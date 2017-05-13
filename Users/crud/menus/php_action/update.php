<?php
	require_once '../../../../connect/db_connect.php';
	
	if($_POST)
	{
		$food_name = $_POST['food_name'];
		$price = $_POST['price'];
		$portion_size = $_POST['portion_size'];
		$menu_description = $_POST['menu_description'];
				
		$menu_id = $_POST['menu_id'];
		
		$sql = "UPDATE menus SET food_name='$food_name',price='$price',portion_size='$portion_size',menu_description='$menu_description' WHERE menu_id={$menu_id}";
		if($connect->query($sql) === TRUE)
		{
			echo "<p>Succsessfully Updated!</p>";
			echo "<a href='../edit.php?menu_id=".$menu_id."'><button type='button'>Back</button></a>";
			echo "<a href='../index.php'><button type='button'>Menu</button></a>";
			echo "<a href='../../../home.php'><button type='button'>Home</button></a>";
		}
		else
		{
			echo "Update Failed : ". $connect->error;
		}
		$connect->close();
	}
?>