<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="./" class="text-center brand-link">
        <span class="brand-text font-weight-light">Panel Website</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php
                if ($data_user->jk == "Laki-Laki") {
                ?>
                    <img src="../assets/vendor/male.jpg" class="img-circle elevation-2" alt="User Image">
                <?php
                } else if ($data_user->jk == "Perempuan") {
                ?>
                    <img src="../assets/vendor/female.jpg" class="img-circle elevation-2" alt="User Image">
                <?php
                }
                ?>
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $data_user->nama; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="./" class="nav-link <?php if(!$page) {echo 'active';}?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=account" class="nav-link <?php if($page == "account"){echo 'active'; }?>">
                        <i class="nav-icon fas fa-user-lock"></i>
                        <p>
                            Manajemen Akun
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=slider" class="nav-link <?= $page == 'slider' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Slider
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=portal" class="nav-link <?= $page == 'portal' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Portal Berita
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=about" class="nav-link <?= $page == 'about' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-info"></i>
                        <p>
                            Profil      
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=anggota" class="nav-link <?= $page == 'anggota' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>
                            PTK
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=hub" class="nav-link <?= $page == 'hub' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                            Hubungan Kemitraan
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview <?= $page == 'galery_foto' || $page == "galery_video" ? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link <?= $page == 'galery_foto' || $page == "galery_video" ? 'active' : ''; ?>">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Galeri
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="?page=galery_foto" class="nav-link <?= $page == 'galery_foto' ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Foto</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=galery_video" class="nav-link <?= $page == 'galery_video' ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Video</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="?page=kontak" class="nav-link <?= $page == 'kontak' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>
                            Kontak
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=logs" class="nav-link <?= $page == 'logs' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-sync"></i>
                        <p>
                            Riwayat Pembaruan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=help" class="nav-link <?= $page == 'help' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>
                            Bantuan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link bg-danger text-center">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>