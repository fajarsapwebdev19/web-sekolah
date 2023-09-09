<?php
error_reporting(0);
    $artikel = mysqli_real_escape_string($con, $_GET['artikel']);

    $query = mysqli_query($con, "SELECT * FROM portal WHERE portal_id='$artikel'");
    $data = mysqli_fetch_object($query);

    if($data->create_date == NULL)
    {
        $date = "";
    }else{
        $date = date('d-m-Y', strtotime($data->create_date));
    }
?>
<section id="read">
    <div class="read-artikel">
        <div class="artikel-header">
            <div class="title">
                <h1><?= $data->judul_portal; ?></h1>
            </div>
            <div class="gambar">
                <img src="assets/galeri/vendor/<?= $data->foto_portal; ?>">
            </div>
            <div class="date-portal">
                <em class="fas fa-calendar"></em> <?= $date; ?> <em class="fas fa-user"></em> Admin
            </div>
        </div>
        <div class="content-artikel">
            <div class="container">
                <?= $data->konten_portal; ?>
            </div>
        </div>
    </div>
</section>