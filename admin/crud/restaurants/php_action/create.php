<?php

require_once '../../../../connect/db_connect.php';

session_start();
$user_id = $_SESSION['user_id'];

//dapetin id yg terakhir
$count = mysqli_query($connect, "SELECT restaurant_id FROM restaurants ORDER BY restaurant_id DESC");
$count = mysqli_fetch_assoc($count);
$count = $count['restaurant_id']+1;

if ($_POST) {
    $restaurant_name = $_POST['restaurant_name'];
    $restaurant_address = $_POST['restaurant_address'];
    $restaurant_category = $_POST['restaurant_category'];
    $restaurant_contact = $_POST['restaurant_contact'];
    $restaurant_description = $_POST['restaurant_description'];

    $file_name = $_FILES['images']['name'];
  	$file_size = $_FILES['images']['size'];
  	$file_type = $_FILES['images']['type'];
  	$tmp_file = $_FILES['images']['tmp_name'];
    $file_name = $count.'_'.$file_name; // ganti nama

    $path = "../../../../restaurant_image/".$file_name;

  	if($file_type == "image/jpeg" || $file_type == "image/png")
  	{ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
  	 // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
  		if($file_size <= 1024000)
  		{ 	// Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
  			// Jika ukuran file kurang dari sama dengan 1MB, lakukan
  			// Proses upload
  			if(move_uploaded_file($tmp_file, $path))
  			{ // Cek apakah gambar berhasil diupload atau tidak
  				// Jika gambar berhasil diupload, Lakukan :
  				// Proses simpan ke Database
  				$sql = "INSERT INTO restaurants (restaurant_id,restaurant_name,restaurant_address,restaurant_category,restaurant_contact,restaurant_description,active,user_id,image) VALUES ('','$restaurant_name','$restaurant_address','$restaurant_category', '$restaurant_contact', '$restaurant_description',1,'$user_id','$file_name')";
          if ($connect->query($sql) === true) {
      		//echo $sql;// boleh diganti nih, pointnya mau bertambah berapa jika add restaurant
              echo "<p> New Restaurant Successfully Created, please wait for the approve</p>";
              echo "<a href='../create.php'><button type='button'>Back</button></a>";
              echo "<a href='../index.php'><button type='button'>Restaurant</button></a>";
              echo "<a href='../../../home.php'><button type='button'>Home</button></a>";
          } else {
              echo "Error " . $sql . ' ' . $connect->connect_error;
              echo "<br><a href='../index.php'>Back</a>";
          }
          $connect->close();
  			}
  			else
  			{
  				// Jika gambar gagal diupload, Lakukan :
  				echo "Maaf, Gambar gagal untuk diupload.";
  				echo "<br><a href='../index.php'>Back</a>";
  			}
  		}
  		else
  		{
  			// Jika ukuran file lebih dari 1MB, lakukan :
  			echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
  			echo "<br><a href='../index.php'>Back</a>";
  		}
  	}
  	else
  	{
  		// Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
  		echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
  		echo "<br><a href='../index.php'>Back</a>";
  	}
}

?>
