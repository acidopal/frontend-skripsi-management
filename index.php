<?php
	require "inc.koneksi.php";

	$pages_dir = 'pages/modul';
	if (!empty($_GET['p'])) {
		$pages = scandir($pages_dir, 0);
		unset($pages[0], $pages[1]);

		$p = $_GET['p'];
		$request = explode("-", $p);

		// echo print_r($request[0]);
		// die();
		if (empty($request[1])) {
			(in_array($p, $pages) ? include $pages_dir.'/'.$p.'/index.php' : include 'pages/error/404.php');  
		}else if ($request[0] == 'form') {
			(in_array($request[1], $pages) ? include $pages_dir.'/'.$request[1].'/form.php' : include 'pages/error/404.php');  
		}if ($request[0] == 'delete'){
			(in_array($request[1], $pages) ? include $pages_dir.'/'.$request[1].'/delete.php' : include 'pages/error/404.php');  
		}
	}else{
		$session = true;
		if ($session == true) {
			include 'pages/modul/dashboard/index.php';
		}else{
			include 'pages/modul/login/index.php';
		}
	}
?>