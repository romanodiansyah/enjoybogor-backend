<?php require_once '../../../connect/db_connect.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Enjoy Bogor</title>

	<style type="text/css">
		.manageMember
		{
			width: 50%;
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
	<a href="create.php"><button type="button">Add Member</button></a>
	<a href="../../home.php"><button type="button">Home</button></a>
	<table border="1" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th>Name</th>
				<th>Contact</th>
				<th>E-mail</th>
				<th>Option</th>
			</tr>
		</thead>
		<tbody>
			<?php
            $sql = "SELECT * FROM users WHERE active = 1";
            $result = $connect->query($sql);

            if ($result->num_rows >0) {
                while ($row = $result->fetch_assoc()) {
                    echo "
					<tr>
						<td> ".$row['user_name']."</td>
						<td> ".$row['username']."</td>
						<td>".$row['user_contact']."</td>
						<td>".$row['email']."</td>
						<td>
							<a href='edit.php?user_id=".$row['user_id']."'><button type='button'>Edit</button></a>
							<a href='remove.php?user_id=".$row['user_id']."'><button type='button'>Remove</button></a>
						</td>
					</tr>";
                }
            } else {
                    echo "<tr><td colspan='5'><center>No Data Available</center></td></tr>";
                }
            ?>
		</tbody>
	</table>
</div>

</body>
</html>
</html>
