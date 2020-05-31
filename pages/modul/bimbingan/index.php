<?php 
    include 'pages/layouts/header.php';
    include 'pages/authorization-login.php'; 
    require 'Bimbingan.php';
    $objBimbingan = new Bimbingan();
    $arrayResult = $objBimbingan->allBimbingan();
    
     if (isset($_POST['btnSubmitAcc'])) {
        $objBimbingan->id_bimbingan = $_POST['id_bimbingan'];
        $objBimbingan->komentar_pembimbing = $_POST['komentar_pembimbing'];

        $objBimbingan->confirmBimbingan();

        echo "<script> alert('$objBimbingan->message');</script>";
        if ($objBimbingan->result) {
            echo "<script> window.location = 'index.php?p=bimbingan';</script>";
        }
    }elseif (isset($_POST['btnTolak'])) {
        $objBimbingan->id_bimbingan = $_POST['id_bimbingan'];
        $objBimbingan->komentar_pembimbing = $_POST['komentar_pembimbing'];

        $objBimbingan->tolakBimbingan();

        echo "<script> alert('$objBimbingan->message');</script>";
        if ($objBimbingan->result) {
            echo "<script> window.location = 'index.php?p=bimbingan';</script>";
        }
    }
 ?>
<?php include 'pages/layouts/header.php'; ?>
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
                                    <h4 class="card-title">Data Bimbingan Skripsi</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                         <?php 
                                        if ($_SESSION['role'] == 'Mahasiswa') {
                                        ?>
                                            <a href="?p=form-bimbingan" class="btn btn-primary mb-2" title="Tambah Atlet" style="color: #fff">
                                                <i class="feather icon-plus"></i>&nbsp; Tambah Bimbingan Skripsi
                                            </a>
                                            <?php
                                        }
                                        ?>
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Skripsi</th>
                                                        <th>Tanggal</th>
                                                        <th>Topik</th>
                                                        <th>KPI</th>
                                                        <th>Penyelesaian</th>
                                                        <th>Jadwal Berikutnya</th>
                                                        <th>Persetujuan </th>
                                                        <th>Komentar Pembimmbing</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        if (empty($arrayResult)) {
                                                            echo '<tr><td colspan="9"><center><b>Tidak ada data!</b></center></td></tr>';
                                                        }else{
                                                            $no = 1;
                                                            foreach ($arrayResult as $dataBimbingan) {
                                                                echo '<tr>';
                                                                    echo '<td>'.$no++.'</td>';
                                                                    echo '<td>'.$dataBimbingan->judul_skripsi.'</td>';
                                                                    echo '<td>'.$dataBimbingan->tanggal.'</td>';
                                                                    echo '<td>'.$dataBimbingan->topik_bahasan.'</td>';
                                                                    echo '<td>'.$dataBimbingan->kpi.'</td>';
                                                                    echo '<td>'.$dataBimbingan->penyelesaian.'</td>';
                                                                    echo '<td>'.$dataBimbingan->jadwal_berikutnya.'</td>';
                                                                    echo '<td>'.$dataBimbingan->persetujuan.'</td>';
                                                                    echo '<td>'.$dataBimbingan->komentar_pembimbing.'</td>';
                                                                     if ($_SESSION['role'] == 'Mahasiswa') {
                                                                        echo '
                                                                            <td>
                                                                                <a href="index.php?p=form-bimbingan&id_bimbingan='.$dataBimbingan->id_bimbingan.'" class="btn btn-warning mr-1 mb-1 waves-effect waves-light"><i class="fa fa-edit"></i> Edit</a>
                                                                                <a href="index.php?p=delete-bimbingan&id_bimbingan='.$dataBimbingan->id_bimbingan.'" class="btn btn-danger mr-1 mb-1 waves-effect waves-light" onclick="return confirm(\'Apakah anda yakin akan menghapus?\')"><i class="fa fa-trash"></i> Hapus</a>
                                                                            </td>
                                                                        ';
                                                                    }elseif ($_SESSION['role'] == 'Dosen') {
                                                                       echo "
                                                                            <td>
                                                                                <a data-toggle='modal' data-id='$dataBimbingan->id_bimbingan'  data-target='#skripsiModal' class='open-modal btn btn-warning mr-1 mb-1 waves-effect waves-light' style='color:white;'><i class='fa fa-check'></i> Diterima</a>

                                                                                    <a data-toggle='modal'  data-id='$dataBimbingan->id_bimbingan'   data-target='#ditolakModal' class='open-modal btn btn-danger mr-1 mb-1 waves-effect waves-light' style='color:white;'><i class='fa fa-times'></i> Ditolak</a>
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
                   <input type="hidden" name="id_bimbingan" id="skripsiId" value=""/>
                    <div class='form-group'>
                         <div class='form-group'>
                            <label for='name' class='control-label'>Komentar Pembimbing:</label>
                            <textarea name="komentar_pembimbing" class="form-control" placeholder="Komentar Pembimbing"></textarea> 
                        </div>
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
                   <input type="hidden" name="id_bimbingan" id="skripsiId" value=""/>
                     <div class='form-group'>
                        <label for='name' class='control-label'>Komentar Pembimbing:</label>
                        <textarea name="komentar_pembimbing" class="form-control" placeholder="Komentar Pembimbing"></textarea> 
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