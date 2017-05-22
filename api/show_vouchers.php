<?php
//todo: give filter, where;
include '../connect/db_connect.php';

$sql = "SELECT * FROM vouchers WHERE active = 1";
$result = $connect->query($sql);
$limit = $_GET['limit'];

$data = array();



if ($result->num_rows >0) {
    while ($row = $result->fetch_assoc()) {
        $data[]=array("name"=>$row['voucher_name'], "points_needed" =>$row['points_needed'], "voucher_type"=> $row['voucher_type'], "quantity"=>  $row['quantity'],"voucher_id"=> $row['voucher_id'],"image"=>$row['image']);
    }
    echo json_encode($data);
} else {
    echo "no data";
}
