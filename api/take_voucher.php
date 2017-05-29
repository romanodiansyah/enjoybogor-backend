<?php
include '../connect/db_connect.php';

$json_input_data=json_decode(file_get_contents('php://input'), true);

$voucher_id = $json_input_data['voucher_id'];
$points = $json_input_data['points'];
$user_id = $json_input_data['user_id'];



	$perintah = "select * from assoc WHERE user_id = '$user_id' AND voucher_id = '$voucher_id' ";
	$hasil = mysqli_query($connect,$perintah);
	$row = mysqli_fetch_array($hasil,MYSQLI_BOTH);
	if (!empty($row)) {
		echo '{"status":"fail","message":"voucher has been taken"}' ;
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
					echo '{"status":"success","message":"Succsessfully take voucher"}';
				}
				else
				{
					echo '{"status":"fail","message":"error at sql"}';
				}
				$sql = "UPDATE users SET points='$points' WHERE user_id={$user_id}";
				if($connect->query($sql) === TRUE)
				{
					//echo "<a href='myvoucher.php'><button type='button'>My voucher</button></a>";
				}
				else
				{
					echo '{"status":"fail","message":"error at sql"}';
				}
			}
			else
			{
				echo '{"status":"fail","message":"error at sql"}';
			}
		}
		else
		{
			echo '{"status":"fail","message":"Your points is not enough"}';
		}
	}


  ?>
