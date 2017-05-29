<?php
 session_start();
 if (empty($_SESSION['user_id'])) {
	header("location:../commonfunction/login/login.php"); // jika belum login, maka dikembalikan ke file form_login.php
 }
 else {?>
<?php
   require_once '../../../../connect/db_connect.php';
   $restaurant_id=$_GET['restaurant_id'];
   $sql= "SELECT * FROM restaurant_image WHERE restaurant_id='$restaurant_id' AND active=2";
   $result = $connect->query($sql);
   if($result->num_rows>0)
   {
     while($row = $result->fetch_assoc())
     {
       echo "
       <tr>
         <td>
              <img src='../../../../restaurant_images/".$row['image']."' width='200' height='110'><br>
         </td>
         <br></br>
       </tr>";
     }
   }
   else
   {
     echo "No Image<br>";

   }
?>

 <?php } ?>
