<?php
include '../connect/db_connect.php';

$sql = "SELECT restaurant_id,restaurant_name,image from restaurants  where not image='NULL.jpg' and active=2 order by date_made DESC";
$result = $connect->query($sql);

$data = array();

if($result->num_rows >2)
{
  $counter = 3;
  while($counter)
  {
    $row = $result->fetch_assoc();
    $data[]=array("image"=>$row['image'] , "restaurant_id"=> $row['restaurant_id']);

    $counter = $counter - 1;
  }
}
else if($result->num_rows >1)
{
  $counter = 2;
  while($counter)
  {

    $row = $result->fetch_assoc();
    $data[]=array("image"=>$row['image'] , "restaurant_id"=> $row['restaurant_id']);
    $counter = $counter - 1;
  }
}
else if($result->num_rows >0)
{
  $counter = 1;
  while($counter)
  {
    $row = $result->fetch_assoc();
    $data[]=array("image"=>$row['image'] , "restaurant_id"=> $row['restaurant_id']);
    $counter = $counter - 1;
  }
}
echo json_encode($data);
