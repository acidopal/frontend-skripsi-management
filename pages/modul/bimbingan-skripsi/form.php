<?php 
    include 'pages/layouts/header.php'; 
    require 'Bimbingan.php';
    $objBimbingan = new Bimbingan();
    $arrayResult = $objBimbingan->allBimbingan();

    if (isset($_POST['btnSubmit'])) {
        $objBimbingan->id_bimbingan = $_POST['id_bimbingan'];
        $objBimbingan->id_skripsi = $_POST['id_skripsi'];
        $objBimbingan->nidn = $_POST['nidn'];
        $objBimbingan->pertemuan_ke = $_POST['pertemuan_ke'];
        $objBimbingan->tanggal = $_POST['tanggal'];
        $objBimbingan->topik_bahasan = $_POST['topik_bahasan'];
        $objBimbingan->penyelesaian = $_POST['penyelesaian'];
        $objBimbingan->jadwal_berikutnya = $_POST['jadwal_berikutnya'];
        $objBimbingan->persetujuan = $_POST['persetujuan'];
        $objBimbingan->tgl_persetujuan = $_POST['tgl_persetujuan'];
        $objBimbingan->komentar_pembimbing = $_POST['komentar_pembimbing'];
        $objBimbingan->kpi = $_POST['kpi'];

        if (isset($_GET['id_bimbingan'])) {
            $objBimbingan->id_bimbingan = $_GET['id_bimbingan'];
            $objBimbingan->updateBimbingan();
        }else{
            $objBimbingan->addBimbingan();
        }

        echo "<script> alert('$objBimbingan->message');</script>";
        if ($objBimbingan->result) {
            echo "<script> window.location = 'index.php?p=Bimbingan';</script>";
        }
    }else if (isset($_GET['id_bimbingan'])) {
        $objBimbingan->id_bimbingan = $_GET['id_bimbingan'];
        $objBimbingan->getBimbingan();
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
                            <h4 class="card-title">Form Bimbingan</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                            <a  href="index.php?p=Bimbingan"  class="btn btn-warning mr-1 mb-1 waves-effect waves-light">Kembali</a>
                                    <form action="" id="form-konten" class='form-horizontal' method="POST">
                                        <div class="box-body">
                                            <div class='form-group'>
                                                <label for='id_user' class='control-label'>User:</label>
                                                <input type="text" name="id_user" class="form-control" placeholder="Kode Bimbingan" value="<?php echo $objBimbingan->id_user ?>" required="">
                                            </div>     

                                             <div class='form-group'>
                                                <label for='id_bimbingan' class='control-label'>Bimbingan:</label>
                                                <input type="text" name="id_bimbingan" class="form-control" placeholder="Kode Bimbingan" value="<?php echo $objBimbingan->id_bimbingan ?>" required="">
                                            </div>     

                                             <div class='form-group'>
                                                <label for='name' class='control-label'>Skripsi:</label>
                                                <input type="text" name="id_skripsi" class="form-control" placeholder="id_skripsi" value="<?php echo $objBimbingan->id_skripsi ?>" required="">
                                            </div>

                                            <div class='form-group'>
                                                <label for='name' class='control-label'>Tanggal:</label>
                                                <input type="text" name="tanggal" class="form-control" placeholder="tanggal" value="<?php echo $objBimbingan->tanggal ?>" required="">
                                            </div>

                                            <div class='form-group'>
                                                <label for='name' class='control-label'>nidn:</label>
                                                <input type="text" name="nidn" class="form-control" placeholder="nidn" value="<?php echo $objBimbingan->nidn ?>" required="">
                                            </div>

                                            <div class='form-group'>
                                                <label for='name' class='control-label'>Pertemuan Ke:</label>
                                                <input type="text" name="pertemuan_ke" class="form-control" placeholder="pertemuan_ke" value="<?php echo $objBimbingan->pertemuan_ke ?>" required="">
                                            </div>

                                            <div class='form-group'>
                                                <label for='name' class='control-label'>Topik Bahasan:</label>
                                                <input type="text" name="topik_bahasan" class="form-control" placeholder="topik_bahasan" value="<?php echo $objBimbingan->topik_bahasan ?>" required="">
                                            </div>

                                            <div class='form-group'>
                                                <label for='name' class='control-label'>Penyelesaian:</label>
                                                <input type="text" name="penyelesaian" class="form-control" placeholder="penyelesaian" value="<?php echo $objBimbingan->penyelesaian ?>" required="">
                                            </div>

                                            <div class='form-group'>
                                                <label for='name' class='control-label'>Jadwal Berikutnya:</label>
                                                <input type="text" name="jadwal_berikutnya" class="form-control" placeholder="id_skripsi" value="<?php echo $objBimbingan->id_skripsi ?>" required="">
                                            </div>

                                            <div class='form-group'>
                                                <label for='name' class='control-label'>Persetujuan:</label>
                                                <input type="text" name="persetujuan" class="form-control" placeholder="persetujuan" value="<?php echo $objBimbingan->persetujuan ?>" required="">
                                            </div>

                                            <div class='form-group'>
                                                <label for='name' class='control-label'>Tanggal Persetujuan:</label>
                                                <input type="text" name="tgl_persetujuan" class="form-control" placeholder="tgl_persetujuan" value="<?php echo $objBimbingan->tgl_persetujuan ?>" required="">
                                            </div> 

                                            <div class='form-group'>
                                                <label for='name' class='control-label'>Komentar Pebimbing:</label>
                                                <input type="text" name="komentar_pembimbing" class="form-control" placeholder="komentar_pembimbing" value="<?php echo $objBimbingan->komentar_pembimbing ?>" required="">
                                            </div> 

                                             <div class='form-group'>
                                                <label for='name' class='control-label'>KPI:</label>
                                                <input type="text" name="KPI" class="form-control" placeholder="KPI" value="<?php echo $objBimbingan->KPI ?>" required="">
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