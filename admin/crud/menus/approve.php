<?php
 session_start();
 if (empty($_SESSION['user_id'])) {
	header("location:../commonfunction/login/login.php"); // jika belum login, maka dikembalikan ke file form_login.php
 }
 else {
 ?>
<?php

require_once '../../../connect/db_connect.php';

if ($_GET['menu_id']) {
    $menu_id = $_GET['menu_id'];

    $sql = "SELECT menu_id FROM menus WHERE menu_id = {$menu_id}";
    $result = $connect->query($sql);
    $data = $result->fetch_assoc();

    $connect->close(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Approve Restaurant</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<h3> Do you really want to Approve this Restaurant?</h3>
<form action="php_action/approve.php" method="post">

	<input type="hidden" name="menu_id" value="<?php echo $data['menu_id'] ?>" />
	<button type="submit">Approve</button>
	<a href="index.php"><button type="button">Back</button></a>
</form>

</body>
</html>

<?php

 }}
?>
