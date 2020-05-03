<?php 
    include 'pages/layouts/header.php'; 
    require 'User.php';
    $objUser = new User();
    $arrayResult = $objUser->allUser();

    if (isset($_POST['btnSubmit'])) {
        $objUser->id_user = $_POST['id_user'];
        $objUser->nama = $_POST['nama'];
        $objUser->email = $_POST['email'];
        $objUser->password = $_POST['password'];
        $objUser->role = $_POST['role'];

        if (isset($_GET['id_user'])) {
            $objUser->id_user = $_GET['id_user'];
            $objUser->updateUser();
        }else{
            $objUser->addUser();
        }

        echo "<script> alert('$objUser->message');</script>";
        if ($objUser->result) {
            echo "<script> window.location = 'index.php?p=User';</script>";
        }
    }else if (isset($_GET['id_user'])) {
        $objUser->id_user = $_GET['id_user'];
        $objUser->getUser();
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
                            <a  href="index.php?p=User"  class="btn btn-warning mr-1 mb-1 waves-effect waves-light">Kembali</a>
                                    <form action="" id="form-konten" class='form-horizontal' method="POST">
                                        <div class="box-body">
                                            <div class='form-group'>
                                                <label for='id_user' class='control-label'>User:</label>
                                                <input type="text" name="id_user" class="form-control" placeholder="Kode User" value="<?php echo $objUser->id_user ?>" required="">
                                            </div>      

                                             <div class='form-group'>
                                                <label for='name' class='control-label'>Email:</label>
                                                <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $objUser->email ?>" required="">
                                            </div> 

                                            <div class='form-group'>
                                                <label for='name' class='control-label'>nama:</label>
                                                <input type="text" name="nama" class="form-control" placeholder="nama" value="<?php echo $objUser->nama ?>" required="">
                                            </div> 

                                            <div class='form-group'>
                                                <label for='name' class='control-label'>password:</label>
                                                <input type="text" name="password" class="form-control" placeholder="password" value="<?php echo $objUser->password ?>" required="">
                                            </div>

                                             <div class='form-group'>
                                                <label for='name' class='control-label'>role:</label>
                                                <input type="text" name="role" class="form-control" placeholder="role" value="<?php echo $objUser->role ?>" required="">
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