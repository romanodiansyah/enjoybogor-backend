<?php

$localhost = "192.168.33.10";
$username = "root";
$password = "root";
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
