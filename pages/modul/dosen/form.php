<?php 
    include 'pages/layouts/header.php'; 
    require 'Dosen.php';
    $objDosen = new Dosen();
    $arrayResult = $objDosen->allDosen();

    if (isset($_POST['btnSubmit'])) {
        $objDosen->nidn = $_POST['nidn'];
        $objDosen->id_user = $_POST['id_user'];
        $objDosen->kode_prodi = $_POST['kode_prodi'];
        $objDosen->nama = $_POST['nama'];
        $objDosen->gender = $_POST['gender'];
        $objDosen->email = $_POST['email'];
        $objDosen->alamat = $_POST['alamat'];
        $objDosen->no_telp = $_POST['no_telp'];

        if (isset($_GET['nidn'])) {
            $objDosen->nidn = $_GET['nidn'];
            $objDosen->updateDosen();
        }else{
            $objDosen->addDosen();
        }

        echo "<script> alert('$objDosen->message');</script>";
        if ($objDosen->result) {
            echo "<script> window.location = 'index.php?p=Dosen';</script>";
        }
    }else if (isset($_GET['nidn'])) {
        $objDosen->nidn = $_GET['nidn'];
        $objDosen->getDosen();
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
                            <a  href="index.php?p=Dosen"  class="btn btn-warning mr-1 mb-1 waves-effect waves-light">Kembali</a>
                                    <form action="" id="form-konten" class='form-horizontal' method="POST">
                                        <div class="box-body">
                                            <div class='form-group'>
                                                <label for='id_user' class='control-label'>User:</label>
                                                <input type="text" name="id_user" class="form-control" placeholder="Kode Dosen" value="<?php echo $objDosen->id_user ?>" required="">
                                            </div>  

                                            <div class='form-group'>
                                                <label for='kode_prodi' class='control-label'>Prodi:</label>
                                                <input type="text" name="kode_prodi" class="form-control" placeholder="Kode Prodi" value="<?php echo $objDosen->kode_prodi ?>" required="">
                                            </div>      

                                             <div class='form-group'>
                                                <label for='name' class='control-label'>Email:</label>
                                                <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $objDosen->email ?>" required="">
                                            </div> 

                                            <div class='form-group'>
                                                <label for='name' class='control-label'>Alamat:</label>
                                                <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $objDosen->alamat ?>" required="">
                                            </div> 

                                             <div class='form-group'>
                                                <label for='name' class='control-label'>No. Telp:</label>
                                                <input type="text" name="no_telp" class="form-control" placeholder="No. Telp" value="<?php echo $objDosen->alamat ?>" required="">
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