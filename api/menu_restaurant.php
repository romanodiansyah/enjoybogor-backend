<?php

include '../connect/db_connect.php';

    $restaurant_id=$_GET["id"];
    $ql= "SELECT * FROM restaurants WHERE restaurant_id='$restaurant_id' AND active=2";
    $queri = $connect->query($ql);
    $hasil = $queri->fetch_assoc();
    $sql= "SELECT * FROM menus WHERE restaurant_id='$restaurant_id' AND active=2";
    $result = $connect->query($sql);
    $sqli= "SELECT * FROM ratings_and_comments WHERE restaurant_id='$restaurant_id'";
    $resulti = $connect->query($sqli);

    $data = array();
            if ($result->num_rows >0) {
                while ($row = $result->fetch_assoc()) {
                    $status =1;
                    $data[]=array("menu_id"=>$row['menu_id'], "food_name"=>$row['food_name'],"price"=> $row['price'], "portion_size"=>$row['portion_size'], "menu_description"=>$row['menu_description']);
                }
            }

  echo json_encode($data);
