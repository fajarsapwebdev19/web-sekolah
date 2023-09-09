<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kontak</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- get data -->
    <?php
      $query = mysqli_query($con, "SELECT * FROM kontak");
      $data = mysqli_fetch_object($query);
    ?>
    <!-- get data -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Kontak
                </div>
                <div class="card-body">
                    <?php
                      if(isset($_SESSION['val']))
                      {
                        echo $_SESSION['val'];
                        unset($_SESSION['val']);
                      }
                    ?>
                    <form action="proses/action-kontak.php" method="post">
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="">
                                    Alamat
                                </label>
                            </div>
                            <div class="col-md-10">
                              <input type="hidden" name="id" value="<?= $data->id_kontak; ?>">
                                <textarea rows="3" name="alamat" class="form-control"><?= $data->alamat; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="">
                                    Link Alamat
                                </label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="link-peta-embed" class="form-control" value="<?= $data->link_alamat; ?>">
                            </div>
                        </div>
                        <!-- telp -->
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="">
                                    View Telp
                                </label>
                            </div>
                            <div class="col-md-10">
                                <div class="mb-2">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="telp1" name="show_telp" class="custom-control-input showtelp" value="Y" <?php if($data->view_telp == "Y"){echo 'checked';}?>>
                                        <label class="custom-control-label" for="telp1">Ya</label>
                                      </div>
                                      <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="telp2" name="show_telp" class="custom-control-input hidetelp" value="N" <?php if($data->view_telp == "N"){echo 'checked';}?>>
                                        <label class="custom-control-label" for="telp2">Tidak</label>
                                      </div>
                                </div>
                            </div>
                        </div>
                        <div id="telp" <?php if($data->view_telp == "Y"){echo 'style="display:block;"';}else{echo 'style="display:none;"';}?>>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="">
                                        No Telp
                                    </label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="no_telp" class="form-control" value="<?= $data->no_telp; ?>">
                                </div>
                            </div>
                        </div>
                        <!-- end telp -->
                        <!-- email -->
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="">
                                    View Email
                                </label>
                            </div>
                            <div class="col-md-10">
                                <div class="mb-2">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="email1" name="show_email" class="custom-control-input showemail" value="Y" <?php if($data->view_email == "Y"){echo 'checked';}?>>
                                        <label class="custom-control-label" for="email1">Ya</label>
                                      </div>
                                      <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="email2" name="show_email" class="custom-control-input hideemail" value="N" <?php if($data->view_email == "N"){echo 'checked'; }?>>
                                        <label class="custom-control-label" for="email2">Tidak</label>
                                      </div>
                                </div>
                            </div>
                        </div>
                        <div id="email" <?php if($data->view_email == 'Y'){echo "style='display:block;'";}else{echo "style='display:none'";} ?>>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="">
                                        Email
                                    </label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="email" class="form-control" value="<?= $data->email; ?>">
                                </div>
                            </div>
                        </div>
                        <!-- end email -->
                        <!-- whatsapp -->
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="">
                                    View Whatsapp
                                </label>
                            </div>
                            <div class="col-md-10">
                                <div class="mb-2">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="wa1" name="show_wa" class="custom-control-input showwa" value="Y" <?php if($data->view_wa == "Y"){echo 'checked';}?>>
                                        <label class="custom-control-label" for="wa1">Ya</label>
                                      </div>
                                      <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="wa2" name="show_wa" class="custom-control-input hidewa" value="N" <?php if($data->view_wa == "N"){echo 'checked';}?>>
                                        <label class="custom-control-label" for="wa2">Tidak</label>
                                      </div>
                                </div>
                            </div>
                        </div>
                        <div id="wa" <?php if($data->view_wa == 'Y'){echo "style='display:block;'";}else{echo "style='display:none'";} ?>>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="">
                                        Whatsapp
                                    </label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="whatsapp" class="form-control" value="<?= $data->no_wa; ?>">
                                </div>
                            </div>
                        </div>
                        <!-- end whatsapp -->
                        <!-- fb -->
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="">
                                    View Facebook
                                </label>
                            </div>
                            <div class="col-md-10">
                                <div class="mb-2">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="fb1" name="show_fb" class="custom-control-input showfb" value="Y" <?php if($data->view_fb == "Y" ){echo 'checked';}?>>
                                        <label class="custom-control-label" for="fb1">Ya</label>
                                      </div>
                                      <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="fb2" name="show_fb" class="custom-control-input hidefb" value="N" <?php if($data->view_fb == "N" ){echo 'checked';}?>>
                                        <label class="custom-control-label" for="fb2">Tidak</label>
                                      </div>
                                </div>
                            </div>
                        </div>
                        <div id="fb" <?php if($data->view_fb == 'Y'){echo "style='display:block;'";}else{echo "style='display:none'";} ?>>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="">
                                        Facebook
                                    </label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="facebook" class="form-control" value="<?= $data->user_fb; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="">
                                        Link Facebook
                                    </label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="link-fb" class="form-control" value="<?= $data->link_fb; ?>">
                                </div>
                            </div>
                        </div>
                        <!-- end fb -->
                        <!-- ig -->
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="">
                                    View Instagram
                                </label>
                            </div>
                            <div class="col-md-10">
                                <div class="mb-2">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="ig1" name="show_ig" class="custom-control-input showig" value="Y" <?php if($data->view_ig == "Y"){echo 'checked';}?>>
                                        <label class="custom-control-label" for="ig1">Ya</label>
                                      </div>
                                      <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="ig2" name="show_ig" class="custom-control-input hideig" value="N" <?php if($data->view_ig == "N"){echo 'checked';}?>>
                                        <label class="custom-control-label" for="ig2">Tidak</label>
                                      </div>
                                </div>
                            </div>
                        </div>
                        <div id="ig" <?php if($data->view_ig == 'Y'){echo "style='display:block;'";}else{echo "style='display:none'";} ?>>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="">
                                        Instagram
                                    </label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="instagram" class="form-control" value="<?= $data->user_ig; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="">
                                        Link Instagram
                                    </label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="link-ig" class="form-control" value="<?= $data->link_ig; ?>">
                                </div>
                            </div>
                        </div>
                        <!-- end ig -->
                        <!-- yt -->
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="">
                                    View Youtube
                                </label>
                            </div>
                            <div class="col-md-10">
                                <div class="mb-2">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="yt1" name="show_yt" class="custom-control-input showyt" value="Y" <?php if($data->view_yt == "Y"){echo 'checked';}?>>
                                        <label class="custom-control-label" for="yt1">Ya</label>
                                      </div>
                                      <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="yt2" name="show_yt" class="custom-control-input hideyt" value="N" <?php if($data->view_yt == "N"){echo 'checked';}?>>
                                        <label class="custom-control-label" for="yt2">Tidak</label>
                                      </div>
                                </div>
                            </div>
                        </div>
                        <div id="yt" <?php if($data->view_yt == 'Y'){echo "style='display:block;'";}else{echo "style='display:none'";} ?>>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="">
                                        Youtube
                                    </label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="youtube" class="form-control" value="<?= $data->user_yt; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="">
                                        Link Youtube
                                    </label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="link-yt" class="form-control" value="<?= $data->link_yt; ?>">
                                </div>
                            </div>
                        </div>
                        <!-- end yt -->
                        <!-- tombol simpan -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-10 offset-md-2">
                                    <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
                                </div>
                            </div>
                        </div>
                        <!-- end tombol simpan -->
                    </form>
                </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->