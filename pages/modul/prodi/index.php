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
                                    <h4 class="card-title">Data Prodi</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <a href="?p=form-prodi" class="btn btn-primary mb-2" title="Tambah Atlet" style="color: #fff">
                                            <i class="feather icon-plus"></i>&nbsp; Tambah Prodi
                                        </a>
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kode Prodi</th>
                                                        <th>Nama Prodi</th>
                                                        <th>Kepala Prodi</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>CS</td>
                                                        <td>Computer Science</td>
                                                        <td>Ahlijati Nuraminah S.Kom., MTI</td>
                                                        <td>
                                                            <a href="#" class='btn btn-warning mr-1 mb-1 waves-effect waves-light'><i class='fa fa-edit'></i> Edit</a>
                                                            <a href="#" class='btn btn-danger mr-1 mb-1 waves-effect waves-light'><i class='fa fa-trash'></i> Hapus</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>BM</td>
                                                        <td>Business Management</td>
                                                        <td>Pak Dadan</td>
                                                        <td>
                                                            <a href="#" class='btn btn-warning mr-1 mb-1 waves-effect waves-light'><i class='fa fa-edit'></i> Edit</a>
                                                            <a href="#" class='btn btn-danger mr-1 mb-1 waves-effect waves-light'><i class='fa fa-trash'></i> Hapus</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>SI</td>
                                                        <td>Sistem Informasi</td>
                                                        <td>Bu Asri</td>
                                                        <td>
                                                            <a href="#" class='btn btn-warning mr-1 mb-1 waves-effect waves-light'><i class='fa fa-edit'></i> Edit</a>
                                                            <a href="#" class='btn btn-danger mr-1 mb-1 waves-effect waves-light'><i class='fa fa-trash'></i> Hapus</a>
                                                        </td>
                                                    </tr>
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