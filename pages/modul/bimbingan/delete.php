<?php 
    require 'Bimbingan.php';

	if (isset($_GET['id_bimbingan'])) {
   		 $objBimbingan = new Bimbingan();
   		 $objBimbingan->id_bimbingan = $_GET['id_bimbingan'];
   		 $objBimbingan->deleteBimbingan();

         echo "<script> alert('$objBimbingan->message');</script>";
         echo "<script> window.location = 'index.php?p=dosen';</script>";
	}else{
         echo "<script> window.history.back();</script>";
	}
 ?>