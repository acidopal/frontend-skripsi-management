<?php 
	
	class Bimbingan extends Connection
	{
		public $id_bimbingan;
		public $id_skripsi;
		public $nama;
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
		public $tgl_dosen_membimbing;

		public $result = false;
		public $message;


		public function addBimbingan()
		{
			$this->connect();

			$id_bimbingan = 'B-'.$this->id_skripsi.'-'.$this->pertemuan_ke;

			$sql = "INSERT INTO bimbingan_skripsi (id_bimbingan, id_skripsi, nidn, pertemuan_ke, tanggal, topik_bahasan, kpi, penyelesaian, jadwal_berikutnya, persetujuan, tgl_persetujuan, komentar_pembimbing) VALUES ('$id_bimbingan', '$this->id_skripsi', '$this->nidn', '$this->pertemuan_ke', '$this->tanggal', '$this->topik_bahasan', '$this->kpi', '$this->penyelesaian', '$this->jadwal_berikutnya', '0', NULL, NULL);";

			$this->result = mysqli_query($this->connection, $sql);

			if ($this->result){
				$this->message = 'Berhasil Menambahkan Bimbingan Skripsi ('.$this->id_skripsi.')';
			}else{
				$this->message = 'Data gagal ditambahkan!';
			}
		}

		public function updateBimbingan()
		{
			$this->connect();

			$sql = "UPDATE bimbingan_skripsi
					SET id_skripsi = '$this->id_skripsi', nidn = '$this->nidn', pertemuan_ke = '$this->pertemuan_ke', tanggal = '$this->tanggal', topik_bahasan = '$this->topik_bahasan', kpi = '$this->kpi', penyelesaian = '$this->penyelesaian',  jadwal_berikutnya = '$this->jadwal_berikutnya',  persetujuan = '$this->persetujuan', tgl_persetujuan = NULL,  komentar_pembimbing = NULL
					WHERE id_bimbingan = '$this->id_bimbingan'";

			$this->result = mysqli_query($this->connection, $sql);

			if ($this->result){
				$this->message = 'Berhasil Memperbarui Bimbingan Skripsi ('.$this->id_skripsi.')';
			 }else{
				$this->message = 'Data gagal diperbarui!';
			}
		}

		public function deleteBimbingan()
		{
			$this->connect();

			$sql = "SELECT * FROM vw_bimbingan WHERE id_bimbingan = '$this->id_bimbingan'";

			$this->result = mysqli_query($this->connection, $sql);

			if ($this->result) 
				$this->message = 'Data berhasil dihapus!';
			else
				$this->message = $this->nidn;
		}


		public function allBimbingan()
		{
			$this->connect();

			if ($_SESSION['role'] == 'Mahasiswa') {
				$id_user = $_SESSION['id_user'];
				$sql = "SELECT * FROM vw_bimbingan WHERE id_user = $id_user";
			}elseif ($_SESSION['role'] == 'Dosen') {
				$nidn = $_SESSION['nidn'];
				$sql = "SELECT * FROM vw_bimbingan WHERE nidn = $nidn ORDER BY `vw_bimbingan`.`persetujuan` ASC";
			}

			$result = mysqli_query($this->connection, $sql);

			$arrResult = Array();
			$count = 0;

			if (mysqli_num_rows($result) > 0) {
				while ($data = mysqli_fetch_array($result)) {
					$objBimbingan = new Bimbingan();
					$objBimbingan->id_bimbingan = $data['id_bimbingan'];
					$objBimbingan->judul_skripsi = $data['judul_skripsi'];
					$objBimbingan->nama = $data['nama'];
					$objBimbingan->tanggal = $data['tanggal'];
					$objBimbingan->topik_bahasan = $data['topik_bahasan'];
					$objBimbingan->kpi = $data['kpi'];
					$objBimbingan->penyelesaian = $data['penyelesaian'];
					$objBimbingan->jadwal_berikutnya = $data['jadwal_berikutnya'];
					$objBimbingan->persetujuan = $data['persetujuan'];
					$objBimbingan->tgl_persetujuan = $data['tgl_persetujuan'];
					$objBimbingan->komentar_pembimbing = $data['komentar_pembimbing'];
					$objBimbingan->angkatan = $data['angkatan'];
					$objBimbingan->kode_prodi = $data['kode_prodi'];
				
					$arrResult[$count] = $objBimbingan;
					$count++;
				}
			}

			return $arrResult;
		}

		public function getBimbingan()
		{
			$this->connect();

			$sql = "SELECT * FROM vw_bimbingan WHERE id_bimbingan='$this->id_bimbingan'";

			$result = mysqli_query($this->connection, $sql);

			if (mysqli_num_rows($result) == 1) {
				$this->hasil = true;
				$data = mysqli_fetch_assoc($result);
				$this->id_bimbingan = $data['id_bimbingan'];
				$this->pertemuan_ke = $data['pertemuan_ke'];
				$this->nama = $data['nama'];
				$this->tanggal = $data['tanggal'];
				$this->topik_bahasan = $data['topik_bahasan'];
				$this->kpi = $data['kpi'];
				$this->penyelesaian = $data['penyelesaian'];
				$this->jadwal_berikutnya = $data['jadwal_berikutnya'];
				$this->persetujuan = $data['persetujuan'];
				$this->tgl_persetujuan = $data['tgl_persetujuan'];
				$this->komentar_pembimbing = $data['komentar_pembimbing'];
				$this->angkatan = $data['angkatan'];
				$this->kode_prodi = $data['kode_prodi'];
				$this->nidn = $data['nidn'];
			}
		}

		public function getPembimbingSkripsi()
		{
			$this->connect();

			$sql = "SELECT * FROM vw_dospem WHERE id_skripsi='$this->id_skripsi'";

			$result = mysqli_query($this->connection, $sql);
			$arrResult = Array();
			$count = 0;

			if (mysqli_num_rows($result) > 0) {
				while ($data = mysqli_fetch_array($result)) {
					$objBimbingan = new Bimbingan();
					$objBimbingan->nidn = $data['nidn'];
					$objBimbingan->nama = $data['nama'];
				
					$arrResult[$count] = $objBimbingan;
					$count++;
				}
			}

			return $arrResult;
		}

		public function confirmBimbingan()
		{
			$this->connect();

			$dateNow = date('Y-m-d');
			$sql = "UPDATE `bimbingan_skripsi` SET `persetujuan` = '1', `komentar_pembimbing` = '$this->komentar_pembimbing', `tgl_persetujuan` = '$dateNow' WHERE id_bimbingan = '$this->id_bimbingan'";

			$this->result = mysqli_query($this->connection, $sql);

			if ($this->result) {
				$dateNow = date('Y-m-d');
				$sql = "INSERT INTO `pembimbing_skripsi` (`nidn`, `id_bimbingan`, `tgl_dosen_membimbing`) VALUES ('$this->nidn', '$this->id_bimbingan', '$dateNow');";
				$this->result = mysqli_query($this->connection, $sql);

				$this->message = 'Bimbingan berhasil di konfirmasi!';
			}else{
				$this->message = 'Data gagal dieksekusi!';
			}
		}

		public function tolakBimbingan()
		{
			$this->connect();
			
			$dateNow = date('Y-m-d');
			$sql = "UPDATE `bimbingan_skripsi` SET `persetujuan` = '1', `komentar_pembimbing` = '$this->komentar_pembimbing', `tgl_persetujuan` = '$dateNow' WHERE id_bimbingan = '$this->id_bimbingan'";

			$this->result = mysqli_query($this->connection, $sql);

			if ($this->result) {
				$this->result = mysqli_query($this->connection, $sql);

				$this->message = 'Bimbingan berhasil di tolak!!';
			}else{
				$this->message = 'Data gagal dieksekusi!';
			}
		}


	}
 ?>