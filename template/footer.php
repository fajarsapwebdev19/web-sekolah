<footer id="kontak">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="footer-col">
                    <h4>
                        <?= $data_about->nama_instansi; ?>
                    </h4>
                    <h5>
                        <?= $data_about->kab_kota; ?>
                    </h5>
                    <p class="profile">
                        <?= substr($data_about->isi_about, 0,280)."..."; ?>
                    </p>
                    <p class="tentang">Jangan Lupa Ikuti Akun Sosial Media Kami Agar Tidak Ketinggalan Berita Terbaru !</p>
                    <ul class="sosmed">
                        <li>
                            <a href="<?= $data_kontak->link_fb; ?>" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?= $data_kontak->link_ig; ?>" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?= $data_kontak->link_yt; ?>" target="_blank">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footer-col">
                    <h2>Kontak Kami</h2>
                    <p class="alamat"> Alamat : <?= $data_kontak->alamat; ?></p>
                    <ul class="kontak">
                        <li><i class="fas fa-phone"></i> Telp : <?= $data_kontak->no_telp; ?> </li>
                        <li><i class="fas fa-envelope"></i> <?= $data_kontak->email; ?> </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-col">
                    <h2>Navigasi</h2>
                    <ul class="footer-nav">
                        <li><a href="?page=artikel">Berita</a></li>
                        <li><a href="?page=about">Tentang Kami</a></li>
                        <li><a href="?page=kontak">Kontak</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Row -->
    </div>
    <!--container-->
    <div class="footer-copyright">
        <div class="container text-center">
            <h6>Hak cipta dilindungi. © <?= date('Y')?> <a href="#"> <?= $data_about->nama_instansi; ?> </a></h6>
        </div>
    </div>
</footer>