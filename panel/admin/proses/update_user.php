<?php
    require '../../../connection/database_connect.php';

    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $jenis_kelamin = mysqli_real_escape_string($con, $_POST['jenis_kelamin']);
    $tgl_lahir = mysqli_real_escape_string($con, date('Y-m-d', strtotime($_POST['tgl_lahir'])));
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $username = mysqli_real_escape_string($con, $_POST['username']);

    $update = mysqli_query($con, "UPDATE user SET nama='$nama',jk='$jenis_kelamin',tgl_lahir='$tgl_lahir',email='$email' WHERE username='$username'");

    if($update)
    {
        echo "Berhasil";
    }
?>