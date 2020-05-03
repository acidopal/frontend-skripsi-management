<?php 
	
	class Mahasiswa extends Connection
	{
		public $nim;
		public $nama_mahasiswa;

		public $result = false;
		public $message;


		public function addMahasiswa()
		{
			$sql = "INSERT INTO mahasiswa(nim, nama_mahasiswa)
					VALUES ('$this->nim', '$this->nama_mahasiswa')";

			$this->result = mysqli_query($this->connection, $sql);

			if ($this->result) 
				$this->message = 'Data berhasil ditambahkan!';
			else
				$this->message = 'Data gagal ditambahkan!';
		}

		public function updateMahasiswa()
		{
			$sql = "UPDATE mahasiswa
					SET nim = '$this->nim', nama_mahasiswa = '$this->nama_mahasiswa'
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
					$objMahasiswa->nama = $data['nama'];
					$objMahasiswa->gender = $data['gender'];
					$objMahasiswa->alamat = $data['alamat'];
					$objMahasiswa->angkatan = $data['angkatan'];
					$arrResult[$count] = $objUser;
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