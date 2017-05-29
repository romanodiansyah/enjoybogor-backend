<?php
 session_start();
 if (empty($_SESSION['user_id'])) {
	header("location:../commonfunction/login/login.php"); // jika belum login, maka dikembalikan ke file form_login.php
 }
 else {
 ?>
<?php

require_once '../../../connect/db_connect.php';

if ($_SESSION['user_id']) {
    $user_id = $_SESSION['user_id'];

    $sql = "SELECT user_name,username,user_contact,email,points,image FROM users WHERE user_id = {$user_id}";
    $result = $connect->query($sql);

    $data = $result->fetch_assoc();

    $connect->close(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>

		<style type="text/css">
			fieldset
			{
				margin: auto;
				margin-top: 100px
				width: 50%
			}

			table tr th
			{
				padding-top: 20px;
			}
		</style>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<fieldset>
	<legend>Profile</legend>

	<form>
		<table cellspacing="0" cellpadding="0">
      <tr>
        <th>Photo</th>
        <td> <img src='images/<?php echo $data['image']?>' width='100' height='100'> </td> <!-- baru nih  -->
      </tr>
      <tr>
				<th>Name</th>
        <td><?php echo $data['user_name'] ?></td>
			</tr>
			<tr>
				<th>Username</th>
				<td><?php echo $data['username'] ?></td>
			</tr>
			<tr>
				<th>Contact</th>
				<td><?php echo $data['user_contact'] ?></td>
			</tr>
			<tr>
				<th>E-mail</th>
				<td><?php echo $data['email']?></td>
			</tr>
			<tr>
				<th>Points</th>
				<td><?php echo $data['points']?></td>
			</tr>
			<tr>
				<td><a href="edit.php"><button type="button">Edit</button></a></td>
        <td><a href="upload.php"><button type="button">Change Photo</button></a></td>
				<td><a href="editpassword.php"><button type="button">Change Password</button></a></td>
				<td><a href="../../../home.php"><button type="button">Back</button></a></td>
			</tr>
		</table>
	</form>

</fieldset>

</body>
</html>

<?php
}
}
?>
