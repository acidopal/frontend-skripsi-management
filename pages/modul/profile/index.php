<?php 
    include 'pages/layouts/header.php'; 
    require 'pages/modul/user/User.php';
    require 'pages/modul/prodi/Prodi.php';

    $objUser = new User();
    $objUser->id_user = $_SESSION['id_user'];
    $objUser->getUser();

    $objProdi = new Prodi();
    $prodiList = $objProdi->allProdi();

    if (isset($_POST['btnSubmit'])) {
        $objUser->id_user = $_POST['id_user'];
        $objUser->email = $_POST['email'];
        $objUser->role = $_POST['role'];
        $objUser->nama = $_POST['nama'];
        $objUser->kode_prodi = $_POST['kode_prodi'];
        $objUser->alamat = $_POST['alamat'];
        $objUser->gender = $_POST['gender'];
        $objUser->no_telp = $_POST['no_telp'];

        if (!isset($_GET['password']) && isset($_GET['old_password'])) {
            $objUser->password = $_GET['old_password'];
        }else{
            $objUser->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }

        $objUser->id_user = $_SESSION['id_user'];
        $objUser->updateUser();

        echo "<script> alert('$objUser->message');</script>";
        if ($objUser->result) {
            echo "<script> window.location = 'index.php?p=profile';</script>";
        }
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
                            <h4 class="card-title">Form User</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                            <a  href="index.php?p=user"  class="btn btn-warning mr-1 mb-1 waves-effect waves-light">Kembali</a>
                                    <form action="" id="form-konten" class='form-horizontal' method="POST">
                                        <div class="box-body">
                                             <div class='form-group'>
                                                <label for='nama' class='control-label'>Nama:</label>
                                                <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $objUser->nama ?>" required="">
                                            </div> 

                                             <div class='form-group'>
                                                <label for='name' class='control-label'>Email:</label>
                                                <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $objUser->email ?>" required="">
                                            </div> 

                                            <div class='form-group'>
                                                <label for='name' class='control-label'>Password:</label>
                                                <input type="password" name="password" class="form-control" placeholder="Password" value="" >
                                                <input type="hidden" name="old_password" class="form-control" value="<?php echo $objUser->password ?>" >
                                            </div>

                                            <div class='form-group'>
                                                <label for='name' class='control-label'>Role:</label>
                                                <select name="role" class="form-control" id="role">
                                                    <option value="Mahasiswa">Mahasiswa</option>
                                                    <option value="Dosen">Dosen</option>
                                                    <option value="Admin">Admin</option>  
                                                </select>
                                            </div> 

                                            <div class='form-group'>
                                                <label for='kode_prodi' class='control-label'>Prodi:</label>
                                                <select name="kode_prodi" class="form-control">
                                                    <?php 
                                                        foreach ($prodiList as $prodi) {
                                                            echo '<option value="'.$prodi->kode_prodi.'"">'.$prodi->nama_prodi.' ('.$prodi->kode_prodi.')'.'</option>';
                                                        }
                                                     ?>
                                                </select>
                                            </div>     

                                             <div class='form-group'>
                                                <label for='name' class='control-label'>Gender:</label>
                                               <fieldset>
                                                    <div class="vs-radio-con">
                                                        <input type="radio" name="gender" <?php echo ($objUser->gender == 'L') ? 'checked' : '' ?> value="L">
                                                        <span class="vs-radio">
                                                            <span class="vs-radio--border"></span>
                                                            <span class="vs-radio--circle"></span>
                                                        </span>
                                                        <span class="">Laki-laki</span>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="vs-radio-con">
                                                        <input type="radio" name="gender" value="P"  <?php echo ($objUser->gender == 'P') ? 'checked' : '' ?> value="L">
                                                        <span class="vs-radio">
                                                            <span class="vs-radio--border"></span>
                                                            <span class="vs-radio--circle"></span>
                                                        </span>
                                                        <span class="">Perempuan</span>
                                                    </div>
                                                </fieldset>

                                            </div> 

                                            <div class='form-group'>
                                                <label for='name' class='control-label'>Alamat:</label>
                                                <textarea name="alamat" class="form-control" placeholder="Alamat" ><?php echo $objUser->alamat ?></textarea> 
                                            </div> 

                                             <div class='form-group'>
                                                <label for='name' class='control-label'>No. Telp:</label>
                                                <input type="text" name="no_telp" class="form-control" placeholder="No. Telp" value="<?php echo $objUser->no_telp ?>" required="">
                                            </div> 

                                            <input type="hidden" name="id_user" value="<?php echo $objUser->id_user ?>">
                                           
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