<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <?php
  if ($data_user->is_developer == 1) {
  ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manajemen Akun</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="mt-1 mb-2">
          <button type="button" data-toggle="modal" data-target="#tambah-akun" class="btn btn-primary">
            <em class="fas fa-user-plus"></em> Tambah Akun
          </button>

          <div class="mb-2 mt-2">
            <?php
            if (isset($_SESSION['val'])) {
              echo $_SESSION['val'];
              unset($_SESSION['val']);
            }
            ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Manajemen Akun</h5>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="table-responsive-xl">
                      <table class="table table-hover akun-panel nowrap">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>JK</th>
                            <th>Usia</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Last Login</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                      </table>
                    </div>
                    <!-- /.table-responsive-md -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  <?php
  } else if ($data_user->is_developer == 0) {
  ?>
    <section class="content">
      <div class="container-fluid">
        <div class="pt-4">
          <div class="alert alert-warning" role="alert">
            <h4 class="alert-heading"><em class="fas fa-bullhorn"></em> Alert</h4>
            <p>Anda Tidak Memiliki Akses Ke Halaman Ini</p>
          </div>
        </div>
      </div>
    </section>
  <?php
  }
  ?>
</div>
<!-- /.content-wrapper -->
<?php require 'action/akun.php'; ?>
<script src="../assets/plugins/jquery/jquery.min.js"></script>