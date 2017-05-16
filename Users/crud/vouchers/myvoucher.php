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
	
</head>
<body>

<div class="manageMember">
	<a href="../../../home.php"><button type="button">Home</button></a>
	<table border="1" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th>Voucher Name</th>
				<th>Action !</th>
			</tr>
		</thead>
		<tbody>
			<?php
			session_start();
			$user_id = $_SESSION['user_id'];
			$sql = "SELECT * FROM vouchers V JOIN assoc A WHERE V.voucher_id = A.voucher_id AND A.active = 1 AND A.user_id = {$user_id} ";
			$result = $connect->query($sql);
			if($result->num_rows >0)
			{
				while($row = $result->fetch_assoc())
				{
					echo "
					<tr>
						<td> ".$row['voucher_name']."</td>
						<td>
							<a href='use.php?voucher_id=".$row['voucher_id']."'><button type='button'>Use it !</button></a>
						</td>
					</tr>";
				}
			}
				else
				{
					echo "<tr><td colspan='5'><center>No Data Available</center></td></tr>";
				}
			?>
		</tbody>
	</table>
</div>

</body>
</html>
</html>