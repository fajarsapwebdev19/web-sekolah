<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Koperasi</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <?php
    $sql = mysqli_query($con, "SELECT * FROM profil_badan_usaha WHERE jenis_profile='Koperasi'");
    $k = mysqli_fetch_object($sql);
  ?>
  <section class="content">
    <div class="container-fluid">
      <?php
        if(isset($_SESSION['val']))
        {
          echo $_SESSION['val'];
          unset($_SESSION['val']);
        }
      ?>
        <form action="proses/action-profile-badan-usaha.php" method="POST">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <label>Profil Koperasi</label>
                        </div>
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="<?= $k->id; ?>">
                            <textarea name="isi_profile" id="" class="form-control edit" cols="30" rows="50"><?= $k->isi_profile; ?></textarea>
                        </div>
                        <div class="col-md-10 offset-md-2">
                            <button type="submit" name="ubah_koperasi" class="btn btn-success">Ubah</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
  </section>
</div>