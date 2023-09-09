<?php
    session_start();
    require '../../../connection/database_connect.php';

    if(isset($_POST['ubah_yayasan']))
    {
        if(isset($_POST['id']))
        {
            $id = mysqli_real_escape_string($con, $_POST['id']);
            $isi_profile = mysqli_real_escape_string($con, $_POST['isi_profile']);

            $ubah_yayasan = mysqli_query($con, "UPDATE profil_badan_usaha SET isi_profile='$isi_profile' WHERE id='$id'");

            if($ubah_yayasan)
            {
                $_SESSION['val'] = '<div class="alert alert-success bg-success text-white" id="auto-close">
                    Berhasil Ubah Isi Profil Yayasan
                </div>';
                header('location: ../?page=yayasan');
            }
        }
    }else if(isset($_POST['ubah_koperasi']))
    {
        if(isset($_POST['id']))
        {
            $id = mysqli_real_escape_string($con, $_POST['id']);
            $isi_profile = mysqli_real_escape_string($con, $_POST['isi_profile']);

            $ubah_koperasi = mysqli_query($con, "UPDATE profil_badan_usaha SET isi_profile='$isi_profile' WHERE id='$id'");

            if($ubah_koperasi)
            {
                $_SESSION['val'] = '<div class="alert alert-success bg-success text-white" id="auto-close">
                    Berhasil Ubah Isi Profil Koperasi
                </div>';
                header('location: ../?page=koperasi');
            }
        }
    }else if(isset($_POST['ubah_klinik']))
    {
        if(isset($_POST['id']))
        {
            $id = mysqli_real_escape_string($con, $_POST['id']);
            $isi_profile = mysqli_real_escape_string($con, $_POST['isi_profile']);

            $ubah_klinik = mysqli_query($con, "UPDATE profil_badan_usaha SET isi_profile='$isi_profile' WHERE id='$id'");

            if($ubah_klinik)
            {
                $_SESSION['val'] = '<div class="alert alert-success bg-success text-white" id="auto-close">
                    Berhasil Ubah Isi Profil Klinik
                </div>';
                header('location: ../?page=klinik');
            }
        }
    }
?>