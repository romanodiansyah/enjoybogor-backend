<?php
include '../connect/db_connect.php';
$data = array();

   $restaurant_id=$_GET['restaurant_id'];

   $sql= "SELECT * FROM restaurants_images WHERE restaurant_id='$restaurant_id' AND active=2";
   $result = $connect->query($sql);
   if($result->num_rows>0)
   {
     while($row = $result->fetch_assoc())
     {
       $data[]=array("image"=>$row['image']);
      //  echo $row['image'];
     }
     echo json_encode($data);
   }
   else
   {
     echo '{"status":"nodata"}';

   }
?>
