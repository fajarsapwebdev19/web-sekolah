<!-- galeri -->
<section id="galeri" class="galeri">
     <div class="container">
         <div class="title">
             <h4>Video</h4>
             <hr>
         </div>
         <div class="row">
            <?php
                $em_yt = mysqli_query($con, "SELECT * FROM video_upload");
                
                $yt_count = mysqli_num_rows($em_yt);

                if($yt_count === 0){
                    ?>
                        <div class="alert alert-warning">
                            Video Kosong
                        </div>
                    <?php
                }else{
                    while($yt = mysqli_fetch_object($em_yt))
                    {
                        ?>
                            <div class="col-md-6 col-sm-4 col-xl-4 mt-2">
                                <div class="galeri-embed">
                                    <iframe src="<?= $yt->link_embed; ?>" frameborder="0"></iframe>
                                </div>
                            </div>
                        <?php
                    }
                }
            ?>
         </div>
     </div>
 </section>
 <!-- end galeri -->