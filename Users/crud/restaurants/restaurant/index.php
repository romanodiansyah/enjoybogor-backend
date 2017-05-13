<?php require_once '../../../../connect/db_connect.php'; 
	$restaurant_id=$_GET['restaurant_id'];
	$ql= "SELECT * FROM restaurants WHERE restaurant_id='$restaurant_id'";
	$queri = $connect->query($ql);
	$hasil = $queri->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo "$hasil[restaurant_name]";?></title>
	
	<style type="text/css">
		.manageMember
		{
			width: 100%;
			margin: auto;
		}
		
		table
		{
			width: 100%;
			margin-top: 20px;
		}
	</style>
	
</head>
<body>

<div class="manageMember">
	<a href="../../../home.php"><button type="button">Home</button></a>
	<a href="../index.php"><button type="button">Back</button></a>
</div>
<?php 
	echo "<h1>$hasil[restaurant_name]</br></h1>";
	echo "$hasil[restaurant_description]";
?>

</body>
</html>
</html>