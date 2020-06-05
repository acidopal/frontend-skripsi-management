<?php 
    include 'pages/layouts/header.php';
    require 'pages/modul/dosen/Dosen.php';
    require 'Skripsi.php';
    
    $objSkripsi = new Skripsi();

    $objDosen = new Dosen();
    $dosenList = $objDosen->allDosen();

    if ($_SESSION['role'] == 'Dosen' || $_SESSION['role'] == 'Mahasiswa') {
        $arrayResult = $objSkripsi->allSkripsi();

       if ($_SESSION['is_kaprodi'] == 1) {
             if (isset($_POST['btnSubmitAcc'])) {
                $objSkripsi->nidn = $_POST['nidn'];
                $objSkripsi->id_skripsi = $_POST['id_skripsi'];

                $objSkripsi->confirmSkripsi();

                echo "<script> alert('$objSkripsi->message');</script>";
                if ($objSkripsi->result) {
                    echo "<script> window.location = 'index.php?p=skripsi';</script>";
                }
            }elseif (isset($_POST['btnTolak'])) {
                $objSkripsi->id_skripsi = $_POST['id_skripsi'];
                $objSkripsi->alasan = $_POST['alasan'];

                $objSkripsi->tolakSkripsi();

                echo "<script> alert('$objSkripsi->message');</script>";
                if ($objSkripsi->result) {
                    echo "<script> window.location = 'index.php?p=skripsi';</script>";
                }
            }
        }
    }
 ?>
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                 <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Data Skripsi</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <?php 
                                        if ($_SESSION['role'] == 'Mahasiswa' && empty($arrayResult)) {
                                        ?>
                                            <a href="?p=form-skripsi" class="btn btn-primary mb-2" title="Tambah Atlet" style="color: #fff">
                                                <i class="feather icon-plus"></i>&nbsp; Pendaftaran Skripsi
                                            </a>
                                            <?php
                                        }
                                        ?>
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>NIM</th>
                                                        <th>Judul Skripsi</th>
                                                        <th width="10%">Topik</th>
                                                        <th>Abstrak</th>
                                                        <th>File Proposal</th>
                                                        <th width="20%">Info</th>
                                                        <th width="10%">Perstujuan</th>
                                                        <th>Action</th>
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
                                                                     if ($_SESSION['role'] == 'Mahasiswa') {
                                                                        echo '
                                                                            <td>
                                                                                <a href="index.php?p=form-skripsi&id_skripsi='.$dataSkripsi->id_skripsi.'" class="btn btn-warning mr-1 mb-1 waves-effect waves-light"><i class="fa fa-edit"></i> Edit</a>
                                                                                <a href="index.php?p=delete-skripsi&id_skripsi='.$dataSkripsi->id_skripsi.'" class="btn btn-danger mr-1 mb-1 waves-effect waves-light" onclick="return confirm(\'Apakah anda yakin akan menghapus?\')"><i class="fa fa-trash"></i> Hapus</a>
                                                                            </td>
                                                                        ';
                                                                    }elseif ($_SESSION['role'] == 'Dosen') {
                                                                       echo "
                                                                            <td>
                                                                                <a data-toggle='modal' data-id='$dataSkripsi->id_skripsi'  data-target='#skripsiModal' class='open-modal btn btn-warning mr-1 mb-1 waves-effect waves-light' style='color:white;'><i class='fa fa-check'></i> Diterima</a>

                                                                                    <a data-toggle='modal'  data-id='$dataSkripsi->id_skripsi'   data-target='#ditolakModal' class='open-modal btn btn-danger mr-1 mb-1 waves-effect waves-light' style='color:white;'><i class='fa fa-times'></i> Ditolak</a>
                                                                            </td>
                                                                        ";
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
            </div>
        </div>
    </div>

    <div class="modal fade" id="skripsiModal" tabindex="-1" role="dialog" aria-labelledby="skripsiModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="skripsiModalTitle">Konfirmasi Skripsi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" id="form-konten" class='form-horizontal' method="POST">
                <div class="modal-body">
                   <input type="hidden" name="id_skripsi" id="skripsiId" value=""/>
                    <div class='form-group'>
                        <label for='nidn' class='control-label'>Dosen Pembimbing :</label>
                         <select name="nidn" class="form-control">
                            <?php 
                              foreach ($dosenList as $dosen) {
                                echo '<option value='.$dosen->nidn.'>'.$dosen->nama.' ('.$dosen->nidn.')'.'</option>';
                              }
                             ?>
                        </select>
                    </div>   
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary pull-right" value="Diterima" name="btnSubmitAcc">
                </div>
                </form>
            </div>
        </div>
    </div>

     <div class="modal fade text-left" id="ditolakModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger white">
                    <h5 class="modal-title" id="myModalLabel120">Konfirmasi Skripsi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" id="form-konten" class='form-horizontal' method="POST">
                <div class="modal-body">
                   <input type="hidden" name="id_skripsi" id="skripsiId" value=""/>
                    <div class='form-group'>
                        <label for='name' class='control-label'>Alasan:</label>
                        <textarea name="alasan" class="form-control" placeholder="Alasan"></textarea> 
                    </div> 
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-danger pull-right" value="Ditolak" name="btnTolak">
                </div>
                </form>
            </div>
        </div>
    </div>
<?php include 'pages/layouts/footer.php'; ?>