<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Klinik</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <?php
    $sql = mysqli_query($con, "SELECT * FROM profil_badan_usaha WHERE jenis_profile='Klinik'");
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
                            <label>Profil Klinik</label>
                        </div>
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="<?= $k->id; ?>">
                            <textarea name="isi_profile" id="" class="form-control edit" cols="30" rows="50"><?= $k->isi_profile; ?></textarea>
                        </div>
                        <div class="col-md-10 offset-md-2">
                            <button type="submit" name="ubah_klinik" class="btn btn-success">Ubah</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="card">
            <div class="card-body">
                <div class="mt-2">
                    <h3>
                        Jadwal Praktek
                    </h3>
                    <button type="button" data-target="#tambah" data-toggle="modal" class="btn btn-primary"><em class="fas fa-plus"></em> Tambah Jadwal</button>
                    <div class="table-responsive-xl mt-3">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Aksi</th>
                                    <th>Hari</th>
                                    <th>Jam</th>
                                    <th>Kegiatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- hari senin -->
                                <?php
                                    $senin = mysqli_query($con, "SELECT * FROM jadwal_klinik WHERE hari='Senin'");
                                    while($jsn = mysqli_fetch_object($senin))
                                    {
                                        ?>
                                            <tr>
                                                <td><button title="Update" class="btn btn-info btn-sm"><em class="fas fa-edit"></em></button> <button title="Delete" class="btn btn-danger btn-sm"><em class="fas fa-trash-alt"></em></button></td>
                                                <td>Senin</td>
                                                <td><?= $jsn->jam_awal.' - '.$jsn->jam_akhir;?></td>
                                                <td><?= $jsn->kegiatan; ?></td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                                <!-- hari selasa -->
                                <?php
                                    $selasa = mysqli_query($con, "SELECT * FROM jadwal_klinik WHERE hari='Selasa'");
                                    while($jsl = mysqli_fetch_object($selasa))
                                    {
                                        ?>
                                            <tr>
                                                <td><button title="Update" class="btn btn-info btn-sm"><em class="fas fa-edit"></em></button> <button title="Delete" class="btn btn-danger btn-sm"><em class="fas fa-trash-alt"></em></button></td>
                                                <td>Selasa</td>
                                                <td><?= $jsl->jam_awal.' - '.$jsl->jam_akhir;?></td>
                                                <td><?= $jsl->kegiatan; ?></td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                                <!-- hari rabu -->
                                <?php
                                    $rabu = mysqli_query($con, "SELECT * FROM jadwal_klinik WHERE hari='Rabu'");
                                    while($jrb = mysqli_fetch_object($rabu))
                                    {
                                        ?>
                                            <tr>
                                                <td><button title="Update" class="btn btn-info btn-sm"><em class="fas fa-edit"></em></button> <button title="Delete" class="btn btn-danger btn-sm"><em class="fas fa-trash-alt"></em></button></td>
                                                <td>Rabu</td>
                                                <td><?= $jrb->jam_awal.' - '.$jrb->jam_akhir;?></td>
                                                <td><?= $jrb->kegiatan; ?></td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                                <!-- hari kamis -->
                                <?php
                                    $kamis = mysqli_query($con, "SELECT * FROM jadwal_klinik WHERE hari='Kamis'");
                                    while($jkm = mysqli_fetch_object($kamis))
                                    {
                                        ?>
                                            <tr>
                                                <td><button title="Update" class="btn btn-info btn-sm"><em class="fas fa-edit"></em></button> <button title="Delete" class="btn btn-danger btn-sm"><em class="fas fa-trash-alt"></em></button></td>
                                                <td>Kamis</td>
                                                <td><?= $jkm->jam_awal.' - '.$jkm->jam_akhir;?></td>
                                                <td><?= $jkm->kegiatan; ?></td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                                <!-- hari jum'at -->
                                <?php
                                    $jumat = mysqli_query($con, "SELECT * FROM jadwal_klinik WHERE hari='Jumat'");
                                    while($jjm = mysqli_fetch_object($jumat))
                                    {
                                        ?>
                                            <tr>
                                                <td><button title="Update" class="btn btn-info btn-sm"><em class="fas fa-edit"></em></button> <button title="Delete" class="btn btn-danger btn-sm"><em class="fas fa-trash-alt"></em></button></td>
                                                <td>Jum'at</td>
                                                <td><?= $jjm->jam_awal.' - '.$jjm->jam_akhir;?></td>
                                                <td><?= $jjm->kegiatan; ?></td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                                <!-- hari sabtu -->
                                <?php
                                    $sabtu = mysqli_query($con, "SELECT * FROM jadwal_klinik WHERE hari='Sabtu'");
                                    while($jsb = mysqli_fetch_object($sabtu))
                                    {
                                        ?>
                                            <tr>
                                                <td><button title="Update" class="btn btn-info btn-sm"><em class="fas fa-edit"></em></button> <button title="Delete" class="btn btn-danger btn-sm"><em class="fas fa-trash-alt"></em></button></td>
                                                <td>Sabtu</td>
                                                <td><?= $jsb->jam_awal.' - '.$jsb->jam_akhir;?></td>
                                                <td><?= $jsb->kegiatan; ?></td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                                <!-- hari minggu -->
                                <?php
                                    $minggu = mysqli_query($con, "SELECT * FROM jadwal_klinik WHERE hari='Minggu'");
                                    while($jmg = mysqli_fetch_object($minggu))
                                    {
                                        ?>
                                            <tr>
                                                <td><button title="Update" class="btn btn-info btn-sm"><em class="fas fa-edit"></em></button> <button title="Delete" class="btn btn-danger btn-sm"><em class="fas fa-trash-alt"></em></button></td>
                                                <td>Minggu</td>
                                                <td><?= $jmg->jam_awal.' - '.$jmg->jam_akhir;?></td>
                                                <td><?= $jmg->kegiatan; ?></td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'action/jadwal_klinik.php'; ?>
  </section>
</div>

