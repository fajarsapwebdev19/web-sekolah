<!-- about -->
<section class="about" id="about">
     <div class="profile-section">
        <div>
            <div class="title">
                <h4>Yayasan</h4>
                <hr>
            </div>
            <div class="content">
                <div class="container">
                    <p>
                        <?php
                                $sql_badan_usaha = mysqli_query($con, "SELECT * FROM profil_badan_usaha WHERE jenis_profile='Yayasan'");
                                $data = mysqli_fetch_object($sql_badan_usaha);


                                echo $data->isi_profile;
                        ?>
                    </p>
                </div> <!-- end container -->
            </div>
        </div>
     </div>
 </section>
 <!-- end about -->