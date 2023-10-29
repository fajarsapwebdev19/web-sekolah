<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Logs</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Logs
                </div>
                <div class="card-body">
                  <?php
                    $v = mysqli_query($con, "SELECT * FROM version ORDER BY version ASC");
                    while($data = mysqli_fetch_assoc($v))
                    {
                      ?>
                          <h4>
                            Version <?= $data['version']; ?>
                          </h4>

                          <?php
                            $v_id = $data['v_id'];
                            $v_c = mysqli_query($con, "SELECT * FROM version_control WHERE v_id='$v_id'");

                            

                            while($data_vc = mysqli_fetch_object($v_c))
                            {
                              if($data_vc->jenis == "Pembaruan")
                              {
                                $jenis = "<span class='text-success'>[Pembaruan]</span>";
                              }
                              else if($data_vc->jenis == "Perbaikan")
                              {
                                $jenis =  "<span class='text-warning'>[Perbaikan]</span>";
                              }
                              ?>
                                <p>
                                  <?= $jenis." ".$data_vc->deskripsi; ?>
                                </p>
                              <?php
                            }
                          ?>
                      <?php
                    }
                  ?>
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