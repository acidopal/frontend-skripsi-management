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

		public $result = false;
		public $message;


		public function addMahasiswa()
		{
			$sql = "
				INSERT INTO mahasiswa(nim, id_user, kode_prodi, email, gender, alamat, no_telp, angkatan)
				VALUES ('$this->nim', '$this->id_user', '$this->kode_prodi', '$this->email', '$this->gender', '$this->alamat', '$this->no_telp', '$this->angkatan')
			";

			// print_r($this->gender);
			// die();

			$this->result = mysqli_query($this->connection, $sql);

			if ($this->result) 
				$this->message = 'Data berhasil ditambahkan!';
			else
				$this->message = 'Data gagal ditambahkan!';
		}

		public function updateMahasiswa()
		{
			$sql = "UPDATE mahasiswa
					SET nim = '$this->nim', id_user = '$this->id_user', kode_prodi = '$this->kode_prodi', email = '$this->email', gender = '$this->gender', alamat = '$this->alamat', angkatan = '$this->angkatan'
					WHERE nim = '$this->nim'";

			$this->result = mysqli_query($this->connection, $sql);

			if ($this->result) 
				$this->message = 'Data berhasil diperbarui!';
			else
				$this->message = 'Data gagal diperbarui!';
		}

		public function deleteMahasiswa()
		{
			$sql = "DELETE FROM mahasiswa WHERE nim = '$this->nim'";

			$this->result = mysqli_query($this->connection, $sql);

			if ($this->result) 
				$this->message = 'Data berhasil dihapus!';
			else
				$this->message = $this->nidn;
		}


		public function allMahasiswa()
		{
			$sql = "SELECT * FROM mahasiswa";

			$result = mysqli_query($this->connection, $sql);

			$arrResult = Array();
			$count = 0;

			if (mysqli_num_rows($result) > 0) {
				while ($data = mysqli_fetch_array($result)) {
					$objMahasiswa = new Mahasiswa();
					$objMahasiswa->nim = $data['nim'];
					$objMahasiswa->email = $data['email'];
					$objMahasiswa->gender = $data['gender'];
					$objMahasiswa->alamat = $data['alamat'];
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
			$sql = "SELECT * FROM mahasiswa WHERE nim='$this->nim'";

			$result = mysqli_query($this->connection, $sql);

			if (mysqli_num_rows($result) == 1) {
				$this->hasil = true;
				$data = mysqli_fetch_assoc($result);
				$this->nidn = $data['nim'];
				$this->email = $data['email'];
			}

			return $arrResult;
		}

	}
 ?>