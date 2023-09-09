 <!-- carousel -->
 <section id="hero-area">
     <div id="slider-hero-nav"></div>
     <div class="owl-carousel" id="slider-hero">
         <?php
            $slider_query = mysqli_query($con, "SELECT * FROM slider_data");
            while($data_slider = mysqli_fetch_object($slider_query))
            {
                ?>
                    <div class="slider-item">
                        <div class="slider-item-img">
                            <img src="assets/galeri/vendor/<?= $data_slider->foto_slider; ?>" alt="">
                        </div>
                        <div class="slider-item-content">
                            <h2><?= $data_slider->judul_slider; ?></h2>
                            <p><?= $data_slider->kontent_slider; ?></p>
                        </div>
                    </div> 
                    <!-- end slider-item -->
                <?php
            }
         ?>
     </div>
 </section>
 <!-- end carousel -->

 <!-- portal -->
 <section id="portal">
     <div class="title">
         <h4>Berita Terbaru</h4>
         <hr>
     </div>
     <div class="container">
         <div class="row">
             <div class="col-xl-12 mb-4 mt-4">
                <?php
                    $query_portal = mysqli_query($con, "SELECT * FROM portal ORDER BY judul_portal ASC, create_date ASC LIMIT 3");
                    while($data_portal = mysqli_fetch_object($query_portal))
                    {
                        if($data_portal->create_date == NULL)
                        {
                            $date = "";
                        }
                        else
                        {
                            $date = date('d-m-Y', strtotime($data_portal->create_date));
                        }
                ?>
                <div class="mt-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="gambar">
                                        <img src="assets/galeri/vendor/<?= $data_portal->foto_portal; ?>" alt="">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="content-portal">
                                        <h5><?= $data_portal->judul_portal; ?></h5>
                                        <p class="content-time"><em class="fas fa-calendar-alt"></em> <?= $date; ?> <em class="fas fa-user"></em> Admin </p>
                                        <p> <?= substr($data_portal->konten_portal,0,150).'...' ?> </p>
                                            <div class="mt-2">
                                                <button type="button" onclick="javascript:window.location.href='?page=read&artikel=<?= $data_portal->portal_id ?>'" class="btn btn-primary">Selengkapnya</button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
             </div>
         </div>
         <div class="center col-md-12">
             <button type="button" onclick="javascript:window.location.href='?page=artikel'"
                 class="btn btn-selengkapnya">
                 Lihat Selengkapnya
             </button>
         </div>
 </section>
 <!-- end portal -->

 <!-- hubungan kemitraan -->
 <section id="team">
     <div class="container">
         <div class="title">
             <h4>Hubungan Kemitraan DU / DI</h4>
             <hr>
         </div>
         <div class="section-body">
            <?php
                $q_hub = mysqli_query($con, "SELECT * FROM hub_industri");
                $c_data_hub = mysqli_num_rows($q_hub);
                if($c_data_hub == 0)
                {
                    ?>
                        <div class="alert alert-warning">
                            Data Hubungan Kemitraan DU/DI Kosong !
                        </div>
                    <?php
                }
            ?>
             <div class="owl-carousel" id="du-slider">
                 <?php
                    while($d_hub = mysqli_fetch_object($q_hub))
                    {
                        ?>
                            <div class="section-item-slider">
                                <div class="section-item-thumbnail">
                                    <img src="assets/galeri/foto/hubungan-industri/<?= $d_hub->logo_perusahaan; ?>"
                                        alt="<?= $d_hub->nama_perusahaan; ?>">
                                </div>
                                <div class="section-item-caption">
                                    <a>
                                        <h5>
                                            <?= $d_hub->nama_perusahaan; ?>
                                        </h5>
                                    </a>
                                </div>
                            </div>
                            <!--  end section item slider -->
                        <?php
                    }
                 ?>
             </div>
         </div>
     </div>
 </section>
 <!-- end hubungan kemitraan -->

 <!-- team -->
 <section id="team">
     <div class="container">
         <div class="title">
             <h4>Pendidik Dan Tenaga Kependidikan</h4>
             <hr>
         </div>
         <div class="section-body">
             <?php
                $d_ptk = mysqli_query($con, "SELECT * FROM ptk ORDER BY id_anggota ASC");
                $c_ptk = mysqli_num_rows($d_ptk);

                if($c_ptk == 0)
                {
                    ?>
                        <div class="alert alert-warning">
                            Data Pendidik Dan Tenaga Pendidik Kosong !
                        </div>
                    <?php
                }
             ?>

            <div class="owl-carousel" id="team-slider">
                 <?php
                    while($ptk = mysqli_fetch_object($d_ptk))
                    {
                        ?>
                            <div class="section-item-slider">
                                <div class="section-item-thumbnail">
                                    <?php
                                        if($ptk->foto == NULL)
                                        {
                                            if($ptk->jk == "Laki-Laki")
                                            {
                                                ?>
                                                    <img src="assets/galeri/foto/male-ptk.jpg" alt="<?= $ptk->nama; ?>">
                                                <?php
                                            }
                                            else if($ptk->jk == "Perempuan")
                                            {
                                                ?>
                                                    <img src="assets/galeri/foto/female-ptk.jpg" alt="<?= $ptk->nama; ?>">
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <img src="assets/galeri/foto/anggota/<?= $ptk->foto; ?>" alt="<?= $ptk->nama; ?>">
                                            <?php
                                        }
                                    ?>
                                </div>
                                <div class="section-item-caption">
                                    <a>
                                        <h5>
                                            <?= $ptk->nama; ?>
                                        </h5>
                                    </a>
                                    <a>
                                        <h6>
                                            <?= $ptk->jabatan; ?>
                                        </h6>
                                    </a>
                                </div>
                            </div>
                            <!--  end section item slider -->
                        <?php
                    }
                 ?>
             </div>
         </div>
     </div>
 </section>
 <!-- end team -->

 <!-- galeri -->
 <section id="galeri" class="galeri">
     <div class="container">
         <div class="title">
             <h4>Galeri</h4>
             <hr>
         </div>
         <div class="row">
             <?php
                $em_yt = mysqli_query($con, "SELECT * FROM video_upload LIMIT 6");
                
                $yt_count = mysqli_num_rows($em_yt);

                if($yt_count === 0){
                    ?>
                        <div class="col-md-12">
                            <div class="alert alert-warning">
                                Video Kosong
                            </div>
                        </div>
                    <?php
                }else{
                    while($yt = mysqli_fetch_object($em_yt))
                    {
                        ?>
                            <div class="col-md-6 col-sm-4 col-xl-4 mt-2">
                                <div class="galeri-embed">
                                    <iframe src="<?= $yt->link_embed; ?>"></iframe>
                                </div>
                            </div>
                        <?php
                    }
                }
            ?>
         </div>

         <?php
            if($yt_count > 0)
            {
                ?>
                    <div class="center">
                        <button type="button" onclick="javascript:window.location.href='?page=video'" class="btn btn-selengkapnya">
                            Lihat Selengkapnya
                        </button>
                    </div>
                <?php
            }
         ?>
     </div>
 </section>
 <!-- end galeri -->