<?php 
    include 'pages/layouts/header.php'; 
    require 'Bimbingan.php';
    require 'pages/modul/user/User.php';
    require 'pages/modul/skripsi/Skripsi.php';

    $objBimbingan = new Bimbingan();
    $arrayResult = $objBimbingan->allBimbingan();

    $objSkripsi = new Skripsi();
    $objSkripsi->nim = $_SESSION['nim'];
    $skripsiList = $objSkripsi->allSkripsiMahasiswa();

    if ($skripsiList > 1) {
        $objBimbingan->id_skripsi = $skripsiList[0]->id_skripsi;
        $dospemList = $objBimbingan->getPembimbingSkripsi();
    }else{
        echo "<script> alert('Pengajuan Skripsi Belum Disetujui!');</script>";
        echo "<script> window.location = 'index.php?p=bimbingan';</script>";
    }

    if (isset($_POST['btnSubmit'])) {
        $objBimbingan->id_skripsi = $_POST['id_skripsi'];
        $objBimbingan->nidn = $_POST['nidn'];
        $objBimbingan->pertemuan_ke = $_POST['pertemuan_ke'];
        $objBimbingan->topik_bahasan = $_POST['topik_bahasan'];
        $objBimbingan->kpi = $_POST['kpi'];
        $objBimbingan->penyelesaian = $_POST['penyelesaian'];
        $objBimbingan->jadwal_berikutnya = $_POST['jadwal_berikutnya'];
        $objBimbingan->tanggal = $_POST['tanggal'];
        $objBimbingan->persetujuan = $_POST['persetujuan'];
        $objBimbingan->tgl_persetujuan = $_POST['tgl_persetujuan'];
        $objBimbingan->komentar_pembimbing = $_POST['komentar_pembimbing'];

        if (isset($_GET['id_bimbingan'])) {
            $objBimbingan->id_bimbingan = $_GET['id_bimbingan'];
            $objBimbingan->updateBimbingan();
        }else{
            $objBimbingan->addBimbingan();
        }

        echo "<script> alert('$objBimbingan->message');</script>";
        if ($objBimbingan->result) {
            echo "<script> window.location = 'index.php?p=bimbingan';</script>";
        }
    }else if (isset($_GET['id_bimbingan'])) {
        $objBimbingan->id_bimbingan = $_GET['id_bimbingan'];
        $objBimbingan->getBimbingan();
    }
?>
  <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                  <section id="row-post-editor">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Form Bimbingan</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                            <a  href="index.php?p=bimbingan"  class="btn btn-warning mr-1 mb-1 waves-effect waves-light">Kembali</a>
                                    <form action="" id="form-konten" class='form-horizontal' method="POST">
                                        <div class="box-body">
                                                <div class='form-group'>
                                                    <label for='name' class='control-label'>Pertemuan Ke:</label>
                                                    <input type="text" name="pertemuan_ke" class="form-control" placeholder="Pertemuan Ke" value="<?php echo $objBimbingan->pertemuan_ke ?>" required="">
                                                </div>     

                                                <div class='form-group'>
                                                    <label for='name' class='control-label'>Tanggal:</label>
                                                    <input type="text" name="tanggal" class="form-control pickadate-months-year" placeholder="Tanggal" value="<?php echo $objBimbingan->tanggal ?>"  required="">
                                                </div>     

                                                <div class='form-group'>
                                                    <label for='name' class='control-label'>Topik Bahasan:</label>
                                                    <textarea type="text" name="topik_bahasan" class="form-control" placeholder="Topik Bahasan" required=""><?php echo $objBimbingan->topik_bahasan ?></textarea>
                                                </div> 

                                                <div class='form-group'>
                                                    <label for='name' class='control-label'>Key Perfomance Indication (KPI):</label>
                                                    <textarea type="text" name="kpi" class="form-control" placeholder="Key Perfomance Indication (KPI)" required=""><?php echo $objBimbingan->kpi ?></textarea>
                                                </div>    

                                                <div class='form-group'>
                                                    <label for='name' class='control-label'>Penyelesaian:</label>
                                                    <textarea type="text" name="penyelesaian" class="form-control" placeholder="Penyelesaian" required=""><?php echo $objBimbingan->penyelesaian ?></textarea>
                                                </div>     

                                                <div class='form-group'>
                                                    <label for='name' class='control-label'>Jadwal Berikutnya:</label>
                                                    <input type="text" name="jadwal_berikutnya" class="form-control pickadate-months-year" placeholder="Jadwal Berikutnya" value="<?php echo $objBimbingan->jadwal_berikutnya ?>" required="">
                                                </div>

                                                 <div class='form-group'>
                                                    <label for='name' class='control-label'>Dosen Pembimbing:</label>
                                                    <select name="nidn" class="form-control">
                                                        <?php 
                                                           foreach ($dospemList as $dospem) {
                                                                $isSelected = "";    
                                                                if($dospem->nama == $objBimbingan->nidn){
                                                                    $isSelected = "selected";
                                                                }
                                                                echo '<option value="'.$dospem->nidn.'"'.$isSelected.'>'.$dospem->nama.'</option>';
                                                           }
                                                         ?>
                                                    </select>
                                                </div>     
                                            </div>
                                            <input type="hidden" name="id_skripsi" value="<?php echo $skripsiList[0]->id_skripsi; ?>">
                                            <input type="hidden" name="persetujuan" value="<?php echo (!is_null($objBimbingan->persetujuan)) ?  $objBimbingan->persetujuan : 0; ?>">
                                            <input type="hidden" name="tgl_persetujuan" value="<?php echo (!is_null($objBimbingan->tgl_persetujuan)) ?  $objBimbingan->tgl_persetujuan : 'NULL';?>">
                                           <input type="hidden" name="komentar_pembimbing" value="<?php echo (!is_null($objBimbingan->komentar_pembimbing)) ?  $objBimbingan->komentar_pembimbing : 'NULL';?>">
                                        </div>

                                       <div class="box-footer mb-5">
                                            <input type="submit" class="btn btn-primary pull-right" value="Simpan" name="btnSubmit">
                                        </div>
                                    </form>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div>
    </div>
</div>
<?php include 'pages/layouts/footer.php'; ?>