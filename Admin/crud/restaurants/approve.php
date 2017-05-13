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
	<title>Approve Restaurant</title>
</head>
<body>

<h3> Do you really want to Approve this Restaurant?</h3>
<form action="php_action/approve.php" method="post">

	<input type="hidden" name="restaurant_id" value="<?php echo $data['restaurant_id'] ?>" />
	<button type="submit">Approve</button>
	<a href="index.php"><button type="button">Back</button></a>
</form>

</body>
</html>

<?php
}
?>