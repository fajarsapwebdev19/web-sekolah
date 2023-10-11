<?php
    require '../../../connection/database_connect.php';
    session_start();

    function guidv4($data = null) {
        // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
        $data = $data ?? random_bytes(16);
        assert(strlen($data) == 16);
    
        // Set version to 0100
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        // Set bits 6-7 to 10
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    
        // Output the 36 character UUID.
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

    if(isset($_POST['tambah']))
    {
        $id = strtoupper(guidv4());
        $judul = mysqli_real_escape_string($con, $_POST['judul']);
        $pesan = mysqli_real_escape_string($con, $_POST['message']);
        $account = $_SESSION['username'];
        $date = date("Y-m-d");
        $time = date("H:i:s");

        $tambah = mysqli_query($con, "INSERT INTO info_hd (id_info, judul, username, date, time, message) VALUES ('$id', '$judul', '$account', '$date', '$time', '$pesan')");

        if($tambah)
        {
            $_SESSION['val'] = '<div class="alert alert-success bg-success text-white" id="auto-close">
                Berhasil Tambah Info
            </div>';
            header('location: ../?page=info_hd');
        }
    }
    else if(isset($_POST['yakin']))
    {
        if(isset($_POST['id']))
        {
            $id = mysqli_real_escape_string($con, $_POST['id']);
           
            $sql = mysqli_query($con, "DELETE FROM info_hd WHERE id_info='$id'");

            if($sql)
            {
                $_SESSION['val'] = '<div class="alert alert-success bg-success text-white" id="auto-close">
                    Berhasil Hapus Info !
                </div>';
                header('location: ../');
            }
        }
    }

   
?>