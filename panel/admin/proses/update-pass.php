<?php
    require '../../../connection/database_connect.php';

    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password_lama = mysqli_real_escape_string($con, $_POST['password_lama']);
    $password_baru = mysqli_real_escape_string($con, $_POST['password_baru']);
    $konfirmasi_pass_baru = mysqli_real_escape_string($con, $_POST['konfirmasi_password_baru']);

    // cek password lama
    $qc1 = mysqli_query($con, "SELECT * FROM user WHERE password='$password_lama'");

    $cek_pass_lama = mysqli_num_rows($qc1);

    // kondisi jika password lama ada di database pengguna
    if($cek_pass_lama > 0)
    {
        // kondisi jika password baru dan konfirmasi sama
        if($password_baru == $konfirmasi_pass_baru)
        {
            $update_password = mysqli_query($con, "UPDATE user SET password='$password_baru' WHERE username='$username'");

            if($update_password){
                echo "berhasil";
            }
            // jika konfirmasi password tidak sama
        }else{
            echo "konf-pass-invalid";
        }
        // jika password lama tidak di temukan
    }else{
        echo "pass-lama-invalid";
    }
?>