<?php
include '../connect/db_connect.php';

$json_input_data=json_decode(file_get_contents('php://input'), true);

$username=strtoupper($json_input_data["username"]);
$user_name= $json_input_data['user_name'];
$user_contact= $json_input_data['user_contact'];
$email= $json_input_data['email'];
$user_id= $json_input_data['user_id'];

$sql = "UPDATE users SET username='$username',user_name='$user_name',user_contact='$user_contact',email='$email' WHERE user_id={$user_id}";

if($connect->query($sql) === TRUE)
{
  echo '{"status":"success"}';
}
else
{
  //echo "Update Failed : ". $connect->error;
  echo '{"status":"fail"}';
}
$connect->close();


 ?>
