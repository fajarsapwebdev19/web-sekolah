<?php
    require '../connection/database_connect.php';

    $id = mt_rand().rand();
    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $jenis_kelamin = mysqli_real_escape_string($con, $_POST['jenis_kelamin']);
    $nik = mysqli_real_escape_string($con, $_POST['nik']);
    $notelp = mysqli_real_escape_string($con, $_POST['notelp']);
    $instansi = mysqli_real_escape_string($con, $_POST['instansi']);
    $alamat = mysqli_real_escape_string($con, $_POST['alamat']);

    if(empty($nama && $jenis_kelamin && $nik && $notelp && $instansi && $alamat))
    {
        echo "kosong";
    }else{
        $date = date('Y-m-d');

        $tambah = mysqli_query($con, "INSERT INTO registrasi_anggota VALUES ('$id', '$nama', '$jenis_kelamin', '$nik','$notelp', '$instansi', 'Menunggu', '$date', NULL, NULL)");

        if($tambah)
        {
            echo "Berhasil";
        }
    }


    
?>