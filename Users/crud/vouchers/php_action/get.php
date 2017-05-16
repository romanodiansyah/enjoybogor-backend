<?php

require_once '../../../connect/db_connect.php';

session_start();
$user_id = $_SESSION['user_id'];
$points  = $_SESSION['points'];

if($_GET['voucher_id'])
{
	$voucher_id = $_GET['voucher_id'];
	$perintah = "select * from assoc WHERE user_id = '$user_id' AND voucher_id = '$voucher_id' ";
	$hasil = mysqli_query($connect,$perintah);
	$row = mysqli_fetch_array($hasil,MYSQLI_BOTH);
	if (!empty($row)) {
		echo "anda sudah mengambil voucher ini ! ! ! !</br>" ;
		// header("location:../home.php");  jika berhasil login, maka masuk ke file home.php
	}
	else {
		$pointnya = "select * from vouchers WHERE voucher_id = '$voucher_id'";
		$hasil2 = mysqli_query($connect,$pointnya);
		$row2 = mysqli_fetch_array($hasil2,MYSQLI_BOTH);
		if($row2['points_needed']<=$points)
		{
			$sql = "INSERT INTO assoc (user_id,voucher_id,active) VALUES ('$user_id','$voucher_id',1)";
			if($connect->query($sql) === TRUE)
			{
				// kurangi point !
				$points=$points-$row2['points_needed'];
				$quantity=$row2['quantity']-1;
				$sql = "UPDATE vouchers SET quantity='$quantity' WHERE voucher_id={$voucher_id}";
				if($connect->query($sql) === TRUE)
				{
					echo "<p>Succsessfully Updated!</p>";
				}
				else
				{
					echo "Update Failed : ". $connect->error;
				}
				$sql = "UPDATE users SET points='$points' WHERE user_id={$user_id}";
				if($connect->query($sql) === TRUE)
				{
					echo "<a href='../../../../home.php'><button type='button'>Home</button></a>";
				}
				else
				{
					echo "Update Failed : ". $connect->error;
				}
			}
			else
			{
				echo "Error " . $sql . ' ' . $connect->connect_error;
			}
		}
		else
		{
			echo "point anda tidak mencukupi !";
		}
		
	}
}
?>