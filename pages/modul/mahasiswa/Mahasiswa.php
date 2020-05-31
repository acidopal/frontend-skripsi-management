<?php 
	class Mahasiswa extends Connection
	{
		public $nim;
		public $id_user;
		public $kode_prodi;
		public $email;
		public $gender;
		public $alamat;
		public $no_telp;
		public $angkatan;
		public $old_nim;

		public $nama='';
		public $password;
		public $role='';

		public $result = false;
		public $message;

		public function addMahasiswa()
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
					VALUES ('$this->nim', '$this->id_user', '$this->kode_prodi', '$this->angkatan')";
					$this->result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));;
			}

			if ($this->result) 
				$this->message = 'Data berhasil ditambahkan!';
			else
				$this->message = 'Data gagal ditambahkan!';
		}

		public function updateMahasiswa()
		{
			$this->connect();

			$sql = "UPDATE mahasiswa
					SET nim = '$this->nim', id_user = '$this->id_user',kode_prodi = '$this->kode_prodi',angkatan = '$this->angkatan'
					WHERE nim = '$this->old_nim'";

			$this->result = mysqli_query($this->connection, $sql);

			$sql = "UPDATE user
					SET id_user = '$this->id_user', nama = '$this->nama', email = '$this->email', password = '$this->password', role = '$this->role', gender =  '$this->gender', alamat = '$this->alamat', no_telp = $this->no_telp
					WHERE id_user = '$this->id_user'";

			$this->result = mysqli_query($this->connection, $sql);

			if ($this->result) {
				$this->message = 'Data berhasil diperbarui!';
			}else{
				$this->message = 'Data gagal diperbarui!';
			}
		}

		public function deleteMahasiswa()
		{
			$this->connect();

			$sql = "SELECT * FROM `vw_mahasiswa` WHERE nim = '$this->nim'";

			$this->result = mysqli_query($this->connection, $sql);

			if ($this->result) 
				$this->message = 'Data berhasil dihapus!';
			else
				$this->message = $this->nidn;
		}


		public function allMahasiswa()
		{
			$this->connect();

			$sql = "SELECT * FROM `vw_mahasiswa`";

			$result = mysqli_query($this->connection, $sql);

			$arrResult = Array();
			$count = 0;

			if (mysqli_num_rows($result) > 0) {
				while ($data = mysqli_fetch_array($result)) {
					$objMahasiswa = new Mahasiswa();
					$objMahasiswa->id_user = $data['id_user'];
					$objMahasiswa->nim = $data['nim'];
					$objMahasiswa->nama = $data['nama'];
					$objMahasiswa->email = $data['email'];
					$objMahasiswa->gender = $data['gender'];
					$objMahasiswa->alamat = $data['alamat'];
					$objMahasiswa->kode_prodi = $data['kode_prodi'];
					$objMahasiswa->angkatan = $data['angkatan'];
					$objMahasiswa->no_telp = $data['no_telp'];
					$arrResult[$count] = $objMahasiswa;
					$count++;
				}
			}

			return $arrResult;
		}

		public function getMahasiswa()
		{
			$this->connect();
			
			$sql = "SELECT * FROM `vw_mahasiswa` WHERE nim='$this->nim'";

			$result = mysqli_query($this->connection, $sql);

			if (mysqli_num_rows($result) == 1) {
				$this->hasil = true;
				$data = mysqli_fetch_assoc($result);
				$this->id_user = $data['id_user'];
				$this->nim = $data['nim'];
				$this->nama = $data['nama'];
				$this->email = $data['email'];
				$this->gender = $data['gender'];
				$this->alamat = $data['alamat'];
				$this->kode_prodi = $data['kode_prodi'];
				$this->angkatan = $data['angkatan'];
				$this->no_telp = $data['no_telp'];
				$this->password = $data['password'];
			}
		}

	}
 ?>