<!-- about -->
<section class="about" id="about">
     <div class="profile-section">
        <div>
            <div class="title">
                <h4>Koperasi</h4>
                <hr>
            </div>
            <div class="content">
                <div class="container">
                    <p>
                        <?php
                            $sql_badan_usaha = mysqli_query($con, "SELECT * FROM profil_badan_usaha WHERE jenis_profile='Koperasi'");
                            $data = mysqli_fetch_object($sql_badan_usaha);


                            echo $data->isi_profile;

                            ?>
                                <div class="text-center">
                                    <button onclick="javascript:window.location.href='?page=registrasi_anggota'" class="btn btn-success">Klik Disini Untuk Mendaftar</button>
                                </div>
                            <?php
                        ?>
                    </p>
                    
                </div> <!-- end container -->
            </div>
        </div>
     </div>
 </section>
 <!-- end about -->