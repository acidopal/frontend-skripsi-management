<?php 
    require 'Skripsi.php';

	if (isset($_GET['id_skripsi'])) {
   		 $objProdi = new Skripsi();
   		 $objProdi->id_skripsi = $_GET['id_skripsi'];
   		 $objProdi->deleteSkripsi();

         echo "<script> alert('$objProdi->message');</script>";
         echo "<script> window.location = 'index.php?p=skripsi';</script>";
	}else{
         echo "<script> window.history.back();</script>";
	}
 ?>