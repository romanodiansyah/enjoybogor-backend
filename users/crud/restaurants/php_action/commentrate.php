<?php

require_once '../../../../connect/db_connect.php';

session_start();
$user_id = $_SESSION['user_id'];

	$restaurant_id = $_POST['restaurant_id'];
	$comment = $_POST['comment'];
	$rate = $_POST['rating'];
	$perintah = "select * from ratings_and_comments WHERE user_id = '$user_id' AND restaurant_id = '$restaurant_id' ";
	$hasil = $connect->query($perintah);
	if ($hasil->num_rows > 0) {
		echo "anda sudah memberi komentar !</br>" ;
		// header("location:../home.php");  jika berhasil login, maka masuk ke file home.php
	}
	else {
		$datt = "select * from restaurants WHERE restaurant_id = '$restaurant_id'";
		$hasil = mysqli_query($connect,$datt);
		$row2 = mysqli_fetch_array($hasil,MYSQLI_BOTH);
		$sql = "INSERT INTO ratings_and_comments (user_id,restaurant_id,comment,rating) VALUES ($user_id,$restaurant_id,'$comment',$rate)";
		if($connect->query($sqll) === TRUE)
		{
			echo "berhasil  " ;
		}
		if($connect->query($sql) === TRUE)
		{
			echo "<p> Succsessfull ! </p>";
			echo "<a href='../restaurant/index.php?restaurant_id=$restaurant_id'><button type='button'>Back</button></a>";
		}
		else
		{
			echo "Error " . $sql . ' ' . $connect->connect_error;
		}	
	}
?>