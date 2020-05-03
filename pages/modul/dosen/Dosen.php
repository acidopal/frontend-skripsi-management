<?php 
	
	class Dosen extends Connection
	{
		public $nidn;
		public $nama_dosen;
		public $kode_prodi;
		public $id_user;
		public $email;
		public $gender;
		public $alamat;
		public $no_telp;

		public $result = false;
		public $message;


		public function addDosen()
		{
			$sql = "INSERT INTO dosen(nidn, nama_dosen, email, gender, alamat, no_telp)
					VALUES ('$this->nidn', '$this->id_user', '$this->kode_prodi', '$this->nama_dosen', '$this->email', '$this->gender', '$this->alamat', '$this->no_telp')";

			$this->result = mysqli_query($this->connection, $sql);

			if ($this->result) 
				$this->message = 'Data berhasil ditambahkan!';
			else
				$this->message = 'Data gagal ditambahkan!';
		}

		public function updateDosen()
		{
			$sql = "UPDATE dosen
					SET nidn = '$this->nidn',id_user = '$this->id_user',kode_prodi = '$this->kode_prodi', nama_dosen = '$this->nama_dosen', email = '$this->email', gender = '$this->gender', alamat = '$this->alamat', no_telp = '$this->no_telp'
					WHERE nidn = '$this->nidn'";

			$this->result = mysqli_query($this->connection, $sql);

			if ($this->result) 
				$this->message = 'Data berhasil diperbarui!';
			else
				$this->message = 'Data gagal diperbarui!';
		}

		public function deleteDosen()
		{
			$sql = "DELETE FROM dosen WHERE nidn = '$this->nidn'";

			$this->result = mysqli_query($this->connection, $sql);

			if ($this->result) 
				$this->message = 'Data berhasil dihapus!';
			else
				$this->message = $this->nidn;
		}


		public function allDosen()
		{
			$sql = "SELECT * FROM dosen";

			$result = mysqli_query($this->connection, $sql);

			$arrResult = Array();
			$count = 0;

			if (mysqli_num_rows($result) > 0) {
				while ($data = mysqli_fetch_array($result)) {
					$objDosen = new Dosen();
					$objDosen->nidn = $data['nidn'];
					$objDosen->nama_dosen = $data['nama_dosen'];
					$objDosen->email = $data['email'];
					$objDosen->nama = $data['nama'];
					$objDosen->gender = $data['gender'];
					$objDosen->alamat = $data['alamat'];
					$arrResult[$count] = $objUser;
					$count++;
				}
			}

			return $arrResult;
		}

		public function getDosen()
		{
			$sql = "SELECT * FROM dosen WHERE nidn='$this->nidn'";

			$result = mysqli_query($this->connection, $sql);

			if (mysqli_num_rows($result) == 1) {
				$this->hasil = true;
				$data = mysqli_fetch_assoc($result);
				$this->nidn = $data['nidn'];
				$this->email = $data['email'];
			}

			return $arrResult;
		}

	}
 ?>