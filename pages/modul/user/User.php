<?php 
	include './pages/modul/mahasiswa/Mahasiswa.php';

	class User extends Connection
	{
		public $id_user;
		public $nama;
		public $password;
		public $old_password;
		public $role;
		public $email;
		public $gender;
		public $alamat;
		public $no_telp;
		public $is_kaprodi;

		public $result = false;
		public $message;

		public $mahasiswa;

		function __construct() {						
			$this->mahasiswa = new Mahasiswa();
		}

		public function addUser()
		{
			$this->connect();
			
			$sql = "INSERT INTO user(nama, email, password, role, gender, alamat, no_telp)
					VALUES ('$this->nama',  '$this->email', '$this->password', '$this->role', '$this->gender', '$this->alamat', '$this->no_telp')";

			$this->result = mysqli_query($this->connection, $sql);

			if ($this->result) 
				$this->message = 'Data berhasil ditambahkan!';
			else
				$this->message = 'Data gagal ditambahkan!';
		}

		public function updateUser()
		{
			$this->connect();

			$sql = "UPDATE user
					SET id_user = '$this->id_user', nama = '$this->nama', email = '$this->email', password = '$this->password', role = '$this->role', gender =  '$this->gender', alamat = '$this->alamat', no_telp = '$this->no_telp'
					WHERE id_user = '$this->id_user'";

			// die(print_r($sql));

			$this->result = mysqli_query($this->connection, $sql);

			if ($this->result) 
				$this->message = 'Data berhasil diperbarui!';
			else
				$this->message = 'Data gagal diperbarui!';
		}

		public function deleteUser()
		{
			$this->connect();

			$sql = "DELETE FROM user WHERE id_user = '$this->id_user'";

			$this->result = mysqli_query($this->connection, $sql);

			if ($this->result) 
				$this->message = 'Data berhasil dihapus!';
			else
				$this->message = $this->id_user;
		}


		public function allUser()
		{
			$this->connect();

			$sql = "SELECT * FROM user";

			$result = mysqli_query($this->connection, $sql);

			$arrResult = Array();
			$count = 0;

			if (mysqli_num_rows($result) > 0) {
				while ($data = mysqli_fetch_array($result)) {
					$objUser = new User();
					$objUser->id_user = $data['id_user'];
					$objUser->email = $data['email'];
					$objUser->password = $data['password'];
					$objUser->role = $data['role'];				
					$objUser->nama = $data['nama'];	
					$objUser->gender = $data['gender'];
					$objUser->alamat = $data['alamat'];
					$objUser->no_telp = $data['no_telp'];			
					$arrResult[$count] = $objUser;
					$count++;
				}
			}

			return $arrResult;
		}

		public function getUser()
		{
			$this->connect();

			$sql = "SELECT * FROM user WHERE id_user='$this->id_user'";

			$result = mysqli_query($this->connection, $sql);

			if (mysqli_num_rows($result) == 1) {
				$this->hasil = true;
				$data = mysqli_fetch_assoc($result);
				$this->id_user = $data['id_user'];
				$this->email = $data['email'];
				$this->password = $data['password'];
				$this->role = $data['role'];
				$this->nama = $data['nama'];
				$this->email = $data['email'];
				$this->gender = $data['gender'];
				$this->alamat = $data['alamat'];
				$this->no_telp = $data['no_telp'];
			}
		}

		public function registerUser()
		{
			$this->connect();

			$sql = "INSERT INTO user(nama, email, password, role, gender, alamat, no_telp)
					VALUES ('$this->nama', '$this->email', '$this->password', '$this->role', null, null, null)";

			if (mysqli_query($this->connection, $sql)) {
			  $this->id_user = mysqli_insert_id($this->connection);
			} else {
			  echo "Error: " . $sql . "<br>" . mysqli_error($this->connection);
			}
			if ($this->id_user > 0) {
				$sql = "INSERT INTO mahasiswa(nim, id_user, kode_prodi, angkatan)
					VALUES ('".$this->mahasiswa->nim."', '$this->id_user', '".$this->mahasiswa->kode_prodi."', '".$this->mahasiswa->angkatan."')";

					$this->result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));;
			}

			if ($this->result) 
				$this->message = 'Data berhasil ditambahkan!';
			else
				$this->message = 'Data gagal ditambahkan!';
		}	

		public function validateEmail($email)
		{
			$this->connect();

			$sql = "SELECT * FROM user
					WHERE email = '$email'";

			$result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));;
			
			if (mysqli_num_rows($result) == 1) {
				$this->result = true;
			}
		}

		public function validateLogin($email, $password)
		{
			$this->connect();

			$sql = "SELECT * FROM user WHERE email = '$email'";

			$result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));
			
			if (mysqli_num_rows($result) == 1) {
				$this->result = true;
				$data = mysqli_fetch_assoc($result);
				$this->id_user = $data['id_user'];
				$this->nama = $data['nama'];
				$this->email = $data['email'];
				$this->role = $data['role'];
				$this->password = $data['password'];

				if ($data['role'] == 'Mahasiswa') {
					$sql = "SELECT * FROM mahasiswa WHERE id_user = '$this->id_user'";
					$resultMahasiswa = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));
					if (mysqli_num_rows($result) == 1) {
						$dataMahasiswa = mysqli_fetch_assoc($resultMahasiswa);
						$this->nim = $dataMahasiswa['nim'];
						$this->kode_prodi = $dataMahasiswa['kode_prodi'];
						$this->result = true;
					}
				}elseif ($data['role'] == 'Dosen') {
					$sql = "SELECT * FROM dosen WHERE id_user = '$this->id_user'";
					$resultDosen = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));
					if (mysqli_num_rows($result) == 1) {
						$dataDosen = mysqli_fetch_assoc($resultDosen);
						$this->nidn = $dataDosen['nidn'];
						$this->kode_prodi = $dataDosen['kode_prodi'];
						$this->getDataKaprodi();
						$this->result = true;
					}
				}

				if(password_verify($password, $this->password)) {
			 		return $result = false;
				} 
			}
		}

		public function getDataKaprodi()
		{
			$this->connect();

			$kode_prodi = $this->kode_prodi;

			$sql = "SELECT u.email, d.nidn FROM prodi p LEFT JOIN dosen d ON p.kaprodi = d.nidn LEFT JOIN user u ON u.id_user = d.id_user WHERE p.kode_prodi = '$kode_prodi'";

			$result = mysqli_query($this->connection, $sql);
			if (mysqli_num_rows($result) == 1) {
				$data = mysqli_fetch_assoc($result);

				if ($data['nidn'] == $this->nidn) {
					$this->is_kaprodi = 1;
				}else{
					$this->is_kaprodi = 0;
				}
			}
		}

	}
 ?>