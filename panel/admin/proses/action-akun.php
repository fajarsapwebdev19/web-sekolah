<?php
    session_start();

    require '../../../connection/database_connect.php';

    if(isset($_POST['tambah']))
    {
        // create guid to use id
        function create_guid() {
            $guid = '';
            $namespace = rand(11111, 99999);
            $uid = uniqid('', true);
            $data = $namespace;
            $data .= $_SERVER['REQUEST_TIME'];
            $data .= $_SERVER['HTTP_USER_AGENT'];
            $data .= $_SERVER['REMOTE_ADDR'];
            $data .= $_SERVER['REMOTE_PORT'];
            $hash = strtoupper(hash('ripemd128', $uid . $guid . md5($data)));
            $guid = substr($hash,  0,  8) . '-' .
                    substr($hash,  8,  4) . '-' .
                    substr($hash, 12,  4) . '-' .
                    substr($hash, 16,  4) . '-' .
                    substr($hash, 20, 12);
            return $guid;
        }

        $id = create_guid();
        $nama = mysqli_real_escape_string($con, $_POST['nama']);
        $jenis_kelamin = mysqli_real_escape_string($con, $_POST['jenis_kelamin']);
        $tgl_lahir = mysqli_real_escape_string($con, date('Y-m-d', strtotime($_POST['tgl_lahir'])));
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $status_akun = "Aktif";
        $create_date = date('Y-m-d');
        $last_login = NULL;
        $role = "Admin";

        $tambah = mysqli_query($con, "INSERT INTO user VALUES ('$id', '$nama', '$jenis_kelamin','$tgl_lahir', '$username', '$password', '$email', '$status_akun', '$create_date', NULL, '$role')");

        if($tambah)
        {
            $_SESSION['val'] = '<div class="alert alert-success" id="auto-close">
                <em class="fas fa-check-circle"></em> Berhasil Tambah Akun
            </div>';
            header('location: ../?page=account');
        }
    }
    else if(isset($_POST['ubah']))
    {
        if(isset($_POST['user_id']))
        {
            $id_user = mysqli_real_escape_string($con, $_POST['user_id']);
            $nama = mysqli_real_escape_string($con, $_POST['nama']);
            $jenis_kelamin = mysqli_real_escape_string($con, $_POST['jenis_kelamin']);
            $tgl_lahir = mysqli_real_escape_string($con, date('Y-m-d', strtotime($_POST['tgl_lahir'])));
            $username = mysqli_real_escape_string($con, $_POST['username']);
            $password = mysqli_real_escape_string($con, $_POST['password']);
            $email = mysqli_real_escape_string($con, $_POST['email']);

            $update = mysqli_query($con, "UPDATE user SET nama='$nama',jk='$jenis_kelamin',tgl_lahir='$tgl_lahir',username='$username',password='$password',email='$email' WHERE id_user='$id_user'");

            if($update)
            {
                $_SESSION['val'] = '<div class="alert alert-success" id="auto-close">
                    <em class="fas fa-check-circle"></em> Berhasil Update Akun
                </div>';
                header('location: ../?page=account');
            }
            
        }
    }
    else if(isset($_POST['hapus']))
    {
        $id_user = mysqli_real_escape_string($con, $_POST['id_user']);

        $delete = mysqli_query($con, "DELETE FROM user WHERE id_user='$id_user'");

        if($delete)
        {
            $_SESSION['val'] = '<div class="alert alert-success" id="auto-close">
                <em class="fas fa-check-circle"></em> Berhasil Hapus Akun
            </div>';
            header('location: ../?page=account');
        }
    }
?>