<?php
include '../connect/db_connect.php';

$search = $_GET['search'];
// || !ctype_space($search)
$data = array();
if($search!='' ){
			if($connect->query("SELECT * FROM menus WHERE food_name LIKE '%".$search."%' || menu_description LIKE '%".$search."%'")->num_rows >0 AND $connect->query("SELECT * FROM restaurants WHERE restaurant_name LIKE '%".$search."%' || restaurant_address LIKE '%".$search."%' ||
						restaurant_category LIKE '%".$search."%' || restaurant_contact LIKE '%".$search."%' || restaurant_description LIKE '%".$search."%'")->num_rows >0) {
			$sql =
			"
				(SELECT * from
						(SELECT DISTINCT restaurant_id FROM menus WHERE food_name LIKE '%".$search."%' || menu_description LIKE '%".$search."%')
					M JOIN
						(SELECT * FROM restaurants)
					R ON M.restaurant_id=R.restaurant_id)
				UNION
				(SELECT * from
						(SELECT DISTINCT restaurant_id FROM menus WHERE food_name LIKE '%".$search."%' || menu_description LIKE '%".$search."%')
					M JOIN
						(SELECT * FROM restaurants WHERE restaurant_name LIKE '%".$search."%' || restaurant_address LIKE '%".$search."%' ||
						restaurant_category LIKE '%".$search."%' || restaurant_contact LIKE '%".$search."%' || restaurant_description LIKE '%".$search."%')
					R ON not M.restaurant_id=R.restaurant_id)
			";}
			if($connect->query("SELECT * FROM menus WHERE food_name LIKE '%".$search."%' || menu_description LIKE '%".$search."%'")->num_rows <1 AND $connect->query("SELECT * FROM restaurants WHERE restaurant_name LIKE '%".$search."%' || restaurant_address LIKE '%".$search."%' ||
						restaurant_category LIKE '%".$search."%' || restaurant_contact LIKE '%".$search."%' || restaurant_description LIKE '%".$search."%'")->num_rows >0) {

			$sql =
			"
				SELECT * FROM restaurants WHERE restaurant_name LIKE '%".$search."%' || restaurant_address LIKE '%".$search."%' ||
						restaurant_category LIKE '%".$search."%' || restaurant_contact LIKE '%".$search."%' || restaurant_description LIKE '%".$search."%'
			";}
			if($connect->query("SELECT * FROM menus WHERE food_name LIKE '%".$search."%' || menu_description LIKE '%".$search."%'")->num_rows >0 AND $connect->query("SELECT * FROM restaurants WHERE restaurant_name LIKE '%".$search."%' || restaurant_address LIKE '%".$search."%' ||
						restaurant_category LIKE '%".$search."%' || restaurant_contact LIKE '%".$search."%' || restaurant_description LIKE '%".$search."%'")->num_rows <1) {

			$sql =
			"
				(SELECT * from
						(SELECT DISTINCT restaurant_id FROM menus WHERE food_name LIKE '%".$search."%' || menu_description LIKE '%".$search."%')
					M JOIN
						(SELECT * FROM restaurants)
					R ON M.restaurant_id=R.restaurant_id)
			";}
			if($connect->query("SELECT * FROM menus WHERE food_name LIKE '%".$search."%' || menu_description LIKE '%".$search."%'")->num_rows <1 AND $connect->query("SELECT * FROM restaurants WHERE restaurant_name LIKE '%".$search."%' || restaurant_address LIKE '%".$search."%' ||
						restaurant_category LIKE '%".$search."%' || restaurant_contact LIKE '%".$search."%' || restaurant_description LIKE '%".$search."%'")->num_rows <1) {

			$sql =
			"
				(SELECT * from
						(SELECT * FROM menus WHERE food_name LIKE '%".$search."%' || menu_description LIKE '%".$search."%')
					M JOIN
						(SELECT * FROM restaurants WHERE restaurant_name LIKE '%".$search."%' || restaurant_address LIKE '%".$search."%' ||
						restaurant_category LIKE '%".$search."%' || restaurant_contact LIKE '%".$search."%' || restaurant_description LIKE '%".$search."%')
					R ON M.restaurant_id!=R.restaurant_id)
				UNION ALL
				(SELECT * from
						(SELECT * FROM menus WHERE food_name LIKE '%".$search."%' || menu_description LIKE '%".$search."%')
					M JOIN
						(SELECT * FROM restaurants WHERE restaurant_name LIKE '%".$search."%' || restaurant_address LIKE '%".$search."%' ||
						restaurant_category LIKE '%".$search."%' || restaurant_contact LIKE '%".$search."%' || restaurant_description LIKE '%".$search."%')
					R ON M.restaurant_id=R.restaurant_id)
			";}
			$result = $connect->query($sql);

			if($result->num_rows >0)
			{
				while($row = $result->fetch_assoc())
				{
					$data[]=array("restaurant_id"=>$row['restaurant_id'], "restaurant_name"=> $row['restaurant_name'], "restaurant_address"=>$row['restaurant_address'], "restaurant_category"=>$row['restaurant_category'],"restaurant_contact"=>$row['restaurant_contact'],"image"=>$row['image']);
						// $row['restaurant_id']
            // $row['restaurant_name']
						// $row['restaurant_address']
						// $row['restaurant_category']
						// $row['restaurant_contact']

				}
        echo json_encode($data);
			}
				else
				{
					echo '[{"restaurant_id":"-1","restaurant_name":"Tidak Ada Restaurant","restaurant_address":"-","restaurant_category":"none","restaurant_contact":"0","image":"NULL.jpg"}]';
					//echo "<tr><td colspan='5'><center>No Data Available</center></td></tr>";
				}
      }
			?>
