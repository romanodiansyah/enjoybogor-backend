<?php

include '../connect/db_connect.php';



$json_input_data=json_decode(file_get_contents('php://input'), true);
$user_id=$json_input_data['user_id'];



    $perintah = "select * from users WHERE user_id = '$user_id' ";
    $hasil = mysqli_query($connect, $perintah);

        //create an array
        while ($row =mysqli_fetch_assoc($hasil)) {
            $id = $row['user_id'];
            $nama = $row['user_name'];
            $email = $row['email'];
            $contact= $row['user_contact'];
            $points = $row['points'];
            $username = $row['username'];
            $image = $row['image'];
        }
    if ($nama==null) {
        echo json_encode(array('status' => false, 'message' => 'username error'));
        return;
    }


    header('Content-type: application/json');
    echo json_encode(array('status' => true, 'name' => $nama, 'id' => $id, 'email'=>$email, 'username'=>$username,'contact'=>$contact , 'points'=> $points,'image'=>$image ));


  mysqli_close($connect);
