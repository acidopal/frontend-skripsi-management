<?php 
	
	class Dosen extends Connection
	{
		public $nidn;
		public $nama;
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
			$sql = "INSERT INTO dosen(nidn, id_user, kode_prodi, nama, email, gender, alamat, no_telp)
					VALUES ('$this->nidn', '$this->id_user', '$this->kode_prodi', '$this->nama', '$this->email', '$this->gender', '$this->alamat', '$this->no_telp')";

			$this->result = mysqli_query($this->connection, $sql);

			if ($this->result) 
				$this->message = 'Data berhasil ditambahkan!';
			else
				$this->message = 'Data gagal ditambahkan!';
		}

		public function updateDosen()
		{
			$sql = "UPDATE dosen
					SET nidn = '$this->nidn',id_user = '$this->id_user',kode_prodi = '$this->kode_prodi', nama = '$this->nama', email = '$this->email', gender = '$this->gender', alamat = '$this->alamat', no_telp = '$this->no_telp'
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
					$objDosen->nama = $data['nama'];
					$objDosen->id_user = $data['id_user'];
					$objDosen->kode_prodi = $data['kode_prodi'];
					$objDosen->email = $data['email'];
					$objDosen->gender = $data['gender'];
					$objDosen->alamat = $data['alamat'];
					$objDosen->no_telp = $data['no_telp'];
					$arrResult[$count] = $objDosen;
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
				$this->nama = $data['nama'];
				$this->id_user = $data['id_user'];
				$this->kode_prodi = $data['kode_prodi'];
				$this->email = $data['email'];
				$this->gender = $data['gender'];
				$this->alamat = $data['alamat'];
				$this->no_telp = $data['no_telp'];
			}

			return $arrResult;
		}

	}
 ?>