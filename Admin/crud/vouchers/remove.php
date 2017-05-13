<?php

require_once '../../../connect/db_connect.php';

if($_GET['voucher_id'])
{
	$voucher_id = $_GET['voucher_id'];
	
	$sql = "SELECT * FROM vouchers WHERE voucher_id = {$voucher_id}";
	$result = $connect->query($sql);
	$data = $result->fetch_assoc();
	
	$connect->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Delete User</title>
</head>
<body>

<h3> Do you really want to remove this voucher?</h3>
<form action="php_action/remove.php" method="post">

	<input type="hidden" name="voucher_id" value="<?php echo $data['voucher_id'] ?>" />
	<button type="submit">Delete</button>
	<a href="index.php"><button type="button">Back</button></a>
</form>

</body>
</html>

<?php
}
?>