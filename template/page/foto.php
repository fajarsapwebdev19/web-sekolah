<!-- galeri foto -->
<section id="galeri" class="galeri">
     <div class="container">
         <div class="title">
             <h4>Foto</h4>
             <hr>
         </div>
         <div class="row">
            <?php
                    $query_foto = mysqli_query($con, "SELECT * FROM foto_upload ORDER BY date_upload ASC");
                    while($data_foto = mysqli_fetch_object($query_foto)){
                        if(empty($data_foto))
                        {
                            ?>
                                <div class="alert alert-info text-left">
                                    Foto Kosong
                                </div>
                            <?php
                        }else{
                            ?>
                                <div class="col-sm-4 col-md-6 col-xl-4 mt-3">
                                    <div class="foto-section">
                                        <div class="foto">
                                            <img src="assets/galeri/foto/<?= $data_foto->file; ?>" alt="<?= $data_foto->judul_file;?>">
                                        </div>
                                    </div>
                                </div>
                                
                            <?php
                        }
                        
                    }

                ?>
         </div>
         <div class="foto-content">
             <div class="foto-container">
                 
             </div> <!-- end video-container -->

             <div class="popup-foto">
                 <span>&times;</span>
                 <img src="" alt="View">
             </div> <!-- end popup-foto -->
         </div> <!-- end foto content-->
     </div>
 </section>
 <!-- end galeri foto -->