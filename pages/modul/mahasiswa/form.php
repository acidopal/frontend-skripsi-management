<?php 
    include 'pages/layouts/header.php'; 
    require 'Mahasiswa.php';
    $objMahasiswa = new Mahasiswa();
    $arrayResult = $objMahasiswa->allMahasiswa();

    if (isset($_POST['btnSubmit'])) {
        $objMahasiswa->nim = $_POST['nim'];
        $objMahasiswa->id_user = $_POST['id_user'];
        $objMahasiswa->kode_prodi = $_POST['kode_prodi'];
        $objMahasiswa->email = $_POST['email'];
        $objMahasiswa->alamat = $_POST['alamat'];
        $objMahasiswa->no_telp = $_POST['no_telp'];
        $objMahasiswa->angkatan = $_POST['angkatan'];

        if (isset($_GET['nim'])) {
            $objMahasiswa->nim = $_GET['nim'];
            $objMahasiswa->updateMahasiswa();
        }else{
            $objMahasiswa->addMahasiswa();
        }

        echo "<script> alert('$objMahasiswa->message');</script>";
        if ($objMahasiswa->result) {
            echo "<script> window.location = 'index.php?p=Mahasiswa';</script>";
        }
    }else if (isset($_GET['nim'])) {
        $objMahasiswa->nim = $_GET['nim'];
        $objMahasiswa->getMahasiswa();
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
                            <h4 class="card-title">Form Mahasiswa</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                            <a  href="index.php?p=Mahasiswa"  class="btn btn-warning mr-1 mb-1 waves-effect waves-light">Kembali</a>
                                    <form action="" id="form-konten" class='form-horizontal' method="POST">
                                        <div class="box-body">
                                            <div class='form-group'>
                                                <label for='id_user' class='control-label'>User:</label>
                                                <input type="text" name="id_user" class="form-control" placeholder="Kode Mahasiswa" value="<?php echo $objMahasiswa->id_user ?>" required="">
                                            </div>     

                                             <div class='form-group'>
                                                <label for='kode_prodi' class='control-label'>Prodi:</label>
                                                <input type="text" name="kode_prodi" class="form-control" placeholder="Kode Prodi" value="<?php echo $objMahasiswa->kode_prodi ?>" required="">
                                            </div>     

                                             <div class='form-group'>
                                                <label for='name' class='control-label'>Email:</label>
                                                <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $objMahasiswa->email ?>" required="">
                                            </div> 

                                            <div class='form-group'>
                                                <label for='name' class='control-label'>Alamat:</label>
                                                <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $objMahasiswa->alamat ?>" required="">
                                            </div> 

                                             <div class='form-group'>
                                                <label for='name' class='control-label'>No. Telp:</label>
                                                <input type="text" name="no_telp" class="form-control" placeholder="No. Telp" value="<?php echo $objMahasiswa->alamat ?>" required="">
                                            </div> 

                                           <div class='form-group'>
                                                <label for='name' class='control-label'>Angkatan:</label>
                                                <input type="text" name="angkatan" class="form-control" placeholder="Angkatan" value="<?php echo $objMahasiswa->angkatan ?>" required="">
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