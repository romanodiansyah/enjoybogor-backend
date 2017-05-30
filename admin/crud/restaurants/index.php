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
	<a href="create.php"><button type="button">Add Restaurant</button></a>
	<a href="../../home.php"><button type="button">Home</button></a>
	<a href="needapprove.php"><button type="button">Need Approve</button></a>
	<table border="1" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th>Restaurant Name</th>
				<th>Photo</th>
				<th>Address</th>
				<th>Category</th>
				<th>Contact</th>
				<th>Description</th>
				<th>Option</th>
			</tr>
		</thead>
		<tbody>
			<?php
            $sql = "SELECT restaurant_name,image,restaurant_address,restaurant_category,restaurant_contact,restaurant_description,restaurant_id FROM restaurants WHERE active = 2";
            $result = $connect->query($sql);

            if ($result->num_rows >0) {
                while ($row = $result->fetch_assoc()) {
                    echo "
					<tr>
						<td> ".$row['restaurant_name']."</td>
						<td> <img src='../../../restaurant_image/".$row['image']."' width='100' height='70'> </td>
						<td> ".$row['restaurant_address']."</td>
						<td> ".$row['restaurant_category']."</td>
						<td> ".$row['restaurant_contact']."</td>
						<td> ".$row['restaurant_description']."</td>
						<td>
							<a href='edit.php?restaurant_id=".$row['restaurant_id']."'><button type='button'>Edit</button></a>
							<a href='remove.php?restaurant_id=".$row['restaurant_id']."'><button type='button'>Remove</button></a>
							<a href='addphoto.php?restaurant_id=".$row['restaurant_id']."'><button type='button'>Add Photo</button></a>
							<a href='moreimage.php?restaurant_id=".$row['restaurant_id']."'><button type='button'>Remove Photo</button></a>
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
 <?php } ?>