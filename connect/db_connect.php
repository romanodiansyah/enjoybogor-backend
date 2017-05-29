<?php

$localhost = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "enjoybogor_data";

	// buat koneksi
	$connect = new mysqli($localhost,$username,$password,$dbname);
	
	// cek koneksi
	if($connect->connect_error)
	{
		die("connection failed : " . $connect->connect_error);
	}
	else
	{
		// echo "Sucsessfully Connected";
	}
	
?>
