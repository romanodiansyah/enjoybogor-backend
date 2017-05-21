<?php

require_once '../../../../connect/db_connect.php';

if($_POST)
{
	$voucher_name = $_POST['voucher_name'];
	$points_needed = $_POST['points_needed'];
	$voucher_type = $_POST['voucher_type'];
	$quantity = $_POST['quantity'];
	
	$sql = "INSERT INTO vouchers (voucher_id,voucher_name,points_needed,voucher_type,active,quantity) VALUES ('','$voucher_name','$points_needed','$voucher_type',1,$quantity)";
	if($connect->query($sql) === TRUE)
	{
		echo "<p> New Voucher Successfully Created</p>";
		echo "<a href='../create.php'><button type='button'>Back</button></a>";
		echo "<a href='../../../home.php'><button type='button'>Home</button></a>";
	}
	else
	{
		echo "Error " . $sql . ' ' . $connect->connect_error;
	}
	
	$connect->close();
}

?>