<?php
 session_start();
 if (empty($_SESSION['user_id'])) {
 header("location:../commonfunction/login/login.php"); // jika belum login, maka dikembalikan ke file form_login.php
 }
 else {
 ?>
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Enjoy Bogor</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
             <div class="content">
                <div class="title m-b-md">
                    Enjoy Bogor
                </div>
				<div class="links">
					<a href="crud/user/index.php">Profile</a>
                    <a href="crud/restaurants/index.php">Restaurants List</a>
                    <a href="crud/vouchers/index.php">Vouchers List</a>
                    <a href="crud/menus/index.php">Menu List</a>
					<a href="function/search/search.php">Search</a>
					<a href="../commonfunction/logout/logout.php">Logout</a>
                </div>
            </div>
        </div>
		<?php
		require_once '../connect/db_connect.php';
		$sql = "SELECT restaurant_id,restaurant_name,image from restaurants  where not image='NULL.jpg' and active=2 order by date_made DESC";
		$result = $connect->query($sql);
		if($result->num_rows >2)
		{
			$counter = 3;
			while($counter)
			{
				$row = $result->fetch_assoc()
				
				 ?><a href='crud/restaurants/restaurant/index.php?restaurant_id=".$row['restaurant_id']."'><img src='../restaurant_image/<?php echo $row['image']?>' width='100' height='100'><?php
				$counter = $counter - 1;
			}
		}
		else if($result->num_rows >1)
		{
			$counter = 2;
			while($counter)
			{
				$row = $result->fetch_assoc()
				
				 ?><a href='crud/restaurants/restaurant/index.php?restaurant_id=".$row['restaurant_id']."'><img src='../restaurant_image/<?php echo $row['image']?>' width='100' height='100'></a><?php
				$counter = $counter - 1;
			}
		}
		else if($result->num_rows >0)
		{
			$counter = 1;
			while($counter)
			{
				$row = $result->fetch_assoc()
				
				 ?><a href='crud/restaurants/restaurant/index.php?restaurant_id=".$row['restaurant_id']."'><img src='../restaurant_image/<?php echo $row['image']?>' width='100' height='100'></a><?php
				$counter = $counter - 1;
			}
		}
		else {
			echo "No Restaurants Available";
		}?>
    </body>
<?php } ?>