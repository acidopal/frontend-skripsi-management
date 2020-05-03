<?php 
	
	class Prodi extends Connection
	{
		public $kode_prodi;
		public $nama_prodi;

		public $result = false;
		public $message;


		public function addProdi()
		{
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
			$sql = "UPDATE prodi
					SET kode_prodi = '$this->kode_prodi', nama_prodi = '$this->nama_prodi'
					WHERE id_prodi = '$this->id_prodi'";

			$this->result = mysqli_query($this->connection, $sql);

			if ($this->result) 
				$this->message = 'Data berhasil diperbarui!';
			else
				$this->message = 'Data gagal diperbarui!';
		}

		public function deleteProdi()
		{
			$sql = "DELETE FROM prodi WHERE id_prodi = '$this->id_prodi'";

			$this->result = mysqli_query($this->connection, $sql);

			if ($this->result) 
				$this->message = 'Data berhasil dihapus!';
			else
				$this->message = $this->id_prodi;
		}


		public function allProdi()
		{
			$sql = "SELECT * FROM prodi";

			$result = mysqli_query($this->connection, $sql);

			$arrResult = Array();
			$count = 0;

			if (mysqli_num_rows($result) > 0) {
				while ($data = mysqli_fetch_array($result)) {
					$objProdi = new Prodi();
					$objProdi->id_prodi = $data['id_prodi'];
					$objProdi->kode_prodi = $data['kode_prodi'];
					$objProdi->nama_prodi = $data['nama_prodi'];
					$arrResult[$count] = $objProdi;
					$count++;
				}
			}

			return $arrResult;
		}

		public function getProdi()
		{
			$sql = "SELECT * FROM prodi WHERE id_prodi='$this->id_prodi'";

			$result = mysqli_query($this->connection, $sql);

			if (mysqli_num_rows($result) == 1) {
				$this->hasil = true;
				$data = mysqli_fetch_assoc($result);
				$this->kode_prodi = $data['kode_prodi'];
				$this->nama_prodi = $data['nama_prodi'];
			}

			return $arrResult;
		}

	}
 ?>