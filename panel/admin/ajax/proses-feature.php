<?php
    require '../../../connection/database_connect.php';

    $id = mysqli_real_escape_string($con, $_POST['id']);
    $jenis = mysqli_real_escape_string($con, $_POST['jenis']);
    $deskripsi = mysqli_real_escape_string($con, $_POST['deskripsi']);
    $date = date("Y-m-d");
    $time = date("H:i:s");

    if($jenis == "" && $deskripsi == "")
    {
        echo "null";
    }else{
        $q = mysqli_query($con, "INSERT INTO version_control (id, v_id, jenis, deskripsi, date, time) VALUES (NULL,'$id', '$jenis', '$deskripsi', '$date', '$time')");

        if($q)
        {
            echo "berhasil";
        }
    }
?>