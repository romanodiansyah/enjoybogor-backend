<?php

require_once '../../../../connect/db_connect.php';

//dapetin id yg terakhir
$count = mysqli_query($connect, "SELECT menu_id FROM menus ORDER BY menu_id DESC");
$count = mysqli_fetch_assoc($count);
$count = $count['menu_id']+1;

if($_POST)
{
	$food_name = $_POST['food_name'];
	$price = $_POST['price'];
	$portion_size = $_POST['portion_size'];
	$menu_description = $_POST['menu_description'];
	$restaurant_id = $_POST['restaurant_id'];

	$file_name = $_FILES['image1']['name'];
	$file_size = $_FILES['image1']['size'];
	$file_type = $_FILES['image1']['type'];
	$tmp_file = $_FILES['image1']['tmp_name'];
  $file_name = $count.'_1_'.$file_name ; // ganti nama

	$file_name1 = $_FILES['image2']['name'];
	$file_size1 = $_FILES['image2']['size'];
	$file_type1 = $_FILES['image2']['type'];
	$tmp_file1 = $_FILES['image2']['tmp_name'];
	$file_name1 = $count.'_2_'.$file_name1 ; // ganti nama

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
					echo "<p> New Menu Successfully Created</p>";
					echo "<a href='../create.php'><button type='button'>Back</button></a>";
					echo "<a href='../index.php'><button type='button'>Menu</button></a>";
					echo "<a href='../../../home.php'><button type='button'>Home</button></a>";
				}
				else
				{
					echo "Error " . $sql . ' ' . $connect->connect_error;
				}
			}else{
				// Jika gambar gagal diupload, Lakukan :
				echo "Maaf, Gambar gagal untuk diupload.";
				echo "<br><a href='../index.php'>Kembali Ke Form</a>";
			}
		}else{
			// Jika ukuran file lebih dari 1MB, lakukan :
			echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
			echo "<br><a href='../index.php'>Kembali Ke Form</a>";
		}
	}else{
		// Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
		echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
		echo "<br><a href='../index.php'>Kembali Ke Form</a>";
	}
}
	$connect->close();
?>
