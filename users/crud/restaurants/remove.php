<?php
 session_start();
 if (empty($_SESSION['user_id'])) {
	header("location:../commonfunction/login/login.php"); // jika belum login, maka dikembalikan ke file form_login.php
 }
 else {
 ?>
<?php

require_once '../../../connect/db_connect.php';

if($_GET['restaurant_id'])
{
	$restaurant_id = $_GET['restaurant_id'];
	
	$sql = "SELECT * FROM restaurants WHERE restaurant_id = {$restaurant_id}";
	$result = $connect->query($sql);
	$data = $result->fetch_assoc();
	
	$connect->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Delete Restaurant</title>
</head>
<body>

<h3> Do you really want to request to remove this Restaurant?</h3>
<form action="php_action/remove.php" method="post">

	<input type="hidden" name="restaurant_id" value="<?php echo $data['restaurant_id'] ?>" />
	<button type="submit">Delete</button>
	<a href="index.php"><button type="button">Back</button></a>
</form>

</body>
</html>

<?php
}
 }
?>