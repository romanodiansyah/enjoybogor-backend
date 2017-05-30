<?php

include '../connect/db_connect.php';
//check password & update password


$json_input_data=json_decode(file_get_contents('php://input'), true);
$username=strtoupper($json_input_data['username']);
$password=hash('sha256', $json_input_data['password']);
$control=$json_input_data['control'];
$user_id = $json_input_data['user_id'];

if ($control=='check') {
    //echo " in here ";
    $perintah = "select user_name from users WHERE username = '$username' AND password = '$password' AND active='1' ";
    $hasil = mysqli_query($connect, $perintah);

        //create an array
        while ($row =mysqli_fetch_assoc($hasil)) {
            $nama = $row['user_name'];
        }
    if ($nama==null) {
        echo '{"status":"fail"}';
        return;
    }
    echo '{"status" : "success"}';
}
if($control=='update'){
  $sql = "UPDATE users SET password='$password' WHERE user_id={$user_id}";
  if($connect->query($sql) === TRUE){
    echo '{"status":"success"}';
  }
  $connect->close();
}

  mysqli_close($connect);
