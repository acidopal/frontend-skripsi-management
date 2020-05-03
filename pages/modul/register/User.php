<?php 

	class User extends Connection
	{
		public  $id_user=0;
		public $email='';
		public $password='';
		public $role='';
		public $result=false;
		public $message='';
		
		public function addUser()
		{
			$sql = "INSERT INTO user(name, email, password, role)
					VALUES ('$this->name', '$this->email', '$this->password', '$this->role')";

			$this->result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));;

			if ($this->result) 
				$this->message = 'Data berhasil ditambahkan!';
			else
				$this->message = 'Data gagal ditambahkan!';
		}	

		public function validateEmail($email)
		{
			$sql = "SELECT * FROM user
					WHERE email = '$email'";

			$result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));;
			
			if (mysqli_num_rows($result) == 1) {
				$this->result = true;
			}
		}

		public function validateLogin($email, $password)
		{
			$sql = "SELECT * FROM user
					WHERE email = '$email' AND password = '$password'";

			$result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));
			
			if (mysqli_num_rows($result) == 1) {
				$this->result = true;
				$data = mysqli_fetch_assoc($result);
				$this->id_user = $data['id_user'];
				$this->name = $data['name'];
				$this->email = $data['email'];
				$this->role = $data['role'];
			}
		}
	}

 ?>