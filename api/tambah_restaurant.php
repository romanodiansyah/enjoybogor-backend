<?php
include '../connect/db_connect.php';

$json_input_data=json_decode(file_get_contents('php://input'), true);


    $restaurant_name =$json_input_data['restaurant_name'];
    $restaurant_address = $json_input_data['restaurant_address'];
    $restaurant_category = $json_input_data['restaurant_category'];
    $restaurant_contact =  intval($json_input_data['restaurant_contact']);
    $restaurant_description = $json_input_data['restaurant_description'];
    $image = $json_input_data['image'];
    //di insert tambahin image
    $sql = "INSERT INTO restaurants (restaurant_id,restaurant_name,restaurant_address,restaurant_category,restaurant_contact,restaurant_description,active,image) VALUES ('','$restaurant_name','$restaurant_address','$restaurant_category', '$restaurant_contact', '$restaurant_description',1,'$image')";
    if ($connect->query($sql) === true) {
        echo json_encode(array('message' => 'sukses'));
    } else {
        // echo json_encode(array('message' => 'gagal'));
        // echo "Error " . $sql . ' ' . $connect->connect_error;
        echo json_encode(array('message' => 'error'));
    }

    $connect->close();
