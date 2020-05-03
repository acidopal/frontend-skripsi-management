<?php 
    include 'pages/layouts/header.php'; 
    require 'Prodi.php';
    $objProdi = new Prodi();
    $arrayResult = $objProdi->allProdi();

    if (isset($_POST['btnSubmit'])) {
        $objProdi->id_prodi = $_POST['id_prodi'];
        $objProdi->kode_prodi = $_POST['kode_prodi'];
        $objProdi->nama_prodi = $_POST['nama_prodi'];

        if (isset($_GET['id_prodi'])) {
            $objProdi->id_prodi = $_GET['id_prodi'];
            $objProdi->updateProdi();
        }else{
            $objProdi->addProdi();
        }

        echo "<script> alert('$objProdi->message');</script>";
        if ($objProdi->result) {
            echo "<script> window.location = 'index.php?p=prodi';</script>";
        }
    }else if (isset($_GET['id_prodi'])) {
        $objProdi->id_prodi = $_GET['id_prodi'];
        $objProdi->getProdi();
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
                            <h4 class="card-title">Form Dosen</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                            <a  href="index.php?p=prodi"  class="btn btn-warning mr-1 mb-1 waves-effect waves-light">Kembali</a>
                                    <form action="" id="form-konten" class='form-horizontal' method="POST">
                                        <div class="box-body">
                                            <div class='form-group'>
                                                <label for='kode_prodi' class='control-label'>Kode Prodi:</label>
                                                <input type="text" name="kode_prodi" class="form-control" placeholder="Kode Prodi" value="<?php echo $objProdi->kode_prodi ?>" required="">
                                            </div>     

                                             <div class='form-group'>
                                                <label for='name' class='control-label'>Nama Prodi:</label>
                                                <input type="text" name="nama_prodi" class="form-control" placeholder="Nama Prodi" value="<?php echo $objProdi->nama_prodi ?>" required="">
                                            </div> 
                                        </div>    
                                       <div class="box-footer">
                                            <input type="submit" class="btn btn-primary pull-right" value="Simpan" name="btnSubmit">
                                        </div>
                                         <br>
                                        <br>
                                    </form>
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