<?php 
    require 'Prodi.php';

	if (isset($_GET['id_prodi'])) {
   		 $objProdi = new Prodi();
   		 $objProdi->id_prodi = $_GET['id_prodi'];
   		 $objProdi->deleteProdi();

         echo "<script> alert('$objProdi->message');</script>";
         echo "<script> window.location = 'index.php?p=prodi';</script>";
	}else{
         echo "<script> window.history.back();</script>";
	}
 ?>