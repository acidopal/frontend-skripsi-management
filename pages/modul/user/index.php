<?php 
    include 'pages/layouts/header.php';
    include 'pages/authorization-admin.php'; 
    require 'User.php';
    $objUser = new User();
    $arrayResult = $objUser->allUser();
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
                                    <h4 class="card-title">Data User</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <a href="?p=form-user" class="btn btn-primary mb-2" title="Tambah Atlet" style="color: #fff">
                                            <i class="feather icon-plus"></i>&nbsp; Tambah User
                                        </a>
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Email </th>
                                                        <th>Role </th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                     <?php 
                                                        if (empty($arrayResult)) {
                                                            echo '<tr><td colspan="5"><center><b>Tidak ada data!</b></center></td></tr>';
                                                        }else{
                                                            $no = 1;
                                                            foreach ($arrayResult as $dataUser) {
                                                                echo '<tr>';
                                                                    echo '<td>'.$no++.'</td>';
                                                                    echo '<td>'.$dataUser->email.'</td>';
                                                                    echo '<td>'.$dataUser->role.'</td>';
                                                                    echo '
                                                                        <td>
                                                                            <a href="index.php?p=form-user&id_user='.$dataUser->id_user.'" class="btn btn-warning mr-1 mb-1 waves-effect waves-light"><i class="fa fa-edit"></i> Edit</a>
                                                                            <a href="index.php?p=delete-user&id_user='.$dataUser->id_user.'" class="btn btn-danger mr-1 mb-1 waves-effect waves-light" onclick="return confirm(\'Apakah anda yakin akan menghapus?\')"><i class="fa fa-trash"></i> Hapus</a>
                                                                        </td>

                                                                    ';
                                                                echo '</tr>';
                                                            }
                                                        }
                                                     ?>
                                                </tbody>
                                            </table>

                                            <a href="?p=report-user" class="btn btn-primary mb-2" title="Tambah Atlet" style="color: #fff">
                                            <i class="feather icon-plus"></i>&nbsp; Download
                                        </a>
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