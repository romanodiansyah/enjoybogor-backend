<?php

require_once '../../../../connect/db_connect.php';

if ($_POST) {
    $restaurant_name = $_POST['restaurant_name'];
    $restaurant_address = $_POST['restaurant_address'];
    $restaurant_category = $_POST['restaurant_category'];
    $restaurant_contact = $_POST['restaurant_contact'];
    $restaurant_description = $_POST['restaurant_description'];

    $sql = "INSERT INTO restaurants (restaurant_id,restaurant_name,restaurant_address,restaurant_category,restaurant_contact,restaurant_description,active) VALUES ('','$restaurant_name','$restaurant_address','$restaurant_category', '$restaurant_contact', '$restaurant_description',1)";

    if ($connect->query($sql) === true) {
        echo $sql;
        echo "<p> New Restaurant Successfully Created, please wait for the approve</p>";
        echo "<a href='../create.php'><button type='button'>Back</button></a>";
        echo "<a href='../index.php'><button type='button'>Restaurant</button></a>";
        echo "<a href='../../../home.php'><button type='button'>Home</button></a>";
    } else {
        echo "Error " . $sql . ' ' . $connect->connect_error;
    }

    $connect->close();
}
