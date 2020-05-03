<?php 
    require 'Skripsi.php';

	if (isset($_GET['id_skripsi'])) {
   		 $objSkripsi = new Skripsi();
   		 $objSkripsi->id_skripsi = $_GET['id_skripsi'];
   		 $objSkripsi->deleteSkripsi();

         echo "<script> alert('$objSkripsi->message');</script>";
         echo "<script> window.location = 'index.php?p=Skripsi';</script>";
	}else{
         echo "<script> window.history.back();</script>";
	}
 ?>