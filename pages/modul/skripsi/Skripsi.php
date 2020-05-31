<?php 
     require './lib/mail/Mail.php';

	class Skripsi extends Connection
	{
		public $id_skripsi;
		public $nim;
		public $judul_skripsi;
		public $topik;
		public $abstrak_id;
		public $abstrak_en;
		public $file_proposal;
		public $persetujuan;
		public $alasan;
		public $tgl_persetujuan;
		public $created_date;

		public $email_kaprodi;
		public $email_dosen;
		public $nama_pembimbing;

		public $nidn;

		public $nama;
		public $angkatan;
		public $kode_prodi;

		public $jenis;
		public $search;

		public $result = false;
		public $message;


		public function addSkripsi()
		{
			$this->connect();

			$rand = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz"), 0, 5);
			$id_skripsi = $rand.$this->nim;

			$sql = "INSERT INTO skripsi (id_skripsi, nim, judul_skripsi, topik, abstrak_id, abstrak_en, file_proposal, persetujuan, alasan, tgl_persetujuan, created_date) VALUES ('$id_skripsi' ,'$this->nim', '$this->judul_skripsi','$this->topik', '$this->abstrak_id', '$this->abstrak_en', '$this->file_proposal', NULL,NULL, NULL, '$this->created_date')";

			$this->result = mysqli_query($this->connection, $sql);

			$this->sendMailPendaftaran();

			if ($this->result) {
				$ukuran_maks_file = 2000000;
				$tipe_file= $_FILES['file_proposal']['type'];
				$lokasi_file = $_FILES['file_proposal']['tmp_name'];
				$nama_file = $_FILES['file_proposal']['name'].$rand;
				$ukuran_file = $_FILES['file_proposal']['size'];
				$folder = './upload/file-proposal/';

				if ($tipe_file != "application/pdf" AND $tipe_file != "application/vnd.openxmlformats-officedocument.wordprocessingml.document" AND $tipe_file != "application/msword") {
					echo "<script> alert('Hanya Boleh Mengupload File Bertipe pdf/doc/docx!');</script>";
					echo "<script>window.location = 'index.php?p=dashboard-mahasiswa';</script>";
				}else{
						if ($ukuran_file > $ukuran_maks_file) {
							echo "<script> alert('Ukuran file terlalu besar!');</script>";
							echo "<script>window.location = 'index.php?p=dashboard-mahasiswa';</script>";
						}else{
							$file = scandir($folder, 0);
							if (in_array($nama_file, $file)) {
								echo "<script> alert('File Sudah Tersedia!');</script>";
								echo "<script>window.location = 'index.php?p=dashboard-mahasiswa';</script>";
							}else{
								$isSuccessUpload = move_uploaded_file($lokasi_file, $folder.$nama_file);
							}
						}
				}

				$this->message = 'Data berhasil ditambahkan!';
			}else{
				$this->message = 'Data gagal ditambahkan!';
			}
		}

		public function updateSkripsi()
		{
			$this->connect();

			$sql = "UPDATE skripsi
					SET judul_skripsi = '$this->judul_skripsi', topik = '$this->topik', abstrak_id = '$this->abstrak_id', abstrak_en = '$this->abstrak_en', file_proposal = '$this->file_proposal', persetujuan = '$this->persetujuan', tgl_persetujuan = '$this->tgl_persetujuan', created_date = '$this->created_date', 
					WHERE id_skripsi = '$this->id_skripsi'";

			$this->result = mysqli_query($this->connection, $sql);

			if ($this->result) 
				$this->message = 'Data berhasil diperbarui!';
			else
				$this->message = 'Data gagal diperbarui!';
		}

		public function deleteSkripsi()
		{
			$this->connect();

			$sql = "DELETE FROM skripsi WHERE id_skripsi = '$this->id_skripsi'";

			$this->result = mysqli_query($this->connection, $sql);

			if ($this->result) 
				$this->message = 'Data berhasil dihapus!';
			else
				$this->message = $this->id_skripsi;
		}


		public function confirmSkripsi()
		{
			$this->connect();

			$sql = "UPDATE `skripsi` SET `persetujuan` = '1' WHERE id_skripsi = '$this->id_skripsi'";

			$this->result = mysqli_query($this->connection, $sql);

			if ($this->result) {
				$dateNow = date('Y-m-d');
				$sql = "INSERT INTO `pembimbing_skripsi` (`nidn`, `id_skripsi`, `tgl_dosen_membimbing`) VALUES ('$this->nidn', '$this->id_skripsi', '$dateNow');";
				$this->result = mysqli_query($this->connection, $sql);

				$this->sendMailConfirmasi();

				$this->message = 'Skrispsi berhasil di konfirmasi!';
			}else{
				$this->message = 'Data gagal dieksekusi!';
			}
		}

		public function tolakSkripsi()
		{
			$this->connect();

			$dateNow = date('Y-m-d');
			$sql = "UPDATE `skripsi` SET `persetujuan` = '0', `alasan` = '$this->alasan', `tgl_persetujuan` = '$dateNow' WHERE id_skripsi = '$this->id_skripsi'";

			$this->result = mysqli_query($this->connection, $sql);

			if ($this->result) {
				$this->result = mysqli_query($this->connection, $sql);

				$this->message = 'Skripsi berhasil di tolak!!';
			}else{
				$this->message = 'Data gagal dieksekusi!';
			}
		}


		public function allSkripsi()
		{
			$this->connect();

			$kode_prodi = $_SESSION['kode_prodi'];
			$sql = "SELECT * FROM `vw_skripsi` WHERE kode_prodi = '$kode_prodi' ORDER BY `persetujuan` ASC";

			$result = mysqli_query($this->connection, $sql);

			$arrResult = Array();
			$count = 0;

			if (mysqli_num_rows($result) > 0) {
				while ($data = mysqli_fetch_array($result)) {
					$objSkripsi = new Skripsi();
					$objSkripsi->id_skripsi = $data['id_skripsi'];
				    $objSkripsi->nama = $data['nama'];
				    $objSkripsi->nim = $data['nim'];
				    $objSkripsi->kode_prodi = $data['kode_prodi'];
				    $objSkripsi->angkatan = $data['angkatan'];
					$objSkripsi->judul_skripsi = $data['judul_skripsi'];
					$objSkripsi->topik = $data['topik'];
			        $objSkripsi->abstrak_id = $data['abstrak_id'];
			        $objSkripsi->abstrak_en = $data['abstrak_en'];
			        $objSkripsi->file_proposal = $data['file_proposal'];
			        $objSkripsi->persetujuan = $data['persetujuan'];
			        $objSkripsi->created_date = $data['created_date'];
					$arrResult[$count] = $objSkripsi;
					$count++;
				}
			}

			return $arrResult;
		}


		public function allSkripsiMahasiswa()
		{
			$this->connect();

			$sql = "SELECT * FROM `vw_skripsi` WHERE nim='$this->nim' AND persetujuan=1";

			$result = mysqli_query($this->connection, $sql);

			$arrResult = Array();
			$count = 0;

			if (mysqli_num_rows($result) > 0) {
				while ($data = mysqli_fetch_array($result)) {
					$objSkripsi = new Skripsi();
					$objSkripsi->id_skripsi = $data['id_skripsi'];
				    $objSkripsi->nama = $data['nama'];
				    $objSkripsi->nim = $data['nim'];
				    $objSkripsi->kode_prodi = $data['kode_prodi'];
				    $objSkripsi->angkatan = $data['angkatan'];
					$objSkripsi->judul_skripsi = $data['judul_skripsi'];
					$objSkripsi->topik = $data['topik'];
			        $objSkripsi->abstrak_id = $data['abstrak_id'];
			        $objSkripsi->abstrak_en = $data['abstrak_en'];
			        $objSkripsi->file_proposal = $data['file_proposal'];
			        $objSkripsi->persetujuan = $data['persetujuan'];
			        $objSkripsi->created_date = $data['created_date'];
					$arrResult[$count] = $objSkripsi;
					$count++;
				}
			}

			return $arrResult;
		}

		public function getSkripsi()
		{
			$this->connect();

			$sql = "SELECT * FROM `vw_skripsi` WHERE id_skripsi='$this->id_skripsi'";

			$result = mysqli_query($this->connection, $sql);

			if (mysqli_num_rows($result) == 1) {
				$this->hasil = true;
				$data = mysqli_fetch_assoc($result);
				$this->id_skripsi = $data['id_skripsi'];
			    $this->nama = $data['nama'];
			    $this->nim = $data['nim'];
			    $this->kode_prodi = $data['kode_prodi'];
			    $this->angkatan = $data['angkatan'];
				$this->judul_skripsi = $data['judul_skripsi'];
				$this->topik = $data['topik'];
		        $this->abstrak_id = $data['abstrak_id'];
		        $this->abstrak_en = $data['abstrak_en'];
		        $this->file_proposal = $data['file_proposal'];
		        $this->persetujuan = $data['persetujuan'];
		        $this->created_date = $data['created_date'];
			}
		}

		public function getDataDosen()
		{
			$this->connect();

			$sql  = "SELECT u.nama as nama_pembimbing, d.kode_prodi, u.email as email_dosen FROM dosen d LEFT JOIN user u ON u.id_user = d.id_user WHERE d.nidn = $this->nidn";

			$result = mysqli_query($this->connection, $sql);
			if (mysqli_num_rows($result) == 1) {
				$data = mysqli_fetch_assoc($result);
				$this->nama_pembimbing = $data['nama_pembimbing'];
				$this->email_dosen = $data['email_dosen'];
			}
 		}

		public function getDataMahasiswa()
		{
			$this->connect();

			$sql  = "SELECT u.nama, m.angkatan, m.kode_prodi FROM mahasiswa m LEFT JOIN user u ON u.id_user = m.id_user WHERE m.nim = $this->nim";

			$result = mysqli_query($this->connection, $sql);
			if (mysqli_num_rows($result) == 1) {
				$data = mysqli_fetch_assoc($result);
				$this->nama = $data['nama'];
				$this->angkatan = $data['angkatan'];
				$this->kode_prodi = $data['kode_prodi'];
			}
 		}

		public function getDataKaprodi()
		{
			$this->connect();

			$kode_prodi = $_SESSION['kode_prodi'];

			$sql = "SELECT u.email, d.nidn FROM prodi p LEFT JOIN dosen d ON p.kaprodi = d.nidn LEFT JOIN user u ON u.id_user = d.id_user WHERE p.kode_prodi = '$kode_prodi'";

			$result = mysqli_query($this->connection, $sql);
			if (mysqli_num_rows($result) == 1) {
				$data = mysqli_fetch_assoc($result);
				$this->email_kaprodi = $data['email'];
				$this->nidn = $data['nidn'];
			}
		}

		public function sendMailConfirmasi()
		{
			$this->connect();
			$this->getDataDosen();
			$this->getSkripsi();

			$message = file_get_contents('./lib/mail/template_email.html');
            $header = 'Penugasan Pembimbing Skripsi - '.$this->judul_skripsi.' ('.$this->nama.')';

            $body = '
            <span style="font-familiy: Arial, Helvetios; sans-serif : 15px; color: #5769ye">
             <b>'.$this->nama_pembimbing.'</b>, telah ditunjuk sebagai pembimbing skripsi sebagai berikut : <br> <br></span>

            <span style="font-familiy: Arial, Helvetios; sans-serif : 15px; color: #5769ye">
                    Judul Skripsi : '.$this->judul_skripsi.'<br>
                    Topik : '.$this->topik.'<br>
                    Nama mahasiswa : '.$this->nama.'<br>
                    NIM : '.$this->nim.'<br>
                    Angkatan : '.$this->angkatan.'<br>
                    Prodi : '.$this->kode_prodi.'<br>
            </span>';

            $footer = 'Silahkan <a href="http://s.id/skrispiManagement" target="_blank" class="btn btn-danger block-center">Login</a> untuk melakukan bimbingan.';

            $message = str_replace("#header#", $header, $message);
            $message = str_replace("#body#", $body, $message);
            $message = str_replace("#footer#", $footer, $message);

            $objMail = new Mail();
            $objMail->SendMail($this->email_dosen, $this->email_dosen, 'Penugasan Pembimbing Skripsi - '.$this->judul_skripsi.' ('.$this->nama.')', $message);
		}

		public function sendMailPendaftaran()
		{
			$this->connect();
			$this->getDataKaprodi();
			$this->getDataMahasiswa();

			$message = file_get_contents('./lib/mail/template_email.html');
            $header = 'Pendaftaran Skripsi - '.$this->judul_skripsi.' ('.$this->nama.')';

            $body = '
            <span style="font-familiy: Arial, Helvetios; sans-serif : 15px; color: #5769ye">
             <b>'.$this->nama.' ( '.$this->kode_prodi.' - '.$this->angkatan.')</b>, telah melakukan Pendaftaran Skripsi sebagai berikut : <br> <br></span>

            <span style="font-familiy: Arial, Helvetios; sans-serif : 15px; color: #5769ye">
                    Judul Skripsi : '.$this->judul_skripsi.'<br>
                    Topik : '.$this->topik.'<br>
                    Nama : '.$this->nama.'<br>
                    NIM : '.$this->nim.'<br>
                    Angkatan : '.$this->angkatan.'<br>
                    Prodi : '.$this->kode_prodi.'<br>
            </span>';

            $footer = 'Silahkan <a href="http://s.id/skrispiManagement" target="_blank" class="btn btn-danger block-center">Login</a> untuk melakukan persetujuan.';

            $message = str_replace("#header#", $header, $message);
            $message = str_replace("#body#", $body, $message);
            $message = str_replace("#footer#", $footer, $message);

            $objMail = new Mail();
            $objMail->SendMail($this->email_kaprodi, $this->email_kaprodi, 'Pendaftaran Skripsi - '.$this->judul_skripsi.' ('.$this->nama.')', $message);
		}

		public function searchSkripsi()
		{
			$this->connect();
			
			switch ($this->jenis) {
				case 'tahun':
					$sql = "SELECT * FROM `vw_skripsi` WHERE year(created_date) = '$this->search' ORDER BY `persetujuan` ASC";
					break;
				case 'angkatan':
					$sql = "SELECT * FROM `vw_skripsi` WHERE angkatan = '$this->search' ORDER BY `persetujuan` ASC";
					break;
				case 'kode_prodi':
					$sql = "SELECT * FROM `vw_skripsi` WHERE kode_prodi = '$this->search' ORDER BY `persetujuan` ASC";
					break;
				case 'topik':
					$sql = "SELECT * FROM `vw_skripsi` WHERE topik = '$this->search' ORDER BY `persetujuan` ASC";
					break;
				default:
					# code...
					break;
			}

			if (!empty($sql)) {
				$result = mysqli_query($this->connection, $sql);

				$arrResult = Array();
				$count = 0;

				if (mysqli_num_rows($result) > 0) {
					while ($data = mysqli_fetch_array($result)) {
						$objSkripsi = new Skripsi();
						$objSkripsi->id_skripsi = $data['id_skripsi'];
					    $objSkripsi->nama = $data['nama'];
					    $objSkripsi->nim = $data['nim'];
					    $objSkripsi->kode_prodi = $data['kode_prodi'];
					    $objSkripsi->angkatan = $data['angkatan'];
						$objSkripsi->judul_skripsi = $data['judul_skripsi'];
						$objSkripsi->topik = $data['topik'];
				        $objSkripsi->abstrak_id = $data['abstrak_id'];
				        $objSkripsi->abstrak_en = $data['abstrak_en'];
				        $objSkripsi->file_proposal = $data['file_proposal'];
				        $objSkripsi->persetujuan = $data['persetujuan'];
				        $objSkripsi->created_date = $data['created_date'];
						$arrResult[$count] = $objSkripsi;
						$count++;
					}
				}

				return $arrResult;
			}
		}

		

	}
 ?>