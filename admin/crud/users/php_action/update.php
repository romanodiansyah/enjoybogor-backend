<?php
	require_once '../../../../connect/db_connect.php';
	
	if($_POST)
	{
		$user_name = $_POST['user_name'];
		$username = $_POST['username'];
		$user_contact = $_POST['user_contact'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		$user_id = $_POST['user_id'];
		
		$sql = "UPDATE users SET username='$username',user_name='$user_name',user_contact='$user_contact',email='$email',password='$password' WHERE user_id={$user_id}";
		if($connect->query($sql) === TRUE)
		{
			echo "<p>Succsessfully Updated!</p>";
			echo "<a href='../edit.php?user_id=".$user_id."'><button type='button'>Back</button></a>";
			echo "<a href='../index.php'><button type='button'>User</button></a>";
			echo "<a href='../../../home.html'><button type='button'>Home</button></a>";
		}
		else
		{
			echo "Update Failed : ". $connect->error;
		}
		$connect->close();
	}
?>