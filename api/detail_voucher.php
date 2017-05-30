<?php

include '../connect/db_connect.php';
// $json_input_data=json_decode(file_get_contents('php://input'), true);

    $voucher_id=$_GET["id"];
    $ql= "SELECT * FROM vouchers WHERE voucher_id='$voucher_id' AND active=1";
    $queri = $connect->query($ql);
    $hasil = $queri->fetch_assoc();

  $voucher_name = $hasil["voucher_name"];
  $points_needed= $hasil["points_needed"];
  $voucher_type=$hasil["voucher_type"];
  $quantity=$hasil["quantity"];
  $rvoucher_id=$hasil["voucher_id"];
  $image=$hasil["image"];
  $status =0;

$back= array();
  $back[] = array("voucher_name"=>$voucher_name, "points_needed"=>$points_needed, "voucher_type"=>$voucher_type,"quantity"=>$quantity ,"voucher_id"=>$voucher_id ,"image"=>$image );
  echo json_encode($back);
