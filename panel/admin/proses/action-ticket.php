<?php
session_start();

require_once('../../../connection/database_connect.php');

if (isset($_POST['tambah'])) 
{
    $number = mt_rand(111, 999) . rand(0, 99) . date('dmYHi');
    $perihal = mysqli_real_escape_string($con, $_POST['perihal']);
    if ($perihal == "Perbaikan") {
        $kd = "T-PRBSLV-";
    } else if ($perihal == "Tambah Fitur") {
        $kd = "T-ADDFTR-";
    } else if ($perihal == "Kendala") {
        $kd = "T-ERR-";
    } else if ($perihal == "Tambah User") {
        $kd = "T-ADDUSER-";
    }
    $no_ticket = $kd . "" . $number;
    $isi = mysqli_real_escape_string($con, $_POST['isi']);
    $username = $_SESSION['username'];
    $status = "Menunggu";
    $tanggal = date("Y-m-d");
    $waktu = date("H:i:s");

    if (empty($_FILES['lampiran']['name'])) {
        $lampiran = "";
        $query = mysqli_query($con, "INSERT INTO ticket (no_ticket, username, tanggal, waktu, perihal, isi, lampiran, status, balasan) VALUES ('$no_ticket', '$username', '$tanggal', '$waktu', '$perihal', '$isi', '$lampiran', '$status', '')");

        if ($query) {
            $_SESSION['val'] = '<div class="alert alert-success" id="auto-close">
                <em class="fas fa-check-circle"></em> Berhasi Tambah Tiket
            </div>';
            header('location: ../?page=ticket');
        }
    } else {
        $maxsize = 5 * 1024 * 1024; //ukuran max file 5mb
        $tmp = $_FILES['lampiran']['tmp_name'];
        $size = $_FILES['lampiran']['size'];
        $allowedExtensions = array("jpg", "jpeg", "png");
        $file_extension = pathinfo($_FILES['lampiran']['name'], PATHINFO_EXTENSION);

        if ($size > $maxsize) {
            $_SESSION['val'] = '<div class="alert alert-danger" id="auto-close">
                <em class="fas fa-info-circle"></em> Gagal ! Ukuran File Max 5mb
            </div>';
            header('location: ../?page=ticket');
        } else {
            if (!in_array(strtolower($file_extension), $allowedExtensions)) {
                $_SESSION['val'] = '<div class="alert alert-danger" id="auto-close"><div class="alert-message"><em class="fas fa-info-circle"></em> Extensi File Tidak Valid. Format harus jpg,jpeg,png</div></div>';
                header('location: ../?page=ticket');
            } else {
                // Validasi tipe MIME
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mime = finfo_file($finfo, $tmp);
                finfo_close($finfo);

                $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg'];

                if (!in_array($mime, $allowedMimeTypes)) {
                    $_SESSION['val'] = '<div class="alert alert-warning" id="auto-close"><div class="alert-message"><em class="fas fa-info-circle"></em> File Tidak Valid ! Jangan Memodifikasi File Sembarangan !</div></div>';
                    header('location: ../?page=ticket');
                } else {
                    $filename = $no_ticket . '.' . $file_extension;
                    $dir = "../../assets/docs/tiket/" . $filename;

                    $query = mysqli_query($con, "INSERT INTO ticket (no_ticket, username, tanggal, waktu, perihal, isi, lampiran, status, balasan) VALUES ('$no_ticket', '$username', '$tanggal', '$waktu', '$perihal', '$isi', '$filename', '$status', '')");

                    if ($query) {
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
}else if(isset($_POST['batal']))
{
    $no_ticket = mysqli_real_escape_string($con, $_POST['no_ticket']);
    
    $query = mysqli_query($con, "SELECT * FROM ticket WHERE no_ticket='$no_ticket'");
    $t = mysqli_fetch_object($query);

    if($t->status == "Proses" || $t->status == "Selesai")
    {
        $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white" id="auto-close">
                <em class="fas fa-info-circle"></em> Gagal ! Tidak Bisa Di Batalkan
        </div>';
        header('location: ../?page=ticket');
    }
    else
    {
        if(file_exists("../../assets/docs/tiket/".$t->lampiran))
        {
            unlink("../../assets/docs/tiket/".$t->lampiran);
        }

        $sql = mysqli_query($con, "DELETE FROM ticket WHERE no_ticket='$no_ticket'");

        if($sql)
        {
            $_SESSION['val'] = '<div class="alert alert-success" id="auto-close">
                <em class="fas fa-check-circle"></em> Berhasi Batal Tiket
            </div>';
            header('location: ../?page=ticket');
        }
    }
}
else if(isset($_POST['proses']))
{
    $no_ticket = mysqli_real_escape_string($con, $_POST['no_ticket']);
    $balasan = mysqli_real_escape_string($con, $_POST['balasan']);

    $sql = mysqli_query($con, "UPDATE ticket SET balasan='$balasan', status='Proses' WHERE no_ticket='$no_ticket'");

    if($sql)
    {
        $_SESSION['val'] = '<div class="alert alert-success" id="auto-close">
            <em class="fas fa-check-circle"></em> Berhasi Proses Tiket !
        </div>';
        header('location: ../?page=ticket');
    }
}
else if(isset($_POST['selesai']))
{
    $no_ticket = mysqli_real_escape_string($con, $_POST['no_ticket']);
    $balasan = mysqli_real_escape_string($con, $_POST['balasan']);

    $sql = mysqli_query($con, "UPDATE ticket SET balasan='$balasan', status='Selesai' WHERE no_ticket='$no_ticket'");

    if($sql)
    {
        $_SESSION['val'] = '<div class="alert alert-success" id="auto-close">
            <em class="fas fa-check-circle"></em> Berhasi Proses Tiket !
        </div>';
        header('location: ../?page=ticket');
    }
}

?>