<?php 
	
	class Dosen extends Connection
	{
		public $old_nidn;
		public $nidn;
		public $kode_prodi;
		public $id_user;
		public $nama;
		public $role;
		public $email;
		public $gender;
		public $alamat;
		public $no_telp;
		public $password;
		public $last_id='';

		public $result = false;
		public $message;


		public function addDosen()
		{
			$this->connect();

			$sql = "INSERT INTO user(nama, email, password, role, gender, alamat, no_telp)
					VALUES ('$this->nama', '$this->email', '$this->password', '$this->role', null, null, null)";

			if (mysqli_query($this->connection, $sql)) {
			  $this->last_id = mysqli_insert_id($this->connection);
			} else {
			  echo "Error: " . $sql . "<br>" . mysqli_error($this->connection);
			}
			if ($this->last_id > 0) {
				$sql = "INSERT INTO dosen(nidn, id_user, kode_prodi)
					VALUES ('$this->nidn', '$this->last_id', '$this->kode_prodi')";
					$this->result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));;
			}

			if ($this->result) 
				$this->message = 'Data berhasil ditambahkan!';
			else
				$this->message = 'Data gagal ditambahkan!';
		}

		public function updateDosen()
		{
			$this->connect();

			$sql = "UPDATE dosen
					SET nidn = '$this->nidn', id_user = '$this->id_user',kode_prodi = '$this->kode_prodi'
					WHERE nidn = '$this->old_nidn'";

			$this->result = mysqli_query($this->connection, $sql);

			if ($this->result) 
				$this->message = 'Data berhasil diperbarui!';
			else
				$this->message = 'Data gagal diperbarui!';
		}

		public function deleteDosen()
		{
			$this->connect();

			$sql = "DELETE FROM dosen WHERE nidn = '$this->nidn'";

			$this->result = mysqli_query($this->connection, $sql);

			if ($this->result) 
				$this->message = 'Data berhasil dihapus!';
			else
				$this->message = $this->nidn;
		}


		public function allDosen()
		{
			$this->connect();

			$sql = "SELECT * FROM `vw_dosen`";

			$result = mysqli_query($this->connection, $sql);

			$arrResult = Array();
			$count = 0;

			if (mysqli_num_rows($result) > 0) {
				while ($data = mysqli_fetch_array($result)) {
					$objDosen = new Dosen();
					$objDosen->nidn = $data['nidn'];
					$objDosen->id_user = $data['id_user'];
					$objDosen->nama = $data['nama'];
					$objDosen->email = $data['email'];
					$objDosen->gender = $data['gender'];
					$objDosen->alamat = $data['alamat'];
					$objDosen->kode_prodi = $data['kode_prodi'];
					$objDosen->no_telp = $data['no_telp'];
					$objDosen->role = $data['role'];
					$arrResult[$count] = $objDosen;
					$count++;
				}
			}

			return $arrResult;
		}

		public function getDosen()
		{
			$this->connect();
			
			$sql = "SELECT * FROM `vw_dosen`  WHERE nidn='$this->nidn'";

			$result = mysqli_query($this->connection, $sql);

			if (mysqli_num_rows($result) == 1) {
				$this->hasil = true;
				$data = mysqli_fetch_assoc($result);
				$this->nidn = $data['nidn'];
				$this->id_user = $data['id_user'];
				$this->nama = $data['nama'];
				$this->email = $data['email'];
				$this->gender = $data['gender'];
				$this->alamat = $data['alamat'];
				$this->password = $data['password'];
				$this->kode_prodi = $data['kode_prodi'];
				$this->no_telp = $data['no_telp'];
				$this->role = $data['role'];
			}
		}

	}
 ?>