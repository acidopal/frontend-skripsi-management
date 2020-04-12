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
                                    <h4 class="card-title">Data Skripsi</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <a href="?p=form-skripsi" class="btn btn-primary mb-2" title="Tambah Atlet" style="color: #fff">
                                            <i class="feather icon-plus"></i>&nbsp; Pendaftaran Skripsi
                                        </a>
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>NIM</th>
                                                        <th>Judul Skripsi</th>
                                                        <th>Abstrak</th>
                                                        <th>File Proposal</th>
                                                        <th>Info</th>
                                                        <th>Perstujuan</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                     <tr>
                                                        <td>181013010</td>
                                                        <td>Melawan Korona</td>
                                                        <td>
                                                            Ind : Bagaimana? <br>
                                                            Eng : How?
                                                        </td>
                                                        <td> <a href="#">Open File</a> </td>
                                                        <td>2020/04/25</td>
                                                        <td>Menunggu Konfirmasi</td>
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