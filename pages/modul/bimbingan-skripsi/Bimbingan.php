<?php 
	
	class Bimbingan extends Connection
	{
		public $id_bimbingan;
		public $id_skripsi;
		public $nidn;
		public $pertemuan_ke;
		public $tanggal;
		public $topik_bahasan;
		public $kpi;
		public $penyelesaian;
		public $jadwal_berikutnya;
		public $persetujuan;
		public $tgl_persetujuan;
		public $komentar_pembimbing;


		public $result = false;
		public $message;


		public function addBimbingan()
		{
			$sql = "INSERT INTO Bimbingan(id_bimbingan, id_skripsi, nidn, pertemuan_ke, tanggal, topik_bahasan, kpi, penyelesaian, persetujuan, jadwal_berikutnya, tgl_persetujuan, komentar_pembimbing)
					VALUES ('$this->id_bimbingan', '$this->id_skripsi', '$this->nidn', '$this->pertemuan_ke', '$this->tanggal', '$this->kpi', '$this->penyelesaian','$this->persetujuan', '$this->jadwal_berikutnya', '$this->tgl_persetujuan', '$this->komentar_pembimbing')";

			$this->result = mysqli_query($this->connection, $sql);

			if ($this->result) 
				$this->message = 'Data berhasil ditambahkan!';
			else
				$this->message = 'Data gagal ditambahkan!';
		}

		public function updateBimbingan()
		{
			$sql = "UPDATE Bimbingan
					SET id_bimbingan = '$this->id_bimbingan', id_skripsi = '$this->id_skripsi', nidn = '$this->nidn', pertemuan_ke = '$this->pertemuan_ke', tanggal = '$this->tanggal', topik_bahasan = '$this->topik_bahasan', penyelesaian = '$this->penyelesaian', persetujuan = '$this->persetujuan' jadwal_berikutnya = '$this->jadwal_berikutnya', tgl_persetujuan = '$this->tgl_persetujuan', komentar_pembimbing = '$this->komentar_pembimbing'
					WHERE id_bimbingan = '$this->id_bimbingan'";

			$this->result = mysqli_query($this->connection, $sql);

			if ($this->result) 
				$this->message = 'Data berhasil diperbarui!';
			else
				$this->message = 'Data gagal diperbarui!';
		}

		public function deleteBimbingan()
		{
			$sql = "DELETE FROM Bimbingan WHERE id_bimbingan = '$this->id_bimbingan'";

			$this->result = mysqli_query($this->connection, $sql);

			if ($this->result) 
				$this->message = 'Data berhasil dihapus!';
			else
				$this->message = $this->nidn;
		}


		public function allBimbingan()
		{
			$sql = "SELECT * FROM Bimbingan";

			$result = mysqli_query($this->connection, $sql);

			$arrResult = Array();
			$count = 0;

			if (mysqli_num_rows($result) > 0) {
				while ($data = mysqli_fetch_array($result)) {
					$objBimbingan = new Bimbingan();
					$objBimbingan->id_bimbingan = $data['id_bimbingan'];
					$objBimbingan->pertemuan_ke = $data['pertemuan_ke'];
					$objBimbingan->nama = $data['nama'];
					$objBimbingan->tanggal = $data['tanggal'];
					$objBimbingan->topik_bahasan = $data['topik_bahasan'];
					$objBimbingan->penyelesaian = $data['penyelesaian'];
					$objBimbingan->persetujuan = $data['persetujuan'];
					$objBimbingan->kpi = $data['kpi'];
					$objBimbingan->jadwal_berikutnya = $data['jadwal_berikutnya'];
					$objBimbingan->tgl_persetujuan = $data['tgl_persetujuan'];
					$objBimbingan->komentar_pembimbing = $data['komentar_pembimbing'];
					$arrResult[$count] = $objUser;
					$count++;
				}
			}

			return $arrResult;
		}

		public function getBimbingan()
		{
			$sql = "SELECT * FROM Bimbingan WHERE id_bimbingan='$this->id_bimbingan'";

			$result = mysqli_query($this->connection, $sql);

			if (mysqli_num_rows($result) == 1) {
				$this->hasil = true;
				$data = mysqli_fetch_assoc($result);
				$this->nidn = $data['id_bimbingan'];
				$this->id_skripsi = $data['id_skripsi'];
			}

			return $arrResult;
		}

	}
 ?>