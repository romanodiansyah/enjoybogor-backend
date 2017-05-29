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
	
</head>
<body>

<div class="manageMember">
	<a href="php_action/myvoucher.php"><button type="button">My voucher</button></a>
	<a href="../../home.php"><button type="button">Home</button></a>
	<table border="1" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th>Voucher Name</th>
				<th>Voucher</th>
				<th>Points</th>
				<th>Type</th>
				<th>Quantity</th>
				<th>Option</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$sql = "SELECT * FROM vouchers WHERE active = 1";
			$result = $connect->query($sql);
			
			if($result->num_rows >0)
			{
				while($row = $result->fetch_assoc())
				{
					if($row['quantity']>0){
					echo "
					<tr>
						<td> ".$row['voucher_name']."</td>
						<td> <img src='../../../Admin/crud/vouchers/images/".$row['image']."' width='100' height='70'> </td>
						<td>".$row['points_needed']."</td>
						<td>".$row['voucher_type']."</td>
						<td>".$row['quantity']."</td>
						<td>
							<a href='php_action/get.php?voucher_id=".$row['voucher_id']."'><button type='button'>Get</button></a>
						</td>
					</tr>";}
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
 <?php } ?>