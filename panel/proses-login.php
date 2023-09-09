<?php
    require '../connection/database_connect.php';
    session_start();

    
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $password = mysqli_real_escape_string($con, $_POST['password']);


        $query = mysqli_query($con, "SELECT * FROM user WHERE username LIKE '$username' AND password LIKE '$password'");
        
        $cek_data_user = mysqli_num_rows($query);

        if($cek_data_user > 0)
        {
            $data = mysqli_fetch_object($query);

            if($data->status_akun == "Tidak Aktif")
            {
                echo "Akun Non Active";
            }else
            {
                $_SESSION['login_status'] = "OKE";
                $_SESSION['username'] = $data->username;
                $date = date('Y-m-d H:i:s');
                $update = mysqli_query($con, "UPDATE user SET last_login='$date' WHERE username='$username'");
                echo "Berhasil";
            }
        }else{
            echo "Gagal";
        }
?>