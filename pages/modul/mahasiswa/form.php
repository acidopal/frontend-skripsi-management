<?php 
    include 'pages/layouts/header.php'; 
    include 'pages/modul/prodi/Prodi.php';
    include 'Mahasiswa.php';

    $objMahasiswa = new Mahasiswa();
    $arrayResult = $objMahasiswa->allMahasiswa();

    $objProdi = new Prodi();
    $prodiList = $objProdi->allProdi();

    if (isset($_POST['btnSubmit'])) {
        $objMahasiswa->nim = $_POST['nim'];
        $objMahasiswa->kode_prodi = $_POST['kode_prodi'];
        $objMahasiswa->email = $_POST['email'];
        $objMahasiswa->angkatan = $_POST['angkatan'];

        $objMahasiswa->nama = $_POST['nama'];
        $objMahasiswa->gender = $_POST['gender'];
        $objMahasiswa->alamat = $_POST['alamat'];
        $objMahasiswa->no_telp = $_POST['no_telp'];
        $objMahasiswa->password = $_POST['password'];

        if (isset($_GET['nim'])) {
            $objMahasiswa->id_user = $_POST['id_user'];
            $objMahasiswa->old_nim = $_GET['nim'];
            $objMahasiswa->updateMahasiswa();
        }else{
            $objMahasiswa->addMahasiswa();
        }

        echo "<script> alert('$objMahasiswa->message');</script>";
        if ($objMahasiswa->result) {
            echo "<script> window.location = 'index.php?p=mahasiswa';</script>";
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
                            <a  href="index.php?p=mahasiswa"  class="btn btn-warning mr-1 mb-1 waves-effect waves-light">Kembali</a>
                                    <form action="" id="form-konten" class='form-horizontal' method="POST">
                                        <div class="box-body">
                                            <div class='form-group'>
                                                <label for='name' class='control-label'>Nama:</label>
                                                <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $objMahasiswa->nama ?>" required="">
                                            </div> 

                                            <div class='form-group'>
                                                <label for='name' class='control-label'>Email:</label>
                                                <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $objMahasiswa->email ?>" required="">
                                            </div>

                                             <?php if (is_null($objMahasiswa->password)) { ?>
                                                <div class='form-group'>
                                                    <label for='name' class='control-label'>Password:</label>
                                                    <input type="password" name="password" class="form-control" placeholder="Password" value="">
                                                </div> 
                                            <?php }else{ ?>
                                                <input type="hidden" name="password" class="form-control" placeholder="Password" value="<?php echo $objMahasiswa->password ?>">
                                            <?php } ?>

                                            <div class='form-group'>
                                                <label for='name' class='control-label'>NIM:</label>
                                                <input type="number" name="nim" class="form-control" placeholder="NIM" value="<?php echo $objMahasiswa->nim ?>" required="">
                                            </div> 

                                            <div class='form-group'>
                                                <label for='kode_prodi' class='control-label'>Prodi:</label>
                                                <select name="kode_prodi" class="form-control">
                                                    <?php 
                                                        foreach ($prodiList as $prodi) {
                                                            echo '<option value='.$prodi->kode_prodi.'>'.$prodi->nama_prodi.' ('.$prodi->kode_prodi.')'.'</option>';
                                                        }
                                                     ?>
                                                </select>
                                            </div>      

                                            <input type="hidden" name="id_user" value="<?php echo $objMahasiswa->id_user ?>">
                                            <input type="hidden" name="role" value="<?php echo $objMahasiswa->role ?>">
                                            <input type="hidden" name="gender" value="<?php echo $objMahasiswa->gender ?>">
                                            <input type="hidden" name="alamat" value="<?php echo $objMahasiswa->alamat ?>">
                                            <input type="hidden" name="no_telp" value="<?php  echo (($objMahasiswa->no_telp == NULL)) ?  'NULL' : $objMahasiswa->no_telp;?>">

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