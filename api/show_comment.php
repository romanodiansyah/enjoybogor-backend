
<?php
include '../connect/db_connect.php';

  $json_input_data=json_decode(file_get_contents('php://input'), true);
  $restaurant_id=$json_input_data['restaurant_id'];

	$sqli= "SELECT * FROM ratings_and_comments WHERE restaurant_id='$restaurant_id'";
	$resulti = $connect->query($sqli);

$data = array();

		if($resulti->num_rows>0)
		{
			while($row = $resulti->fetch_assoc())
			{
				$pengguna = "SELECT * FROM users WHERE user_id=".$row['user_id']."";
				$querii = $connect->query($pengguna);
				$akhir = $querii->fetch_assoc();

        $data[]=array("user_name"=>$akhir['user_name'] , "rating"=> $row['rating'], "comment"=> $row['comment']);


		} echo json_encode($data);
  }else {

					echo'{"status":"nodata"}';

		 }
