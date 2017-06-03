<?php
 session_start();
 if (empty($_SESSION['user_id'])) {
	header("location:../commonfunction/login/login.php"); // jika belum login, maka dikembalikan ke file form_login.php
 }
 else {
 ?>
<?php require_once '../../../connect/db_connect.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Enjoy Bogor</title>

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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="manageMember">
	<a href="../../home.php"><button type="button">Home</button></a>
	<table border="1" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th>Restaurant id</th>
				<th>Photo</th>
				<th>Option</th>
			</tr>
		</thead>
		<tbody>
			<?php
            $sql = "SELECT * FROM restaurants_images WHERE active = 1";
            $result = $connect->query($sql);

            if ($result->num_rows >0) {
                while ($row = $result->fetch_assoc()) {
                    echo "
					<tr>
						<td> ".$row['restaurant_id']."</td>
            <td> <img src='../../../restaurant_image/".$row['image']."' width='100' height='70'> </td>
						<td>
							<a href='remove.php?image_id=".$row['image_id']."'><button type='button'>Decline</button></a>
							<a href='approve.php?image_id=".$row['image_id']."'><button type='button'>Approve</button></a>
						</td>
					</tr>";
                }
            } else {
                    echo "<tr><td colspan='6'><center>No Data Available</center></td></tr>";
                }
            ?>
		</tbody>
	</table>
</div>

</body>
</html>
</html>
 <?php }?>
