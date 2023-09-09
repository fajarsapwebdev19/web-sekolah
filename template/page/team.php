<!-- team -->
<section id="team">
     <div class="container">
         <div class="title">
             <h4>Team</h4>
             <hr>
         </div>
         <div class="section-body">
             <div class="owl-carousel" id="team-slider">
                 <?php
                    $query_anggota = mysqli_query($con, "SELECT * FROM anggota");
                    while($data_anggota = mysqli_fetch_object($query_anggota)){
                        ?>
                            <div class="section-item-slider">
                                <div class="section-item-thumbnail">
                                    <img src="assets/galeri/foto/anggota/<?= $data_anggota->foto; ?>" alt="<?= $data_anggota->nama; ?>">
                                </div>
                                <div class="section-item-caption">
                                    <a>
                                        <h5>
                                            <?= $data_anggota->nama; ?>
                                        </h5>
                                    </a>
                                    <a>
                                        <h6>
                                            <?= $data_anggota->jabatan; ?>
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