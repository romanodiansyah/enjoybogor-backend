<?php

require_once '../../../connect/db_connect.php';

if ($_GET['user_id']) {
    $user_id = $_GET['user_id'];

    $sql = "SELECT * FROM users WHERE user_id = {$user_id}";
    $result = $connect->query($sql);
    $data = $result->fetch_assoc();

    $connect->close(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Delete User</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<h3> Do you really want to remove this user?</h3>
<form action="php_action/remove.php" method="post">

	<input type="hidden" name="user_id" value="<?php echo $data['user_id'] ?>" />
	<button type="submit">Delete</button>
	<a href="index.php"><button type="button">Back</button></a>
</form>

</body>
</html>

<?php

}
?>
