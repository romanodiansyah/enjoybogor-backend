<?php
	require_once '../../../../connect/db_connect.php';
	
	if($_POST)
	{
		$hashpassword = $_POST['password'];
		$password = hash('sha256',$hashpassword);
		
		$user_id = $_POST['user_id'];
		
		$sql = "UPDATE users SET password='$password' WHERE user_id={$user_id}";
		if($connect->query($sql) === TRUE)
		{
			echo "<p>Succsessfully Updated!</p>";
			echo "<a href='../index.php'><button type='button'>Back</button></a>";
			echo "<a href='../../../../home.php'><button type='button'>Home</button></a>";
		}
		else
		{
			echo "Update Failed : ". $connect->error;
		}
		$connect->close();
	}
?>