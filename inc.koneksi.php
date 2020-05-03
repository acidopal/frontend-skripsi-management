<?php 
	
	class Connection
	{
		private $host = 'localhost';
		private $user = 'root';
		private $pwd = 'Naufal86.';
		private $dbName = 'skripsi_management';

		function __construct()
		{
			$conn = mysqli_connect($this->host, $this->user, $this->pwd);
			$dbSelect = mysqli_select_db($conn, $this->dbName);
			$this->connection = $conn;
		}
	}
 ?>