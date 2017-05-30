<?php

include '../connect/db_connect.php';

$json_input_data=json_decode(file_get_contents('php://input'), true);

  $user_id = $json_input_data['user_id'];
	$restaurant_id = $json_input_data['restaurant_id'];
	$comment = $json_input_data['comment'];
  $rate = $json_input_data['rating'];


	$perintah = "select * from ratings_and_comments WHERE user_id = '$user_id' AND restaurant_id = '$restaurant_id' ";
	$hasil = $connect->query($perintah);
	if ($hasil->num_rows > 0) {
		//echo "anda sudah memberi komentar !</br>" ;
    echo '{"status":"fail","message":"You have commented before"}';
		// header("location:../home.php");  jika berhasil login, maka masuk ke file home.php
	}
	else {
		$datt = "select * from restaurants WHERE restaurant_id = '$restaurant_id'";
		$hasil = mysqli_query($connect,$datt);
		$row2 = mysqli_fetch_array($hasil,MYSQLI_BOTH);
		$newcounter=$row2['counterrating']+1;
		$newsum=$row2['sumrating']+$rate;
		$sql = "INSERT INTO ratings_and_comments (user_id,restaurant_id,comment,rating) VALUES ($user_id,$restaurant_id,'$comment',$rate)";
		$sqll = "UPDATE restaurants SET counterrating='$newcounter',sumrating='$newsum' WHERE restaurant_id={$restaurant_id}";
		if($connect->query($sqll) === TRUE)
		{
			//echo '{"status":"success","message":"Your comment and rating has been sent"}';
		}
		if($connect->query($sql) === TRUE)
		{
			//echo "<p> Succsessfull ! </p>";
			//echo "<a href='../restaurant/index.php?restaurant_id=$restaurant_id'><button type='button'>Back</button></a>";
      echo '{"status":"success","message":"Your comment and rating has been sent"}';
		}
		else
		{
			echo '{"status":"fail","message":"Unexpected error happened"}';
		}
	}
?>
