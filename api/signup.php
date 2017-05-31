<?php

include '../connect/db_connect.php';

$json_input_data=json_decode(file_get_contents('php://input'), true);
$username=$json_input_data["username"];
$user_name=$json_input_data["user_name"];
$user_contact=$json_input_data["user_contact"];
$email=$json_input_data["email"];
$plain_password= $json_input_data["password"];
$password=hash('sha256', $plain_password);

if ($username=='' || $plain_password=='') {
    echo '{"status":"error"}';
}

$check = mysqli_query($connect, "SELECT * FROM users WHERE username='".$username."'");
if (mysqli_num_rows($check) > 0) {
    echo '{"status":"multiple"}';
} else {
    $sql = "INSERT INTO users (user_id,username,user_name,date_signup,points,user_contact,email,password,active,image) VALUES ('','$username','$user_name',NOW(),0, '$user_contact', '$email', '$password',1,'NULL.jpg')";
    if ($connect->query($sql) === true) {
        echo '{"status":"berhasil"}';
    } else {
        echo "Error " . $sql . ' ' . $connect->connect_error;
    }
}

$connect->close();
