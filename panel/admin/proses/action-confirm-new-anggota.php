<?php
    session_start();
    require '../../../connection/database_connect.php';

    if(isset($_POST['confirm']))
    {
        $registrasi_id = mysqli_real_escape_string($con, $_POST['registrasi_id']);
        $status = "Terima";
        $tgl_terima = date('Y-m-d');

        $confirm = mysqli_query($con, "UPDATE registrasi_anggota SET status='$status', tgl_terima='$tgl_terima' WHERE registrasi_id='$registrasi_id'");

        if($confirm)
        {
            $_SESSION['val'] = '<div class="alert alert-success" id="auto-close">
                <em class="fas fa-check-circle"></em> Berhasil Terima Anggota
            </div>';
            header('location: ../?page=new_anggota');
        }
    }
    else if(isset($_POST['reject']))
    {
        $registrasi_id = mysqli_real_escape_string($con, $_POST['registrasi_id']);
        $status = "Tolak";
        $tgl_tolak = date('Y-m-d');

        $reject = mysqli_query($con, "UPDATE registrasi_anggota SET status='$status', tgl_tolak='$tgl_tolak' WHERE registrasi_id='$registrasi_id'");

        if($reject)
        {
            $_SESSION['val'] = '<div class="alert alert-success" id="auto-close">
                <em class="fas fa-check-circle"></em> Berhasil Tolak Anggota
            </div>';
            header('location: ../?page=new_anggota');
        }
    }
?>