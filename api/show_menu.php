<?php

include '../connect/db_connect.php';

$json_input_data=json_decode(file_get_contents('php://input'), true);
$restaurant_id=$json_input_data['restaurant_id'];
$sql= "SELECT * FROM menus WHERE restaurant_id='$restaurant_id' AND active=2";
$result = $connect->query($sql);
$data = array();

if($result->num_rows >0)
{
  while($row = $result->fetch_assoc())
  {

    $data[]=array("food_name"=>$row['food_name'], "price"=> $row['price'],"portion_size"=>$row['portion_size'],"menu_id"=>$row['menu_id'],"menu_description"=>$row['menu_description'],"image1"=>$row['image1'],"image2"=>$row['image2']);
  }
  echo json_encode($data);
}
else
{
  echo '{"status":"nodata"}';
}



 ?>
