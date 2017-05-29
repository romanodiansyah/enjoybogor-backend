<?php

include '../connect/db_connect.php';
// $json_input_data=json_decode(file_get_contents('php://input'), true);

    $restaurant_id=$_GET["id"];
    $ql= "SELECT * FROM restaurants WHERE restaurant_id='$restaurant_id' AND active=2";
    $queri = $connect->query($ql);
    $hasil = $queri->fetch_assoc();
    $sql= "SELECT * FROM menus WHERE restaurant_id='$restaurant_id' AND active=2";
    $result = $connect->query($sql);
    $sqli= "SELECT * FROM ratings_and_comments WHERE restaurant_id='$restaurant_id'";
    $resulti = $connect->query($sqli);

  $restaurant_name = $hasil["restaurant_name"];
  $restaurant_description= $hasil["restaurant_description"];
  $restaurant_contact=$hasil["restaurant_contact"];
  $restaurant_address=$hasil["restaurant_address"];
  $restaurant_category=$hasil["restaurant_category"];
  $image=$hail['image'];
  $status =0;

$back= array();
  $back[] = array("restaurant_name"=>$restaurant_name, "restaurant_description"=>$restaurant_description, "restaurant_contact"=>$restaurant_contact,"restaurant_address"=>$restaurant_address ,"restaurant_category"=>$restaurant_category,"image" =>$image );
  echo json_encode($back);
