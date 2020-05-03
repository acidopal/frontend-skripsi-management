<?php 
  include 'pages/layouts/header.php'; 

  require 'pages/authorization-admin.php';

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
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                  <div class="row">
                                      <div class="col-md-1">
                                            Cari Skripsi
                                      </div>
                                      <div class="col-md-4">
                                            <fieldset class="form-group position-relative has-icon-left mx-1 my-0 w-100">
                                                <input type="text" class="form-control round" id="chat-search" placeholder="Cari Pendaftaran Skripsi">
                                                <div class="form-control-position">
                                                    <i class="feather icon-search"></i>
                                                </div>
                                            </fieldset>
                                      </div>
                                      <div class="col-md-2">
                                            <fieldset class="form-group">
                                                <select class="form-control" id="basicSelect">
                                                    <option>Tahun</option>
                                                    <option>Angkatan</option>
                                                    <option>Jurusan</option>
                                                    <option>Topik</option>
                                                </select>
                                            </fieldset>
                                      </div>
                                      <div class="col-md-3">
                                           <button type="button" class="btn btn-relief-primary mr-1 mb-1 waves-effect waves-light">Cari</button>
                                      </div>
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