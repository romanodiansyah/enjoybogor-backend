<?php
 session_start();
 if (empty($_SESSION['user_id'])) {
 header("location:login.php"); // jika belum login, maka dikembalikan ke file form_login.php
 }
 else {
	 if($_SESSION['user_id'] == '-1')
	 {
		header("location:../../admin/home.php");
	 }
	 else{
		 header("location:../../users/home.php");
	 }
  } ?>