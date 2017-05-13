<?php
 // memanggil file koneksi.php
 require_once '../../../connect/db_connect.php';
 // membuat variable dengan nilai dari form
 $username = $_POST['username']; // variablenya = username, dan nilainya sesuai yang dimasukkan di input name="username" tadi
 $hashpassword = $_POST['password'];
 $password = hash('sha256',$hashpassword); // variable password, dan nilainya sesuai yang dimasukkan di input name="password" tadi
 // md5 ada sebuah fungsi PHP untuk engkripsi. misalnya admin jadi 21232f297a57a5a743894a0e4a801fc3. untuk lengkapnya, silahkan googling tentang md5

// proses untuk login

// menyesuaikan dengan data di database
 $perintah = "select * from users WHERE username = '$username' AND password = '$password'";
 $hasil = mysqli_query($connect,$perintah);
 $row = mysqli_fetch_array($hasil,MYSQLI_BOTH);
 if ($row['username'] == $username AND $row['password'] == $password) {
 session_start(); // memulai fungsi session
 $user_id = $row['user_id'];
 $_SESSION['user_id'] = $user_id;
 $_SESSION['username'] = $username;
 header("location:../home.php"); // jika berhasil login, maka masuk ke file home.php
 }
 else {
 echo "Gagal Masuk"; // jika gagal, maka muncul teks gagal masuk
 }
 ?>
 