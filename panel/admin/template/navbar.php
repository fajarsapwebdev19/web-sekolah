<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <!-- SEARCH FORM -->
    <div class="text-black ml-2 mr-2 justify-content-center">
        <?php
            echo tanggal_indo(date('Y-m-d'), true);
        ?>
    </div>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                <em class="fas fa-user"></em> <?= $data_user->nama; ?>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="?page=profile"><em class="fas fa-user"></em> Profile</a>
                <a class="dropdown-item" href="?page=update_password"><em class="fas fa-key"></em> Update Password</a>
                <hr>
                <a class="dropdown-item" href="logout.php"><em class="fas fa-power-off text-red"></em> Logout</a>
            </div>
        </li>
    </ul>
</nav>