<?php 
	
	class Prodi extends Connection
	{
		public $kode_prodi;
		public $nama_prodi;
		public $kaprodi;

		public $result = false;
		public $message;


		public function addProdi()
		{
			$this->connect();

			$sql = "INSERT INTO prodi(kode_prodi, nama_prodi)
					VALUES ('$this->kode_prodi', '$this->nama_prodi')";

			$this->result = mysqli_query($this->connection, $sql);

			if ($this->result) 
				$this->message = 'Data berhasil ditambahkan!';
			else
				$this->message = 'Data gagal ditambahkan!';
		}

		public function updateProdi()
		{
			$this->connect();

			$sql = "UPDATE prodi
					SET kode_prodi = '$this->kode_prodi', nama_prodi = '$this->nama_prodi'
					WHERE kode_prodi = '$this->kode_prodi'";

			$this->result = mysqli_query($this->connection, $sql);

			if ($this->result) 
				$this->message = 'Data berhasil diperbarui!';
			else
				$this->message = 'Data gagal diperbarui!';
		}

		public function deleteProdi()
		{
			$this->connect();

			$sql = "DELETE FROM prodi WHERE kode_prodi = '$this->kode_prodi'";

			$this->result = mysqli_query($this->connection, $sql);

			if ($this->result) 
				$this->message = 'Data berhasil dihapus!';
			else
				$this->message = $this->kode_prodi;
		}


		public function allProdi()
		{
			$this->connect();

			$sql = "SELECT * FROM `vw_prodi`";

			$result = mysqli_query($this->connection, $sql);

			$arrResult = Array();
			$count = 0;

			if (mysqli_num_rows($result) > 0) {
				while ($data = mysqli_fetch_array($result)) {
					$objProdi = new Prodi();
					$objProdi->kode_prodi = $data['kode_prodi'];
					$objProdi->nama_prodi = $data['nama_prodi'];
					$objProdi->kaprodi = $data['kaprodi'];
					$objProdi->nama_kaprodi = $data['nama_kaprodi'];
					$arrResult[$count] = $objProdi;
					$count++;
				}
			}

			return $arrResult;
		}

		public function getProdi()
		{
			$this->connect();
			
			$sql = "SELECT * FROM `vw_prodi` WHERE kode_prodi='$this->kode_prodi'";

			$result = mysqli_query($this->connection, $sql);

			if (mysqli_num_rows($result) == 1) {
				$this->hasil = true;
				$data = mysqli_fetch_assoc($result);
				$this->kode_prodi = $data['kode_prodi'];
				$this->nama_prodi = $data['nama_prodi'];
				$this->kaprodi = $data['kaprodi'];
			}

			return $arrResult;
		}

	}
 ?>