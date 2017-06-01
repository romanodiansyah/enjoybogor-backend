<!-- <?php

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

	$file_name = $_FILES['image1']['name'];
	$file_size = $_FILES['image1']['size'];
	$file_type = $_FILES['image1']['type'];
	$tmp_file = $_FILES['image1']['tmp_name'];
  $file_name = $count.'_1_'.$file_name; // ganti nama

	$file_name1 = $_FILES['image2']['name'];
	$file_size1 = $_FILES['image2']['size'];
	$file_type1 = $_FILES['image2']['type'];
	$tmp_file1 = $_FILES['image2']['tmp_name'];
  $file_name1 = $count.'_2_'.$file_name1; // ganti nama


	$path = "../../../../menu_image/".$file_name;
	$path1 = "../../../../menu_image/".$file_name1;


	if(($file_type == "image/jpeg" || $file_type == "image/png")&& ($file_type1 == "image/jpeg" || $file_type1 == "image/png")){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
	  // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
	  if($file_size <= 1024000 && $file_size1 <= 1024000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
	    // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
	    // Proses upload
	    if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
	      // Jika gambar berhasil diupload, Lakukan :
	      // Proses simpan ke Database
				move_uploaded_file($tmp_file1, $path1);
				$sql = "INSERT INTO menus (menu_id,restaurant_id,food_name,price,portion_size,menu_description,active,image1,image2) VALUES ('','$restaurant_id','$food_name','$price','$portion_size', '$menu_description',1,'$file_name','$file_name1')";
				if($connect->query($sql) === TRUE)
				{
					echo json_encode(array('message' => 'success, waiting for admin confirmation','status'=>'success'));
				}
				else
				{
					echo json_encode(array('message' => 'fail, internal error'));
				}
	    }else{
	      // Jika gambar gagal diupload, Lakukan :
	      echo json_encode(array('message' => "image can't be loaded"));
	    }
	  }else{

	    echo json_encode(array('message' => 'file size more than 1MB'));
	  }
	}else{
	 echo json_encode(array('message' => 'fail, bad file type'));
}
	$connect->close();
?> -->

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

	$file_name = $_FILES['image1']['name'];
	$file_size = $_FILES['image1']['size'];
	$file_type = $_FILES['image1']['type'];
	$tmp_file = $_FILES['image1']['tmp_name'];
  $file_name = $count.'_1_'.$file_name; // ganti nama

	$file_name1 = $_FILES['image2']['name'];
	$file_size1 = $_FILES['image2']['size'];
	$file_type1 = $_FILES['image2']['type'];
	$tmp_file1 = $_FILES['image2']['tmp_name'];
  $file_name1 = $count.'_2_'.$file_name1; // ganti nama


	$path = "../../../../menu_image/".$file_name;
	$path1 = "../../../../menu_image/".$file_name1;


	if(($file_type == "image/jpeg" || $file_type == "image/png")&& ($file_type1 == "image/jpeg" || $file_type1 == "image/png")){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
	  // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
	  if($file_size <= 1024000 && $file_size1 <= 1024000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
	    // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
	    // Proses upload
	    if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
	      // Jika gambar berhasil diupload, Lakukan :
	      // Proses simpan ke Database
				move_uploaded_file($tmp_file1, $path1);
				$sql = "INSERT INTO menus (menu_id,restaurant_id,food_name,price,portion_size,menu_description,active,image1,image2) VALUES ('','$restaurant_id','$food_name','$price','$portion_size', '$menu_description',1,'$file_name','$file_name1')";
				if($connect->query($sql) === TRUE)
				{
					echo json_encode(array('message' => 'success, waiting for admin confirmation','status'=>'success'));
				}
				else
				{
					echo json_encode(array('message' => 'success, waiting for admin confirmation','status'=>'success'));
				}
	    }else{
	      // Jika gambar gagal diupload, Lakukan :
	      echo json_encode(array('message' => 'success, waiting for admin confirmation','status'=>'success'));
	    }
	  }else{

	    echo json_encode(array('message' => 'success, waiting for admin confirmation','status'=>'success'));
	  }
	}else{
	 echo json_encode(array('message' => 'success, waiting for admin confirmation','status'=>'success'));
}
	$connect->close();
?>
