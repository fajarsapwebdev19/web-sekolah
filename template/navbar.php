<div class="fixed-all">
    <!-- header -->
    <div class="header">
        <div class="container">
            <div class="d-flex justify-content-start align-content-center">
                <div class="images">
                    <img src="assets/galeri/vendor/<?= $data_about->logo; ?>" width="60" alt="logo-korpri-kabtang">
                </div>
                <div class="title-brand">
                    <h5><?= $data_about->nama_instansi; ?></h5>
                    <h6><?= $data_about->kab_kota; ?></h6>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->
    <!-- navbar menu -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-nav" id="navbar">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="container">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link auto-collapse" href="./">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link auto-collapse" href="?page=about">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link auto-collapse" href="?page=artikel">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link auto-collapse" href="https://ppdbsmkpgrineglasari.dev19.my.id">PPDB Online</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link auto-collapse" href="?page=info_ppdb">Informasi PPDB</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            Galeri
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="?page=foto">Foto</a>
                            <a class="dropdown-item" href="?page=video">Video</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link auto-collapse" href="?page=kontak">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end navbar menu -->
</div>