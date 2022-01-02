<?php 
	// menyalakan session
	if (!session_id()) session_start();
		
	
	// menggunakan teknik bootstrapping yaitu memanggil hanya memanggil 1 file
	// tetapi banyak file yang terhubung dengannya
	require_once '../app/init.php';


	$app = new App;

 ?>