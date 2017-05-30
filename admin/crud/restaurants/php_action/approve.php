<?php

require_once '../../../../connect/db_connect.php';



if($_POST)
{
	$restaurant_id = $_POST['restaurant_id'];
	$perintah = "select * FROM restaurants WHERE restaurant_id = '$restaurant_id'";
	$hasil = mysqli_query($connect,$perintah);
	$row = mysqli_fetch_array($hasil,MYSQLI_BOTH);
	$user_id = $row['user_id'];
	
	$perintah = "select * FROM users WHERE user_id = '$user_id'";
	$hasil = mysqli_query($connect,$perintah);
	$row = mysqli_fetch_array($hasil,MYSQLI_BOTH);
	$points=$row['points'];
	$sql = "UPDATE restaurants SET active = 2 WHERE restaurant_id = {$restaurant_id}";
	$tambah=100; // default set point + 100 dulu..
	$points=$points+$tambah; 
	$sqll = "UPDATE users SET points='$points' WHERE user_id={$user_id}";
	$connect->query($sqll);
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