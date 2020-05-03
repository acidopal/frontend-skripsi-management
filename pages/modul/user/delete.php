<?php 
    require 'User.php';

	if (isset($_GET['id_user'])) {
   		 $objUser = new User();
   		 $objUser->id_user = $_GET['id_user'];
   		 $objUser->deleteUser();

         echo "<script> alert('$objUser->message');</script>";
         echo "<script> window.location = 'index.php?p=user';</script>";
	}else{
         echo "<script> window.history.back();</script>";
	}
 ?>