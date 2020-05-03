<?php 
    require 'Dosen.php';

	if (isset($_GET['nidn'])) {
   		 $objDosen = new Dosen();
   		 $objDosen->nidn = $_GET['nidn'];
   		 $objDosen->deleteDosen();

         echo "<script> alert('$objDosen->message');</script>";
         echo "<script> window.location = 'index.php?p=dosen';</script>";
	}else{
         echo "<script> window.history.back();</script>";
	}
 ?>