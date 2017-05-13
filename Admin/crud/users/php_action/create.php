<?php

require_once '../../../../connect/db_connect.php';

if($_POST)
{
	$user_name = $_POST['user_name'];
	$username = $_POST['username'];
	$user_contact = $_POST['user_contact'];
	$email = $_POST['email'];
	$hashpassword = $_POST['password'];
	
	$password = hash('sha256', $hashpassword);
	$check = mysqli_query($connect,"SELECT * FROM users WHERE username='".$username."'");
	if(mysqli_num_rows($check) > 0)
	{
		echo "Username already taken! Please choose another username.";
		echo "<a href='../create.php'><button type='button'>Back</button></a>";
	}
	else
	{
		$sql = "INSERT INTO users (user_id,username,user_name,date_signup,points,user_contact,email,password,active) VALUES ('','$username','$user_name',NOW(),0, '$user_contact', '$email', '$password',1)";
	if($connect->query($sql) === TRUE)
	{
		echo "<p> New User Successfully Created</p>";
		echo "<a href='../create.php'><button type='button'>Back</button></a>";
		echo "<a href='../index.php'><button type='button'>User</button></a>";
		echo "<a href='../../../home.php'><button type='button'>Home</button></a>";
	}
	else
	{
		echo "Error " . $sql . ' ' . $connect->connect_error;
	}
	}
	
	$connect->close();
}

?>