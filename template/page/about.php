<!-- about -->
<section class="about" id="about">
     <div class="profile-section">
        <div>
            <div class="title">
                <h4>Profile <?= $data_about->nama_instansi; ?></h4>
                <hr>
            </div>
            <div class="content">
                <div class="container">
                    <p>
                        <?= $data_about->isi_about; ?>
                    </p>

                    <div class="visi">
                        <div class="alert alert-success">
                            Visi
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <p class="visi-content">
                                    <?= $data_about->visi; ?>
                                </p> <!-- end visi-content -->
                            </div>
                        </div>
                    </div> <!-- end visi-->

                    <div class="misi">
                        <div class="alert alert-info">
                            Misi
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="misi-content">
                                    <?= $data_about->misi; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end container -->
            </div>
        </div>
     </div>
 </section>
 <!-- end about -->