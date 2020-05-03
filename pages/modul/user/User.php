<?php 
	
	class User extends Connection
	{
		public $id_user;
		public $name;
		public $password;
		public $email;
		public $role;
		public $result = false;
		public $message;


		public function addUser()
		{
			$sql = "INSERT INTO user(id_user, name, email, password, role)
					VALUES ('$this->id_user', '$this->name', '$this->email', '$this->password', '$this->role')";

			$this->result = mysqli_query($this->connection, $sql);

			if ($this->result) 
				$this->message = 'Data berhasil ditambahkan!';
			else
				$this->message = 'Data gagal ditambahkan!';
		}

		public function updateUser()
		{
			$sql = "UPDATE user
					SET id_user = '$this->id_user', name = '$this->name', email = '$this->email', password = '$this->password', role = '$this->role'
					WHERE id_user = '$this->id_user'";

			$this->result = mysqli_query($this->connection, $sql);

			if ($this->result) 
				$this->message = 'Data berhasil diperbarui!';
			else
				$this->message = 'Data gagal diperbarui!';
		}

		public function deleteUser()
		{
			$sql = "DELETE FROM user WHERE id_user = '$this->id_user'";

			$this->result = mysqli_query($this->connection, $sql);

			if ($this->result) 
				$this->message = 'Data berhasil dihapus!';
			else
				$this->message = $this->id_user;
		}


		public function allUser()
		{
			$sql = "SELECT * FROM user";

			$result = mysqli_query($this->connection, $sql);

			$arrResult = Array();
			$count = 0;

			if (mysqli_num_rows($result) > 0) {
				while ($data = mysqli_fetch_array($result)) {
					$objUser = new User();
					$objUser->id_user = $data['id_user'];
					$objUser->name = $data['name'];
					$objUser->email = $data['email'];
					$objUser->password = $data['password'];
					$objUser->role = $data['role'];
					$arrResult[$count] = $objUser;
					$count++;
				}
			}

			return $arrResult;
		}

		public function getUser()
		{
			$sql = "SELECT * FROM user WHERE id_user='$this->id_user'";

			$result = mysqli_query($this->connection, $sql);

			if (mysqli_num_rows($result) == 1) {
				$this->hasil = true;
				$data = mysqli_fetch_assoc($result);
				$this->id_user = $data['id_user'];
				$this->email = $data['email'];
				$this->name = $data['name'];
				$this->password = $data['password'];
				$this->role = $data['role'];
			}

			return $arrResult;
		}

	}
 ?>