<?php

require_once '../../../../connect/db_connect.php';

//dapetin id yg terakhir
$count = mysqli_query($connect, "SELECT voucher_id FROM vouchers ORDER BY voucher_id DESC");
$count = mysqli_fetch_assoc($count);
$count = $count['voucher_id']+1;

if($_POST)
{
	$voucher_name = $_POST['voucher_name'];
	$points_needed = $_POST['points_needed'];
	$voucher_type = $_POST['voucher_type'];
	$quantity = $_POST['quantity'];

	// Ambil Data yang Dikirim dari Form
	$file_name = $_FILES['images']['name'];
	$file_size = $_FILES['images']['size'];
	$file_type = $_FILES['images']['type'];
	$tmp_file = $_FILES['images']['tmp_name'];
  $file_name = $count.'_'.$file_name; // ganti nama
	// Set path folder tempat menyimpan gambarnya
	$path = "../images/".$file_name;

	if($file_type == "image/jpeg" || $file_type == "image/png")
	{ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
	 // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
		if($file_size <= 1024000)
		{ 	// Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
			// Jika ukuran file kurang dari sama dengan 1MB, lakukan
			// Proses upload
			if(move_uploaded_file($tmp_file, $path))
			{ // Cek apakah gambar berhasil diupload atau tidak
				// Jika gambar berhasil diupload, Lakukan :
				// Proses simpan ke Database
				$sql = "INSERT INTO vouchers (voucher_id,voucher_name,points_needed,voucher_type,active,quantity,image) VALUES ('','$voucher_name','$points_needed','$voucher_type',1,'$quantity','$file_name')";
				if($connect->query($sql)=== TRUE)
				{ 		// Cek jika proses simpan ke database sukses atau tidak
						// Jika Sukses, Lakukan :
						echo "berhasil";
						header("location: ../index.php"); // Redirectke halaman index.php
				}
				else
				{
					// Jika Gagal, Lakukan :
					echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
					echo "<br><a href='../index.php'>Back</a>";
				}
			}
			else
			{
				// Jika gambar gagal diupload, Lakukan :
				echo "Maaf, Gambar gagal untuk diupload.";
				echo "<br><a href='../index.php'>Back</a>";
			}
		}
		else
		{
			// Jika ukuran file lebih dari 1MB, lakukan :
			echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
			echo "<br><a href='../index.php'>Back</a>";
		}
	}
	else
	{
		// Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
		echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
		echo "<br><a href='../index.php'>Back</a>";
	}
}
?>
