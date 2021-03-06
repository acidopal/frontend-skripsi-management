<?php 
    include 'pages/layouts/header.php';
    include 'pages/authorization-admin.php'; 
    require 'Mahasiswa.php';
    $objMahasiswa = new Mahasiswa();
    $arrayResult = $objMahasiswa->allMahasiswa();
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
                                    <h4 class="card-title">Data Mahasiswa</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <a href="?p=form-mahasiswa" class="btn btn-primary mb-2" title="Tambah Atlet" style="color: #fff">
                                            <i class="feather icon-plus"></i>&nbsp; Tambah Mahasiswa
                                        </a>
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>NIM</th>
                                                        <th>Nama</th>
                                                        <th>Gender</th>
                                                        <th>Alamat</th>
                                                        <th>No . Telp</th>
                                                        <th>Prodi </th>
                                                        <th>Angkatan </th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                     <?php 
                                                        if (empty($arrayResult)) {
                                                            echo '<tr><td colspan="9"><center><b>Tidak ada data!</b></center></td></tr>';
                                                        }else{
                                                            $no = 1;
                                                            foreach ($arrayResult as $dataMahasiswa) {
                                                                echo '<tr>';
                                                                    echo '<td>'.$no++.'</td>';
                                                                    echo '<td>'.$dataMahasiswa->nim.'</td>';
                                                                    echo '<td>'.$dataMahasiswa->nama.'</td>';
                                                                    echo '<td>'.$dataMahasiswa->gender.'</td>';
                                                                    echo '<td>'.$dataMahasiswa->alamat.'</td>';
                                                                    echo '<td>'.$dataMahasiswa->no_telp.'</td>';
                                                                    echo '<td>'.$dataMahasiswa->kode_prodi.'</td>';
                                                                    echo '<td>'.$dataMahasiswa->angkatan.'</td>';
                                                                    echo '
                                                                        <td>
                                                                            <a href="index.php?p=form-mahasiswa&nim='.$dataMahasiswa->nim.'" class="btn btn-warning mr-1 mb-1 waves-effect waves-light"><i class="fa fa-edit"></i> Edit</a>
                                                                            <a href="index.php?p=delete-mahasiswa&nim='.$dataMahasiswa->nim.'" class="btn btn-danger mr-1 mb-1 waves-effect waves-light" onclick="return confirm(\'Apakah anda yakin akan menghapus?\')"><i class="fa fa-trash"></i> Hapus</a>
                                                                        </td>

                                                                    ';
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
<?php include 'pages/layouts/footer.php'; ?>