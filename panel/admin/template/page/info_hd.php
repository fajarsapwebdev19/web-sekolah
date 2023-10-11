<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Informasi Helpdesk</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <section class="content">
    <div class="container-fluid">
      <?php
        if(isset($_SESSION['val']))
        {
          echo $_SESSION['val'];
          unset($_SESSION['val']);
        }
      ?>
        <form action="proses/action-info-hd.php" method="POST" class="needs-validation" novalidate>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 mb-4">
                            <label>Judul</label>
                        </div>
                        <div class="col-md-10 mb-4">
                           <input type="text" name="judul" class="form-control" required>
                        </div>
                        <div class="col-md-2 mb-4">
                            <label>Pesan</label>
                        </div>
                        <div class="col-md-10 mb-4">
                            <textarea name="message" id="" class="form-control edit" cols="30" rows="50" required></textarea>
                        </div>
                        <div class="col-md-10 offset-md-2">
                            <button type="submit" name="tambah" class="btn btn-success">Tambah</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
  </section>
</div>