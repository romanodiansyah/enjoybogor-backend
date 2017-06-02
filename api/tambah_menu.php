
<?php

include '../connect/db_connect.php';
$json_input_data=json_decode(file_get_contents('php://input'), true);

//dapetin id yg terakhir
$count = mysqli_query($connect, "SELECT menu_id FROM menus ORDER BY menu_id DESC");
$count = mysqli_fetch_assoc($count);
$count = $count['menu_id']+1;


	$food_name = $json_input_data['food_name'];
	$price = $json_input_data['price'];
	$portion_size = $json_input_data['portion_size'];
	$menu_description = $json_input_data['menu_description'];
	$restaurant_id = $json_input_data['restaurant_id'];





				$sql = "INSERT INTO menus (menu_id,restaurant_id,food_name,price,portion_size,menu_description,active) VALUES ('','$restaurant_id','$food_name','$price','$portion_size', '$menu_description',1)";
				if($connect->query($sql) === TRUE)
				{
					echo json_encode(array('message' => 'success, waiting for admin confirmation','status'=>'success'));
				}
				else
				{
					echo json_encode(array('message' => 'Fail, cannot add menu','status'=>'fail'));
				}

	$connect->close();
?>
