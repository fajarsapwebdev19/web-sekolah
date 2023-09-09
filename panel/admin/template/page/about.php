<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Tentang Kami</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- get data -->
  <?php
    $query = mysqli_query($con, "SELECT * FROM about");
    $data = mysqli_fetch_object($query);
  ?>
  <!-- end get data -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              Tentang Instansi
            </div>
            <div class="card-body">
              <div class="mt-1 mb-1">
                <?php
                  if(isset($_SESSION['val']))
                  {
                    echo $_SESSION['val'];
                    unset($_SESSION['val']);
                  }
                ?>
              </div>
              <form action="proses/action-about.php" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                  <div class="col-md-2">
                    <label for="">
                      Nama Instansi
                    </label>
                  </div>
                  <div class="col-md-10">
                    <input type="hidden" name="id" value="<?= $data->id; ?>">
                    <input type="text" name="nama_instansi" class="form-control" value="<?= $data->nama_instansi; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-2">
                    <label for="">
                      Kabupaten / Kota
                    </label>
                  </div>
                  <div class="col-md-10">
                    <input type="text" name="kab_kota" class="form-control" value="<?= $data->kab_kota?>">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-2">
                    <label for="">
                      Logo Instansi
                    </label>
                  </div>
                  <div class="col-md-10">
                    <input type="file" name="logo_instansi" class="form-control">
                    <span>Max file size: 5 MB, Ekstensi file: jpg,jpeg,dan png</span>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-2">
                    <label for="">
                      Isi Tentang Kami
                    </label>
                  </div>
                  <div class="col-md-10">
                    <textarea name="isi" class="form-control edit" cols="30" rows="10"><?= $data->isi_about; ?></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-2">
                    <label for="">
                      Visi
                    </label>
                  </div>
                  <div class="col-md-10">
                    <textarea name="visi" class="form-control edit" rows="10" cols=""><?= $data->visi; ?></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-2">
                    <label for="">
                      Misi
                    </label>
                  </div>
                  <div class="col-md-10">
                    <textarea name="misi" class="form-control edit" rows="10" cols=""><?= $data->misi; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-10 offset-md-2">
                      <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->