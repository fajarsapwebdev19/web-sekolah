<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Pendidik Dan Tenaga Pendidik (PTK)</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="mt-1 mb-2">
            <button type="button" data-target="#tambah-anggota" data-toggle="modal" class="btn btn-primary">
                <em class="fas fa-user-plus"></em> Tambah PTK
            </button>

            <div class="mb-2 mt-2">  
              <?php
                if(isset($_SESSION['val']))
                {
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
                <h5 class="card-title">Data Pendidik Dan Tenaga Pendidik</h5>
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
                    <div class="table-responsive-sm">
                      <table class="table table-hover data-ptk">
                        <thead>
                          <tr>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Asal Instansi</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                      </table>
                    </div>
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
  </div>
  <!-- /.content-wrapper -->
  <?php require 'action/anggota.php'; ?>