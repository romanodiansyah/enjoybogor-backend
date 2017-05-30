<?php

require_once '../../../../connect/db_connect.php';

if($_POST)
{
	$voucher_id = $_POST['voucher_id'];
	
	$sql = "UPDATE vouchers SET active = 0 WHERE voucher_id = {$voucher_id}";
	if($connect->query($sql) === TRUE)
	{
		echo "<p>Successfully Deleted!</p>";
		echo "<a href='../index.php'><button type='button'>Back</button></a>";
		echo "<a href='../../../home.php'><button type='button'>Home</button></a>";
	}
	else
	{
		echo "Delete Failed : " . $connect->error;
	}
	
	$connect->close();
}
?>