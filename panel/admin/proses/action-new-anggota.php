<?php
    require '../../../connection/database_connect.php';
    session_start();

    if(isset($_POST['delete']))
    {
        $id = mysqli_real_escape_string($con, $_POST['id']);

        $delete = mysqli_query($con, "DELETE FROM registrasi_anggota WHERE registrasi_id='$id'");
        $delete .= mysqli_query($con, "ALTER TABLE registrasi_anggota AUTO_INCREMENT=1");

        if($delete)
        {
            $_SESSION['val'] = '<div class="alert alert-success text-white bg-success">
                Berhasil Hapus Data !
            </div>';
            header('location: ../?page=new_anggota');
        }
    }
?>