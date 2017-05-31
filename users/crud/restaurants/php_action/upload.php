<?php

//include "db_connect.php";
require_once "../../../../connect/db_connect.php";
session_start();
$user_id = $_SESSION['user_id'];

//dapetin id yg terakhir
$count = mysqli_query($connect, "SELECT image_id FROM restaurants_images ORDER BY image_id DESC");
$count = mysqli_fetch_assoc($count);
$count = $count['image_id']+1;

if($_POST)
{
	$restaurant_id = $_POST['restaurant_id'];

    // ambil nilai dari restaurant_id

// Ambil Data yang Dikirim dari Form
$file_name = $_FILES['image']['name'];
$file_size = $_FILES['image']['size'];
$file_type = $_FILES['image']['type'];
$tmp_file = $_FILES['image']['tmp_name'];
$file_name = $count.'_'.$file_name; // ganti nama

// Set path folder tempat menyimpan gambarnya
$path = "../../../../restaurant_images/".$file_name;


if($file_type == "image/jpeg" || $file_type == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
  // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
  if($file_size <= 1024000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
    // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
    // Proses upload
    if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
      // Jika gambar berhasil diupload, Lakukan :
      // Proses simpan ke Database
      $sql = "INSERT INTO restaurants_images (image_id,restaurant_id,image,user_id,active) VALUES ('','$restaurant_id','$file_name','$user_id',1)";
      if ($connect->query($sql) === true){ // Cek jika proses simpan ke database sukses atau tidak
        // Jika Sukses, Lakukan :
        echo "berhasil" ;
        header("location: ../index.php"); // Redirectke halaman index.php
      }else{
        // Jika Gagal, Lakukan :
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br><a href='../index.php'>Kembali Ke Form</a>";
      }
    }else{
      // Jika gambar gagal diupload, Lakukan :
      echo "Maaf, Gambar gagal untuk diupload.";
      echo "<br><a href='../index.php'>Kembali Ke Form</a>";
    }
  }else{
    // Jika ukuran file lebih dari 1MB, lakukan :
    echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
    echo "<br><a href='../index.php'>Kembali Ke Form</a>";
  }
}else{
  // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
  echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
  echo "<br><a href='../index.php'>Kembali Ke Form</a>";
}}
?>
