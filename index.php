<?php
	require "inc.koneksi.php";

	$pages_dir = 'pages/modul';
	if (!empty($_GET['p'])) {
		$pages = scandir($pages_dir, 0);
		unset($pages[0], $pages[1]);

		$p = $_GET['p'];
		$request = explode("-", $p);

		if (empty($request[1]) && $request[0] != 'logout') {
			(in_array($p, $pages) ? include $pages_dir.'/'.$p.'/index.php' : include 'pages/error/404.php');  
		}else if ($request[0] == 'logout'){
			(in_array('login', $pages) ? include $pages_dir.'/login/logout.php' : include 'pages/error/404.php');  
		}else if ($request[0] == 'form') {
			(in_array($request[1], $pages) ? include $pages_dir.'/'.$request[1].'/form.php' : include 'pages/error/404.php');  
		}else if ($request[0] == 'delete'){
			(in_array($request[1], $pages) ? include $pages_dir.'/'.$request[1].'/delete.php' : include 'pages/error/404.php');  
		}else if ($request[1] == 'admin'){
			(in_array($request[0], $pages) ? include $pages_dir.'/'.$request[0].'/'.$request[0].'-admin.php' : include 'pages/error/404.php');  
		}else if ($request[1] == 'mahasiswa'){
			(in_array($request[0], $pages) ? include $pages_dir.'/'.$request[0].'/'.$request[0].'-mahasiswa.php' : include 'pages/error/404.php');  
		}else if ($request[1] == 'dosen'){
			(in_array($request[0], $pages) ? include $pages_dir.'/'.$request[0].'/'.$request[0].'-dosen.php' : include 'pages/error/404.php');  
		}
	}else{
		// $session = true;
	  	if (!isset($_SESSION)) {
            session_start();
        }

		if (!isset($_SESSION)) {
			include 'pages/modul/dashboard/index.php';
		}else{
			include 'pages/modul/login/index.php';
		}
	}
?>