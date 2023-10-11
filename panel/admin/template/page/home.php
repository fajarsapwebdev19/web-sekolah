<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-sm-12">
            <?php
              if(isset($_SESSION['val']))
              {
                echo $_SESSION['val'];
                unset($_SESSION['val']);
              }
            ?>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-newspaper"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Berita</span>
                <span class="info-box-number">
                  <?php
                    $q1 = mysqli_query($con, "SELECT * FROM portal");
                    
                    echo mysqli_num_rows($q1);
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">PTK</span>
                <span class="info-box-number">
                  <?php
                    $q2 = mysqli_query($con, "SELECT * FROM ptk");
                    echo mysqli_num_rows($q2);
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-plus"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Pengujung</span>
                <span class="info-box-number">
                  <?php
                    $q3 = mysqli_query($con, "SELECT * FROM registrasi_anggota");
                    echo mysqli_num_rows($q3);
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">User</span>
                <span class="info-box-number">
                  <?php
                    $q4 = mysqli_query($con, "SELECT * FROM user");
                    echo mysqli_num_rows($q4);
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title"><em class="fas fa-bullhorn"></em> Informasi Helpdesk</h5>
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
                    
                      <?php
                          $query = mysqli_query($con, "SELECT * FROM info_hd ORDER BY date DESC, time DESC");

                          if(mysqli_num_rows($query) == 0)
                          {
                            ?>
                              <div class="alert alert-warning bg-warning">
                                Belum Ada Info !
                              </div>
                            <?php
                          }
                          else
                          {
                            while($info = mysqli_fetch_object($query))
                            {
                              ?>
                                <div class="card bg-light">
                                    <div class="card-header bg-dark">
                                      <h5><em class="fas fa-envelope"></em> <?= $info->judul; ?></h5>
                                      <h6 class="text-primary">Helpdesk (<?= $info->username?>)</h6>
                                      <p><em class="fas fa-clock"></em> <b><?= (empty($info->time) ? "NULL" : date("H:i", strtotime($info->time))) ?></b> <em class="fas fa-calendar"></em> <b><?= (empty($info->date) ? "NULL" : date("d-m-Y", strtotime($info->date))) ?></b></p>
                                    </div>
                                    <div class="card-body">
                                      <?= $info->message; ?>
                                      <?php
                                        if($data_user->is_developer == 1)
                                        {
                                          ?>
                                            <button type="button" data-id="<?= $info->id_info; ?>" class="btn btn-danger delete-info">
                                              <em class="fas fa-trash"></em> Delete
                                            </button>
                                          <?php
                                        }
                                      ?>
                                    </div>
                                </div>
                              <?php
                            }
                          }
                      ?>  
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

  <?php require 'action/info_hd.php'; ?>