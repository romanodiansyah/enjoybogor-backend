<?php
include '../connect/db_connect.php';

$json_input_data=json_decode(file_get_contents('php://input'), true);
$voucher_id = $json_input_data['voucher_id'];
$user_id = $json_input_data['user_id'];

	$perintah = "select * FROM assoc WHERE user_id = '$user_id' AND voucher_id = '$voucher_id' ";
	$hasil = mysqli_query($connect,$perintah);
	$row = mysqli_fetch_array($hasil,MYSQLI_BOTH);
	$sql = "UPDATE assoc SET active = 0 WHERE voucher_id={$voucher_id} AND user_id={$user_id}";
	if($connect->query($sql) === TRUE)
	{
		echo '{"status":"ok"}';
	}
	else
	{
    $var = array("status"=>$connect->error);
		echo json_encode($var);
    //echo '{"status":"fail"}';
	}

?>
