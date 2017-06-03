<?php

//include "db_connect.php";
include '../connect/db_connect.php';

$user_id = NULL;
$restaurant_id = intval($_POST['restaurant_id']);
//dapetin id yg terakhir
$count = mysqli_query($connect, "SELECT image_id FROM restaurants_images ORDER BY image_id DESC");
$count = mysqli_fetch_assoc($count);
$count = $count['image_id']+1;




    // ambil nilai dari restaurant_id

// Ambil Data yang Dikirim dari Form
$file_name = $_FILES['file']['name'];
$file_size = $_FILES['file']['size'];
$file_type = $_FILES['file']['type'];
$tmp_file = $_FILES['file']['tmp_name'];
$newname = substr($file_name,-7);
$file_name = $count.'_'.$newname; // ganti nama

// Set path folder tempat menyimpan gambarnya
$path = "../restaurant_image/".$file_name;



    if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
      // Jika gambar berhasil diupload, Lakukan :
      // Proses simpan ke Database
      $sql = "INSERT INTO restaurants_images (image_id,restaurant_id,image,active) VALUES ('','$restaurant_id','$file_name',1)";
      if ($connect->query($sql) === true){ // Cek jika proses simpan ke database sukses atau tidak
        echo '{"status":"success"}';
      }else{
        // Jika Gagal, Lakukan :
        echo '{"status":"fail"}';
      }
    }else{
      // Jika gambar gagal diupload, Lakukan :
      echo '{"status":"fail"}';
    }

?>
