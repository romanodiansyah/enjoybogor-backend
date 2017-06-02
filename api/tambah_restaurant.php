<?php
include '../connect/db_connect.php';

if($_POST['todo']=="encode"){
  header("Access-Control-Allow-Origin: *");
  $fi = $_FILES['file'];
  echo file_get_contents($fi);
  echo base64_encode("dfdfdf");
  echo "blabla";
}else{
$json_input_data=json_decode(file_get_contents('php://input'), true);


    $restaurant_name =$json_input_data['restaurant_name'];
    $restaurant_address = $json_input_data['restaurant_address'];
    $restaurant_category = $json_input_data['restaurant_category'];
    $restaurant_contact =  intval($json_input_data['restaurant_contact']);
    $restaurant_description = $json_input_data['restaurant_description'];
    $latitude = $json_input_data['latitude'];
    $longitude = $json_input_data['longitude'];
    $user_id = $json_input_data['user_id'];
    $images = $json_input_data['images'];
    //dapetin id yg terakhir
    $count = mysqli_query($connect, "SELECT restaurant_id FROM restaurants ORDER BY restaurant_id DESC");
    $count = mysqli_fetch_assoc($count);
    $count = $count['restaurant_id']+1;


        $file_name =   $images['name'];
      	$tmp_file =   $images['tmp_name'];
        $file_name = $count.'_'.$file_name; // ganti nama

        $path = "../../../../restaurant_image/".$file_name;


      			if(move_uploaded_file($tmp_file, $path))
      			{
      				$sql = "INSERT INTO restaurants (restaurant_id,restaurant_name,restaurant_address,restaurant_category,restaurant_contact,restaurant_description,active,user_id,image,date_made) VALUES ('','$restaurant_name','$restaurant_address','$restaurant_category', '$restaurant_contact', '$restaurant_description',1,'$user_id','$file_name',NOW())";
              if ($connect->query($sql) === true) {

                  echo '{"status":"sukses"}';
              } else {
                echo '{"message":"Database Error"}';
              }
              $connect->close();
      			}
      			else
      			{
      				// Jika gambar gagal diupload, Lakukan :
      				echo '{"message":"Adding restaurant failed"}';
      			}
    }
