<!-- contact -->
<section id="contact" class="contact">
     <div class="container">
         <div class="title">
             <h4>Kontak</h4>
             <hr>
         </div>
         <div class="content">
             <div class="card">
                 <div class="card-body">
                     <div class="title-kontak">
                         <em class="fas fa-map-marker-alt"></em> Alamat
                     </div>
                     <div class="isi-kontak">
                         <?= $data_kontak->alamat; ?>
                     </div>
                     <div id="telp" <?php if($data_kontak->view_telp == "N"){echo 'style="display:none"'; }else{echo 'style= "display:block"';}?>>
                        <div class="title-kontak">
                            <em class="fas fa-phone"></em> Telp
                        </div>
                        <div class="isi-kontak">
                            <?= $data_kontak->no_telp; ?>
                        </div>
                     </div>
                     <div id="email" <?php if($data_kontak->view_email == "N"){echo 'style="display:none;"';}else{echo 'style="display:block;"';}?>>
                        <div class="title-kontak">
                            <em class="fas fa-envelope"></em> Email
                        </div>
                        <div class="isi-kontak">
                            <?= $data_kontak->email; ?>
                        </div>
                     </div>
                     <div id="wa" <?php if($data_kontak->view_wa == "N"){echo 'style="display:none;"';}else{echo 'style="display:block;"';}?>>
                        <div class="title-kontak">
                            <em class="fab fa-whatsapp"></em> Whatsapp
                        </div>
                        <div class="isi-kontak">
                            <?= $data_kontak->no_wa; ?>
                        </div>
                     </div>
                     <div id="fb" <?php if($data_kontak->view_fb == "N"){echo 'style="display:none;"';}else{echo 'style="display:block;"';}?>>
                        <div class="title-kontak">
                            <em class="fab fa-facebook"></em> Facebook
                        </div>
                        <div class="isi-kontak">
                            <?= $data_kontak->user_fb; ?>
                        </div>
                     </div>
                     <div id="ig" <?php if($data_kontak->view_ig == "N"){echo 'style="display:none;"';}else{echo 'style="display:block;"';}?>>
                        <div class="title-kontak">
                            <em class="fab fa-instagram"></em> Instagram
                        </div>
                        <div class="isi-kontak">
                            <?= $data_kontak->user_ig; ?>
                        </div>
                     </div>
                     <div id="yt" <?php if($data_kontak->view_yt == "N"){echo 'style="display:none;"';}else{echo 'style="display:block;"';}?>>
                        <div class="title-kontak">
                            <em class="fab fa-youtube"></em> Youtube
                        </div>
                        <div class="isi-kontak">
                            <?= $data_kontak->user_yt; ?>
                        </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="peta-kantor">
             <div class="alert alert-warning">
                 Peta Kantor
             </div>
             <div class="mapouter">
                 <div class="gmap_canvas">
                     <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?= $data_kontak->link_alamat; ?>"></iframe>
              </div>
              <style>
                .mapouter{position:relative; width:100%;height:400px;}
                .gmap_canvas {overflow:hidden;background:none!important; width:100%; height:400px;}
                .gmap_iframe {max-width: 100%; height:400px!important;}
              </style>
            </div>
          </div>
        </div>
      </section>
      <!-- end contact -->