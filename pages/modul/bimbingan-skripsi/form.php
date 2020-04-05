<?php include 'pages/layouts/header.php'; ?>
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
                            <a  onclick="backtoParent()"  class="btn btn-warning mr-1 mb-1 waves-effect waves-light">Kembali</a>
                                    <form onsubmit="return false;" id="form-konten" class='form-horizontal'>
                                        <div class="box-body">
                                            <div class='form-group'>
                                                <label for='name' class='control-label'>Nama Atlet:</label>
                                                <input type="text" name="nama_atlet" class="form-control" placeholder="Nama Atlet" value="" required="">
                                            </div>     

                                             <div class='form-group'>
                                                <label for='name' class='control-label'>Jenis Kelamin:</label>
                                                <ul class="list-unstyled mt-2">
                                                    <li class="d-inline-block mr-2">
                                                        <fieldset>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" name="jk" id="L" value="L" checked>
                                                                <label class="custom-control-label" for="L">Laki-laki</label>
                                                            </div>
                                                        </fieldset>
                                                    </li>
                                                    <li class="d-inline-block mr-2">
                                                        <fieldset>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" name="jk" id="P" value="P" >
                                                                <label class="custom-control-label" for="P">Perempuan</label>
                                                            </div>
                                                        </fieldset>
                                                    </li>
                                                </ul>
                                            </div>     

                                             <div class='form-group'>
                                                <label for='name' class='control-label'>Telp:</label>
                                                <input type="number" name="telp" class="form-control" placeholder="telp" value="" required="">
                                            </div>     

                                            <div class='form-group'>
                                                <label for='name' class='control-label'>Alamat:</label>
                                                <textarea type="text" name="alamat" class="form-control" placeholder="alamat" required=""></textarea>
                                            </div>     

                                             <div class='form-group'>
                                                <label for='name' class='control-label'>Deskripsi:</label>
                                                <textarea type="text" name="deskripsi" class="form-control" placeholder="deskripsi" required=""></textarea>
                                            </div>     

                                            <div class='form-group'>
                                                <label for='id_induk_cabor' class='control-label'>Induk Cabor :</label>
                                                <select name="id_induk_cabor" id="id_induk_cabor" class="form-control" >
                                                        <option disabled selected="selected" value="">Pilih Induk</option>
                                                </select>
                                            </div>

                                            <div class='form-group' id="row-provinsi">
                                                <label for='id_provinsi' class='control-label'>Provinsi :</label>
                                                <select name="id_provinsi" id="id_provinsi" class="form-control" >
                                                        <option disabled selected="selected" value="">Pilih Provinsi</option>
                                                </select>
                                            </div>

                                             <div class='form-group' id="row-kota">
                                                <label for='id_kota' class='control-label'>Kota :</label>
                                                <select name="id_kota" id="id_kota" class="form-control" >
                                                        <option disabled selected="selected" value="">Pilih Kota</option>
                                                </select>
                                            </div>

                                             <div class="form-group">
                                              <label for="foto">Foto Profile</label>
                                              <input type="file" id="input-file-now-custom-1" name="foto" class="dropify" data-default-file="" />
                                              <p class="help-block">Tipe foto : jpeg,png,jpg,bmp <br>maks file: 5mb.</p>
                                            </div>

                                            <input type='hidden' name='_token' value='{{ csrf_token() }}'>
                                        </div>

                                       <div class="box-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                            <input type="submit" class="btn btn-primary pull-right" value="Simpan">
                                        </div>
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