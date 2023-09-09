<!-- about -->
<section class="about" id="about">
     <div class="profile-section">
        <div>
            <div class="title">
                <h4>Klinik</h4>
                <hr>
            </div>
            <div class="content">
                <div class="container">
                    <p>
                        <?php
                            $sql_badan_usaha = mysqli_query($con, "SELECT * FROM profil_badan_usaha WHERE jenis_profile='Klinik'");
                            $data = mysqli_fetch_object($sql_badan_usaha);

                            echo $data->isi_profile;
                        ?>
                    </p>

                    <div class="alert alert-success">
                        Jadwal Praktik
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive-xl">
                                <table class="table table-border table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th>Hari</th>
                                            <th>Jam</th>
                                            <th>Kegiatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $q = mysqli_query($con, "SELECT * FROM jadwal_klinik");
                                            $sum = mysqli_num_rows($q);
                                            

                                            if($sum === 0)
                                            {
                                                ?>
                                                    <div class="alert alert-warning">
                                                        JADWAL KOSONG ADMIN BELUM ATUR JADWAL
                                                    </div>
                                                <?php
                                            }else{
                                                ?>
                                                    <!-- hari senin -->
                                                    <?php
                                                        $senin = mysqli_query($con, "SELECT * FROM jadwal_klinik WHERE hari='Senin'");

                                                        while($jadwal_senin = mysqli_fetch_object($senin))
                                                        {
                                                            ?>
                                                                <tr>
                                                                    <td><?= $jadwal_senin->hari; ?></td>
                                                                    <td><?= $jadwal_senin->jam_awal.' - '.$jadwal_senin->jam_akhir; ?></td>
                                                                    <td><?= $jadwal_senin->kegiatan; ?></td>
                                                                </tr>
                                                            <?php
                                                        }
                                                    ?>
                                                    <!-- hari selasa -->
                                                    <?php
                                                        $selasa = mysqli_query($con, "SELECT * FROM jadwal_klinik WHERE hari='Selasa'");

                                                        while($jadwal_selasa = mysqli_fetch_object($selasa))
                                                        {
                                                            ?>
                                                                <tr>
                                                                    <td><?= $jadwal_selasa->hari; ?></td>
                                                                    <td><?= $jadwal_selasa->jam_awal.' - '.$jadwal_selasa->jam_akhir; ?></td>
                                                                    <td><?= $jadwal_selasa->kegiatan; ?></td>
                                                                </tr>
                                                            <?php
                                                        }
                                                    ?>
                                                    <!-- hari rabu -->
                                                    <?php
                                                        $rabu = mysqli_query($con, "SELECT * FROM jadwal_klinik WHERE hari='Rabu'");

                                                        while($jadwal_rabu = mysqli_fetch_object($rabu))
                                                        {
                                                            ?>
                                                                <tr>
                                                                    <td><?= $jadwal_rabu->hari; ?></td>
                                                                    <td><?= $jadwal_rabu->jam_awal.' - '.$jadwal_rabu->jam_akhir; ?></td>
                                                                    <td><?= $jadwal_rabu->kegiatan; ?></td>
                                                                </tr>
                                                            <?php
                                                        }
                                                    ?>
                                                    <!-- hari kamis -->
                                                    <?php
                                                        $kamis = mysqli_query($con, "SELECT * FROM jadwal_klinik WHERE hari='Kamis'");

                                                        while($jadwal_kamis = mysqli_fetch_object($kamis))
                                                        {
                                                            ?>
                                                                <tr>
                                                                    <td><?= $jadwal_kamis->hari; ?></td>
                                                                    <td><?= $jadwal_kamis->jam_awal.' - '.$jadwal_kamis->jam_akhir; ?></td>
                                                                    <td><?= $jadwal_kamis->kegiatan; ?></td>
                                                                </tr>
                                                            <?php
                                                        }
                                                    ?>
                                                    <!-- hari jum'at -->
                                                    <?php
                                                        $day = "Jumat";
                                                        $jumat = mysqli_query($con, "SELECT * FROM jadwal_klinik WHERE hari='$day' ");

                                                        while($jadwal_jumat = mysqli_fetch_object($jumat))
                                                        {
                                                            ?>
                                                                <tr>
                                                                    <td>Jum'at</td>
                                                                    <td><?= $jadwal_jumat->jam_awal.' - '.$jadwal_jumat->jam_akhir; ?></td>
                                                                    <td><?= $jadwal_jumat->kegiatan; ?></td>
                                                                </tr>
                                                            <?php
                                                        }
                                                    ?>
                                                    <!-- hari sabtu -->
                                                    <?php
                                                        $sabtu = mysqli_query($con, "SELECT * FROM jadwal_klinik WHERE hari='Sabtu' ");

                                                        while($jadwal_sabtu = mysqli_fetch_object($sabtu))
                                                        {
                                                            ?>
                                                                <tr>
                                                                    <td>Sabtu</td>
                                                                    <td><?= $jadwal_sabtu->jam_awal.' - '.$jadwal_sabtu->jam_akhir; ?></td>
                                                                    <td><?= $jadwal_sabtu->kegiatan; ?></td>
                                                                </tr>
                                                            <?php
                                                        }
                                                    ?>
                                                    <!-- hari minggu -->
                                                    <?php
                                                        $minggu = mysqli_query($con, "SELECT * FROM jadwal_klinik WHERE hari='Minggu'");

                                                        while($jadwal_minggu = mysqli_fetch_object($minggu))
                                                        {
                                                            ?>
                                                                <tr>
                                                                    <td>Minggu</td>
                                                                    <td><?= $jadwal_minggu->jam_awal.' - '.$jadwal_minggu->jam_akhir; ?></td>
                                                                    <td><?= $jadwal_minggu->kegiatan; ?></td>
                                                                </tr>
                                                            <?php
                                                        }
                                                    ?>
                                                <?php
                                            }
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> <!-- end container -->
            </div>
        </div>
     </div>
 </section>
 <!-- end about -->