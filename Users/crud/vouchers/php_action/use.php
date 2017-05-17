<?php

require_once '../../../../connect/db_connect.php';

session_start();
$user_id = $_SESSION['user_id'];

if($_GET['voucher_id'])
{
	$voucher_id = $_GET['voucher_id'];
	$perintah = "select * FROM assoc WHERE user_id = '$user_id' AND voucher_id = '$voucher_id' ";
	$hasil = mysqli_query($connect,$perintah);
	$row = mysqli_fetch_array($hasil,MYSQLI_BOTH);
	$sql = "UPDATE assoc SET active = 0 WHERE voucher_id={$voucher_id} AND user_id={$user_id}";
	if($connect->query($sql) === TRUE)
	{
		echo "<p>Terima kasih, selamat menikmati !!!</p>";
	}
	else
	{
		echo "Update Failed : ". $connect->error;
	}
}
?>