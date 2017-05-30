<?php
include '../connect/db_connect.php';

$json_input_data=json_decode(file_get_contents('php://input'), true);
$user_id = $json_input_data['id'];
$sql = "SELECT * FROM vouchers V JOIN assoc A WHERE V.voucher_id = A.voucher_id AND A.active = 1 AND A.user_id = {$user_id} ";
$result = $connect->query($sql);
$data = array();

if($result->num_rows >0){
  while($row = $result->fetch_assoc()){
    $data[]=array("voucher_name"=>$row['voucher_name'], "voucher_id"=> $row['voucher_id'],"image"=>$row['image']);
  }
  echo json_encode($data);
}
  else
  {
    echo '{"status":"nodata"}';
  }
?>
