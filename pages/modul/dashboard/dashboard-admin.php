<?php 
  include 'pages/layouts/header.php'; 
  require 'pages/authorization-admin.php';
  require 'pages/modul/skripsi/Skripsi.php';

    $objSkripsi = new Skripsi();

    if (isset($_POST['btnSubmit'])) {
        $objSkripsi->jenis = $_POST['jenis'];
        $objSkripsi->search = $_POST['search'];

         $arrayResult = $objSkripsi->searchSkripsi();

        // die(print_r($arrayResult));

        // echo "<script> alert('$objSkripsi->message');</script>";
        // if ($objSkripsi->result) {
        //     echo "<script> window.location = 'index.php?p=bimbingan';</script>";
        // }
    }

?>

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section id="dashboard">
                <div class="row">
                    <div class="col-md-12 col-12">
                      <form action="#" method="POST">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                  <div class="row">
                                      <div class="col-md-2">
                                            <h2>
                                            Cari Skripsi
                                            </h2>
                                      </div>
                                      <div class="col-md-4">
                                            <fieldset class="form-group position-relative has-icon-left mx-1 my-0 w-100">
                                                <input type="text" class="form-control round" id="chat-search" placeholder="Cari Pendaftaran Skripsi" name="search" value="<?php echo (!is_null($objSkripsi->search)) ?  $objSkripsi->search : ''; ?>">
                                                <div class="form-control-position">
                                                    <i class="feather icon-search"></i>
                                                </div>
                                            </fieldset>
                                      </div>
                                      <div class="col-md-3">
                                            <fieldset class="form-group">
                                                <select class="form-control" id="basicSelect" name="jenis">
                                                    <option value="tahun" <?php echo (($objSkripsi->jenis == 'tahun')) ?  'selected' : ''; ?>>Tahun</option>
                                                    <option value="angkatan" <?php echo (($objSkripsi->jenis == 'angkatan')) ?  'selected' : ''; ?>>Angkatan</option>
                                                    <option value="kode_prodi" <?php echo (($objSkripsi->jenis == 'kode_prodi')) ?  'selected' : ''; ?>>Jurusan</option>
                                                    <option value="topik" <?php echo (($objSkripsi->jenis == 'topik')) ?  'selected' : ''; ?>>Topik</option>
                                                </select>
                                            </fieldset>
                                      </div>
                                      <div class="col-md-3">
                                          <input type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light" value="Cari" name="btnSubmit">
                                      </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                      </form> 
                    </div>
                </div>
            </section>
            <?php  if (!empty($arrayResult)) { ?>
             <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Data Skripsi</h4>
                                     <a href="?p=report-dashboard&j=<?php echo $_POST['jenis']?>&s=<?php echo $_POST['search']?>" class="btn btn-primary mb-2 pull-right" title="Tambah Atlet" style="color: #fff">
                                            <i class="feather icon-plus"></i>&nbsp; Download
                                      </a>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>NIM</th>
                                                        <th>Judul Skripsi</th>
                                                        <th>Topik</th>
                                                        <th>Abstrak</th>
                                                        <th>File Proposal</th>
                                                        <th>Info</th>
                                                        <th>Perstujuan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                     <?php 
                                                        if (empty($arrayResult)) {
                                                            echo '<tr><td colspan="8"><center><b>Tidak ada data!</b></center></td></tr>';
                                                        }else{
                                                            $no = 1;
                                                            foreach ($arrayResult as $dataSkripsi) {
                                                                echo '<tr>';
                                                                    echo '<td>'.$no++.'</td>';
                                                                    echo '<td>'.$dataSkripsi->judul_skripsi.'</td>';
                                                                    echo '<td>'.$dataSkripsi->topik.'</td>';
                                                                    echo '<td>'.$dataSkripsi->abstrak_id.'</td>';
                                                                    echo '<td>'.$dataSkripsi->file_proposal.'</td>';
                                                                    echo '<td>
                                                                        Nama : <b>'.$dataSkripsi->nama.' </b><br>
                                                                        NIM : <b>'.$dataSkripsi->nim.' </b><br>
                                                                        Prodi : <b>'.$dataSkripsi->kode_prodi.' </b><br>
                                                                        Angkatan : <b>'.$dataSkripsi->angkatan.' </b><br>
                                                                        Tgl Pengajuan : <b>'.$dataSkripsi->created_date.' </b><br>
                                                                    </td>';
                                                                    if ($dataSkripsi->persetujuan == NULL) {
                                                                        echo '<td> <b>Menunggu Konfirmasi </b></td>';
                                                                    }elseif ($dataSkripsi->persetujuan == 1) {
                                                                        echo '<td> <b>Disetujui</b></td>';
                                                                    }elseif ($dataSkripsi->persetujuan == 0) {
                                                                        echo '<td> <b>Ditolak</b> </td>';
                                                                    }
                                                                echo '</tr>';
                                                            }
                                                        }
                                                     ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
             </section>
            <?php }else{ ?>
                 <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Data Skripsi</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                       Data Tidak ditemukan
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
             </section>
            <?php }?>
             
        </div>
    </div>
</div>

<?php include 'pages/layouts/footer.php'; ?>