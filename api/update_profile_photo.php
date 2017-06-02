<?php

//include "db_connect.php";
include '../connect/db_connect.php';
$user_id =intval( $_POST['user_id']);

// Ambil Data yang Dikirim dari Form
$file_name = $_FILES['file']['name'];
$file_size = $_FILES['file']['size'];
$file_type = $_FILES['file']['type'];
$tmp_file = $_FILES['file']['tmp_name'];
    $file_name = $user_id.'_'.$file_name; // ganti nama

// Set path folder tempat menyimpan gambarnya
$path = "../users/crud/user/images/".$file_name;



    if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
      // Jika gambar berhasil diupload, Lakukan :
      // Proses simpan ke Database
      $query = "UPDATE users SET image='$file_name' WHERE user_id=$user_id";
      $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query

      if($sql=== TRUE){ // Cek jika proses simpan ke database sukses atau tidak
        // Jika Sukses, Lakukan :
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
