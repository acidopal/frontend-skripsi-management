<?php 
    require 'Mahasiswa.php';

	if (isset($_GET['nim'])) {
   		 $objMahasiswa = new Mahasiswa();
   		 $objMahasiswa->nim = $_GET['nim'];
   		 $objMahasiswa->deleteMahasiswa();

         echo "<script> alert('$objMahasiswa->message');</script>";
         echo "<script> window.location = 'index.php?p=mahasiswa';</script>";
	}else{
         echo "<script> window.history.back();</script>";
	}
 ?>