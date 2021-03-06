<?php
     include './pages/layouts/header.php';
     include './pages/authorization-login.php';
     require './pages/modul/skripsi/Skripsi.php';

     $objSkripsi = new Skripsi();

    if(isset($_POST['judul_skripsi'])){
        $objSkripsi->judul_skripsi = $_POST['judul_skripsi'];
        $objSkripsi->nim = $_POST['nim'];
        $objSkripsi->topik = $_POST['topik'];
        $objSkripsi->abstrak_id = $_POST['abstrak_id'];
        $objSkripsi->abstrak_en = $_POST['abstrak_en'];
        // $objSkripsi->file_proposal = $_POST['file_proposal'];
        $objSkripsi->created_date = $_POST['created_date'];

       if (isset($_GET['id_skripsi'])) {
            $objSkripsi->id_skripsi = $_GET['id_skripsi'];
            $objSkripsi->updateSkripsi();
        }else{
            $objSkripsi->addSkripsi();
        }

        echo "<script> alert('$objSkripsi->message');</script>";
        if ($objSkripsi->result) {
            echo "<script> window.location = 'index.php?p=dashboard-mahasiswa';</script>";
        }
    }else if (isset($_GET['id_skripsi'])) {
        $objSkripsi->id_skripsi = $_GET['id_skripsi'];
        $objSkripsi->getSkripsi();
    }
 ?>

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section id="number-tabs">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Pendaftaran Skripsi</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <p>Form Pendaftaran Skripsi.</p>
                                    <form action="#" method="POST" class="number-tab-steps wizard-circle" enctype="multipart/form-data">
                                        <h6>Judul & Topik</h6>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="judul_skripsi">Judul Skripsi </label>
                                                        <input type="text" class="form-control" id="judul_skripsi" name="judul_skripsi" placeholder="Judul Skripsi" value="<?php echo $objSkripsi->judul_skripsi; ?>">
                                                        <input type="hidden" class="form-control" id="created_date" name="created_date" value="<?php echo date("Y-m-d"); ?>">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="topik">Topik Skripsi</label>
                                                        <input type="text" class="form-control" id="topik" name="topik" placeholder="Topik Skripsi" value="<?php echo $objSkripsi->topik; ?>">
                                                        <input type="hidden" class="form-control" id="nim" name="nim" value="<?php echo $_SESSION['nim']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <!-- Step 2 -->
                                        <h6>Abstrak</h6>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                  <div class="form-group">
                                                        <label for="abstrak_id">Abstrak Indonesia :</label>
                                                        <textarea name="abstrak_id" id="abstrak_id" rows="5" class="form-control" placeholder="Abstrak Indonesia"><?php echo $objSkripsi->abstrak_id; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="abstrak_en">Abstrak Inggris :</label>
                                                        <textarea name="abstrak_en" id="abstrak_en" rows="5" class="form-control" placeholder="Abstrak Inggris"><?php echo $objSkripsi->abstrak_en; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <!-- Step 3 -->
                                        <h6>File Proposal</h6>
                                        <fieldset>
                                            <div class="row mb-5">
                                                <div class="col-sm-3">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="file_proposal">Abstrak Indonesia :</label>
                                                    <input name="file_proposal" type="file" accept="application/pdf, application/vnd.ms-excel" class="form-control"/>
                                                </div>
                                                <div class="col-sm-3">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
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