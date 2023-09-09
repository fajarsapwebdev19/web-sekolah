<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Pendaftaran Anggota</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="mt-1 mb-2">
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
                <h5 class="card-title">Pendaftaran Anggota</h5>
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
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Approve</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="waiting-tab" data-toggle="tab" data-target="#waiting" type="button" role="tab" aria-controls="waiting" aria-selected="false">Menunggu</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Reject</button>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <button class="btn btn-success mt-2"><em class="fas fa-file-excel"></em> Export Data</button>
                        <div class="table-responsive-xl mt-4">
                          <table class="table table-hover data-new-anggota" style="width: 100% !important">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Action</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>JK</th>
                                <th>Asal Instansi</th>
                                <th>No Telp</th>
                              </tr>
                            </thead>
                          </table>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="waiting" role="tabpanel" aria-labelledby="waiting-tab">
                        <div class="table-responsive-xl mt-4">
                          <table class="table table-hover waiting-new-anggota" style="width: 100% !important;">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Action</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>JK</th>
                                <th>Asal Instansi</th>
                                <th>No Telp</th>
                              </tr>
                            </thead>
                          </table>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="table-responsive-xl mt-4">
                          <table class="table table-hover reject-new-anggota" style="width: 100% !important;">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Action</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>JK</th>
                                <th>Asal Instansi</th>
                                <th>No Telp</th>
                              </tr>
                            </thead>
                          </table>
                        </div>
                      </div>
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
  <?php require 'action/new-anggota.php'; ?>