<?php
    session_start();
    require '../../../connection/database_connect.php';

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

    if(isset($_POST['add']))
    {
        $id = create_guid();
        $ver = mysqli_real_escape_string($con, $_POST['versi']);

        $add = mysqli_query($con, "INSERT INTO version (v_id,version,status) VALUES ('$id', '$ver', 'N')");

        if($add)
        {
            $_SESSION['val'] = '<div class="alert alert-success bg-success text-white" id="auto-close">
                <em class="fas fa-check-circle"></em> Berhasil Tambah Versi
            </div>';
            header('location: ../?page=version_control');
        }
    }
    else if(isset($_POST['activate']))
    {
        $id = mysqli_real_escape_string($con, $_POST['id']);

        $q = mysqli_query($con, "SELECT * FROM version WHERE v_id='$id'");
        $result = mysqli_fetch_object($q);

        if($result->status == "Y")
        {
            $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white" id="auto-close">
                <em class="fas fa-times-circle"></em> Gagal Aktivasi ! Dikarenakan Versi Sudah Aktif
            </div>';
            header('location: ../?page=version_control');
        }
        else
        {
            $q2 = mysqli_query($con, "SELECT * FROM version WHERE status='Y'");
            $r = mysqli_fetch_object($q2);
            $v_idr = $r->v_id;
            $active = mysqli_query($con, "UPDATE version SET status='N' WHERE v_id='$v_idr'");
            $active .= mysqli_query($con, "UPDATE version SET status='Y' WHERE v_id='$id'");

            if($active)
            {
                $_SESSION['val'] = '<div class="alert alert-success bg-success text-white" id="auto-close">
                <em class="fas fa-check-circle"></em> Berhasil Aktivasi Versi
                </div>';
                header('location: ../?page=version_control');
            }
        }
    }
    else if(isset($_POST['delete']))
    {
        $id = mysqli_real_escape_string($con, $_POST['id']);

        $q = mysqli_query($con, "SELECT * FROM version WHERE v_id='$id'");
        $result = mysqli_fetch_object($q);

        if($result->status == "Y")
        {
            $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white" id="auto-close">
                <em class="fas fa-times-circle"></em> Gagal Hapus ! Dikarenakan Versi Aktif
            </div>';
            header('location: ../?page=version_control');
        }else{
            $delete = mysqli_query($con, "DELETE FROM version WHERE v_id='$id'");

            if($delete)
            {
                $_SESSION['val'] = '<div class="alert alert-success bg-success text-white" id="auto-close">
                <em class="fas fa-check-circle"></em> Berhasil Hapus Versi
                </div>';
                header('location: ../?page=version_control');
            }
        }
    }
?>