<?php
    require '../../../connection/database_connect.php';
    session_start();

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

    if(isset($_POST['tambah']))
    {
        $id = create_guid();
        $judul = mysqli_real_escape_string($con, $_POST['judul']);
        $isi = mysqli_real_escape_string($con, $_POST['isi']);
        $tanggal = date("Y-m-d");
        $waktu = date("H:i:s");

        $tambah = mysqli_query($con, "INSERT INTO info_ppdb (info_id, judul, tanggal, waktu, isi) VALUES ('$id', '$judul', '$tanggal', '$waktu', '$isi')");


        if($tambah)
        {
            $_SESSION['val'] = '<div class="alert alert-success" id="auto-close">
                <em class="fas fa-check-circle"></em> Berhasil Tambah Info PPDB
            </div>';
            header('location: ../?page=info_ppdb');
        }

    }
    else if(isset($_POST['simpan']))
    {
        $info_id = mysqli_real_escape_string($con, $_POST['info_id']);
        $judul = mysqli_real_escape_string($con, $_POST['judul']);
        $isi = mysqli_real_escape_string($con, $_POST['isi']);

        $ubah = mysqli_query($con, "UPDATE info_ppdb SET judul='$judul', isi='$isi' WHERE info_id='$info_id'");

        if($ubah)
        {
            $_SESSION['val'] = '<div class="alert alert-success" id="auto-close">
                <em class="fas fa-check-circle"></em> Berhasil Ubah Info PPDB
            </div>';
            header('location: ../?page=info_ppdb');
        }
    }
    else if(isset($_POST['hapus']))
    {
        $info_id = mysqli_real_escape_string($con, $_POST['info_id']);

        $delete = mysqli_query($con, "DELETE FROM info_ppdb WHERE info_id='$info_id'");

        if($delete)
        {
            $_SESSION['val'] = '<div class="alert alert-success" id="auto-close">
                <em class="fas fa-check-circle"></em> Berhasil Hapus Info PPDB
            </div>';
            header('location: ../?page=info_ppdb');
        }
    }
?>