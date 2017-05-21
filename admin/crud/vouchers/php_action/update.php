<?php
	require_once '../../../../connect/db_connect.php';
	
	if($_POST)
	{
		$voucer_name = $_POST['voucer_name'];
		$points_needed = $_POST['points_needed'];
		$voucher_type = $_POST['voucher_type'];
		$quantity = $_POST['quantity'];
		
		$voucher_id = $_POST['voucher_id'];
		
		$sql = "UPDATE vouchers SET voucher_name='$voucher_name',points_needed='$points_needed',voucher_type='$voucher_type',quantity='$quantity' WHERE vocuher_id={$voucher_id}";
		if($connect->query($sql) === TRUE)
		{
			echo "<p>Succsessfully Updated!</p>";
			echo "<a href='../edit.php?user_id=".$user_id."'><button type='button'>Back</button></a>";
			echo "<a href='../../../home.php'><button type='button'>Home</button></a>";
		}
		else
		{
			echo "Update Failed : ". $connect->error;
		}
		$connect->close();
	}
?>