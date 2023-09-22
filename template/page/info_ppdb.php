<section class="about">
    <div class="container">
        <h3><em class="fas fa-bullhorn"></em> Informasi PPDB</h3>

        <div class="alert alert-info bg-info text-left text-white">
            <em class="fas fa-info-circle"></em> Di Halaman Ini Berisi Informasi Tentang Penerimaan Peserta Didik Baru
        </div>

        <div class="card mb-2">
            <?php
                $info_ppdb = mysqli_query($con, "SELECT * FROM info_ppdb");
                while($i_p = mysqli_fetch_object($info_ppdb))
                {
                    ?>
                        <div class="card-body">
                            <h2><em class="fas fa-bullhorn"></em> <?= $i_p->judul; ?></h2>
                            <p class="container">
                                <?= $i_p->isi; ?>
                            </p>
                        </div>
                    <?php
                }
            ?>
        </div>
    </div>
</section>