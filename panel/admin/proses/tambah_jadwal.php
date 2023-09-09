<?php
    require '../../../connection/database_connect.php';
    session_start();

    $hari = $_POST['hari'];
    $mulai = $_POST['mulai'];
    $selesai = $_POST['selesai'];
    $kegiatan = $_POST['kegiatan'];

    $jumlah_data = count($hari);

    for($i=0; $i < $jumlah_data; $i++)
    {
        $tambah = mysqli_query($con, "INSERT INTO jadwal_klinik VALUES (NULL, '$hari[$i]', '$mulai[$i]', '$selesai[$i]', '$kegiatan[$i]')");
    }

    if($tambah)
    {
        $_SESSION['val'] = '<div class="alert alert-success bg-success text-white" id="auto-close">
            Berhasil Tambah Jadwal
        </div>';
        header('location: ../?page=klinik');
    }
?>