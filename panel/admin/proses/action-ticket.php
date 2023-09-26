<?php
    session_start();

    require_once('../../../connection/database_connect.php');
    $number = mt_rand(111, 999).rand(0,99).date('dmYHi');
    $perihal = mysqli_real_escape_string($con, $_POST['perihal']);
    if($perihal == "Perbaikan")
    {
        $kd = "T-PRBSLV-";
    }
    else if ($perihal == "Tambah Fitur")
    {
        $kd = "T-ADDFTR-";
    }
    else if ($perihal == "Kendala")
    {
        $kd = "T-ERR-";
    }
    else if($perihal == "Tambah User")
    {
        $kd = "T-ADDUSER-";
    }
    $no_ticket = $kd."".$number;
    $isi = mysqli_real_escape_string($con, $_POST['isi']);
    $username = $_SESSION['username'];
    $status = "Menunggu";
    $tanggal = date("Y-m-d");
    $waktu = date("H:i:s");
    
    if(empty($_FILES['lampiran']['name']))
    {
        $lampiran = "";
        $query = mysqli_query($con, "INSERT INTO ticket (no_ticket, username, tanggal, waktu, perihal, isi, lampiran, status, balasan) VALUES ('$no_ticket', '$username', '$tanggal', '$waktu', '$perihal', '$isi', '$lampiran', '$status', '')");

        if($query)
        {
            $_SESSION['val'] = '<div class="alert alert-success" id="auto-close">
                <em class="fas fa-check-circle"></em> Berhasi Tambah Tiket
            </div>';
            header('location: ../?page=ticket');
        }
    }else{
        $maxsize = 5*1024*1024; //ukuran max file 5mb
        $tmp = $_FILES['lampiran']['tmp_name'];
        $size = $_FILES['lampiran']['size'];
        $allowedExtensions = array("jpg", "jpeg", "png");
        $file_extension = pathinfo($_FILES['lampiran']['name'], PATHINFO_EXTENSION);

        if($size > $maxsize)
        {
            $_SESSION['val'] = '<div class="alert alert-danger" id="auto-close">
                <em class="fas fa-info-circle"></em> Gagal ! Ukuran File Max 5mb
            </div>';
            header('location: ../?page=ticket');
        }
        else
        {
            if (!in_array(strtolower($file_extension), $allowedExtensions)) {
                $_SESSION['val'] = '<div class="alert alert-danger" id="auto-close"><div class="alert-message"><em class="fas fa-info-circle"></em> Extensi File Tidak Valid. Format harus jpg,jpeg,png</div></div>';
                header('location: ../?page=ticket');
            }
            else
            {
                // Validasi tipe MIME
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mime = finfo_file($finfo, $tmp);
                finfo_close($finfo);
        
                $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        
                if (!in_array($mime, $allowedMimeTypes)) {
                    $_SESSION['val'] = '<div class="alert alert-warning" id="auto-close"><div class="alert-message"><em class="fas fa-info-circle"></em> File Tidak Valid ! Jangan Memodifikasi File Sembarangan !</div></div>';
                    header('location: ../?page=ticket');
                }
                else
                {
                    $filename = $no_ticket.'.'.$file_extension;
                    $dir = "../../assets/docs/tiket/".$filename;

                    $query = mysqli_query($con, "INSERT INTO ticket (no_ticket, username, tanggal, waktu, perihal, isi, lampiran, status, balasan) VALUES ('$no_ticket', '$username', '$tanggal', '$waktu', '$perihal', '$isi', '$filename', '$status', '')");

                    if($query)
                    {
                        $_SESSION['val'] = '<div class="alert alert-success" id="auto-close">
                            <em class="fas fa-check-circle"></em> Berhasi Tambah Tiket
                        </div>';
                        move_uploaded_file($tmp, $dir);
                        header('location: ../?page=ticket');
                    }
                }
            }
        }
    }
?>