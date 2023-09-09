<!-- portal -->
<section id="portal">
     <div class="title">
         <h4>Berita</h4>
         <hr>
     </div>
     <div class="container">
         <?php
            $query_portal = mysqli_query($con, "SELECT * FROM portal ORDER BY judul_portal ASC, create_date ASC");
            while($data_portal = mysqli_fetch_object($query_portal))
            {
                if($data_portal->create_date == NULL)
                {
                    $date = "";
                }else{
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
                                                <p class="content-time"><em class="fas fa-calendar-alt"></em> <?= $date; ?> <em class="fas fa-user"></em> Admin</p>
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
 </section>
 <!-- end portal -->