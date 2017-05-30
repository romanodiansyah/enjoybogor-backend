<?php
//todo: give filter, where;
include '../connect/db_connect.php';

$sql = "SELECT * FROM restaurants";
$result = $connect->query($sql);
$limit = $_GET['limit'];

$data = array();

$sql = "SELECT * FROM restaurants WHERE active = 2";
$result = $connect->query($sql);
$rataan = 0;


if ($result->num_rows >0) {
    while ($row = $result->fetch_assoc()) {
      $rest_id=$row['restaurant_id'];

      $beforecounterr = "SELECT COUNT(rating) as rating from ratings_and_comments WHERE restaurant_id='$rest_id'";
      $beforecounter = $connect->query($beforecounterr);
      $counter = $beforecounter->fetch_assoc();
      $beforesumm = "SELECT SUM(rating) as rating from ratings_and_comments WHERE restaurant_id='$rest_id'";
      $beforesum = $connect->query($beforesumm);
      $sum = $beforesum->fetch_assoc();
      $rataan=(string)($sum['rating']/$counter['rating']);
        $data[]=array("name"=>$row['restaurant_name'], "address" =>$row['restaurant_address'], "category"=> $row['restaurant_category'], "contact"=>  $row['restaurant_contact'],"description"=> $row['restaurant_description'],"image"=>$row['image'],"restaurant_rating"=>$rataan ,"restaurant_id"=>$row['restaurant_id']);

    }
    echo json_encode($data);
} else {
    echo '[{"name":"no data yet"}]';
}


//name , nama_user_input  , tanggal , description , total_baca  total_komentar
