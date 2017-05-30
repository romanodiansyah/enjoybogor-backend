<html>
<head>
  <title>Upload</title>
</head>
<body>
  <h1>Upload</h1>
	<br><br><br>
<?php
    $restaurant_id = $_GET['restaurant_id'];
?>
 <!-- dalam entitas restaurant_image apakah restaurant_idnya berjumlah 5 atau lebih?
        JIKA lebih dari 5 maka >> gajadi upload >> gambar sudah kebanyakan
        JIKA kurang dari 5 maka bisa upload !!
 -->
  <!-- cek apakah sudah upload 5 kali atau belum -->

  <form method="post" enctype="multipart/form-data" action="../php_action/upload.php">
    <input type="file" name="image">
    <input type="submit" value="Upload">
    <input type="hidden" name="restaurant_id" value="<?php echo $restaurant_id ?>"/>
    <!-- kirim restaurant_id -->
  </form>
</body>
</html>
