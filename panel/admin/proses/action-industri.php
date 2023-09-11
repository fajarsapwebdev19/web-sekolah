<?php
    session_start();
    require '../../../connection/database_connect.php';

    if(isset($_POST['tambah']))
    {
        function generate_uuid() {
            return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
                mt_rand( 0, 0xffff ),
                mt_rand( 0, 0x0fff ) | 0x4000,
                mt_rand( 0, 0x3fff ) | 0x8000,
                mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
            );
        }
        $uuid = strtoupper(generate_uuid());
        $nama_perusahaan = mysqli_real_escape_string($con, $_POST['nama_perusahaan']);

        if(empty($_FILES['logo']['name']))
        {
            $_SESSION['val'] = '<div class="alert alert-danger" id="auto-close">
              <em class="fas fa-times-circle"></em> Logo Kosong !
            </div>';
            header('location: ../?page=hub');
        }
        else
        {
            $rand = rand()."_".mt_rand(0,599)."-".date("d-m-y");
            $file_ext = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
            $temp_file = $_FILES['logo']['tmp_name'];
            $size = $_FILES['logo']['size'];
            $file_name = $rand.".".$file_ext;
            $dir = "../../../assets/galeri/foto/industri/".$file_name;

            if($size >= 5000000)
            {
                $_SESSION['val'] = '<div class="alert alert-danger" id="auto-close">
                    <em class="fas fa-info-circle"></em> Ukuran File Lebih Dari 5 MB
                </div>';
                header('location: ../?page=hub');
            }
            else
            {
                if(!in_array($file_ext, array("jpg", "jpeg", "png")))
                {
                    $_SESSION['val'] = '<div class="alert alert-info" id="auto-close">
                        <em class="fas fa-info-circle"></em> Ekstensi Tidak Sesuai. File harus berformat jpg,jpeg,png
                    </div>';
                    header('location: ../?page=hub');
                }
                else
                {
                    $tambah = mysqli_query($con, "INSERT INTO hub_industri (id,nama_perusahaan,logo_perusahaan) VALUES ('$uuid', '$nama_perusahaan', '$file_name')");

                    if($tambah)
                    {
                        move_uploaded_file($temp_file, $dir);
                        $_SESSION['val'] = '<div class="alert alert-success" id="auto-close">
                        <em class="fas fa-check-circle"></em> Tambah Perusahaan Berhasil !
                        </div>';
                        header('location: ../?page=hub');
                    }
                }
            }
        }
    }
    else if(isset($_POST['ubah']))
    {
        if(isset($_POST['id']))
        {
            $id = mysqli_real_escape_string($con, $_POST['id']);
            $nama_perusahaan = mysqli_real_escape_string($con, $_POST['nama_perusahaan']);
            
            if(empty($_FILES['logo']['name']))
            {
                $update = mysqli_query($con, "UPDATE hub_industri SET nama_perusahaan='$nama_perusahaan' WHERE id='$id'");

                if($update)
                {
                    $_SESSION['val'] = '<div class="alert alert-success" id="auto-close">
                        <em class="fas fa-check-circle"></em> Ubah Perusahaan Berhasil !
                    </div>';
                    header('location: ../?page=hub');
                }
            }
            else
            {
                $rand = rand()."_".mt_rand(0,599)."-".date("d-m-y");
                $file_ext = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
                $temp_file = $_FILES['logo']['tmp_name'];
                $size = $_FILES['logo']['size'];
                $file_name = $rand.".".$file_ext;
                $dir = "../../../assets/galeri/foto/industri/".$file_name;

                if($size >= 5000000)
                {
                    $_SESSION['val'] = '<div class="alert alert-danger" id="auto-close">
                        <em class="fas fa-info-circle"></em> Ukuran File Lebih Dari 5 MB
                    </div>';
                    header('location: ../?page=hub');
                }
                else
                {
                    if(!in_array($file_ext, array("jpg", "jpeg", "png")))
                    {
                        $_SESSION['val'] = '<div class="alert alert-info" id="auto-close">
                            <em class="fas fa-info-circle"></em> Ekstensi Tidak Sesuai. File harus berformat jpg,jpeg,png
                        </div>';
                        header('location: ../?page=hub');
                    }
                    else
                    {
                        $q = mysqli_query($con, "SELECT logo_perusahaan FROM hub_industri WHERE id='$id'");
                        $l = mysqli_fetch_object($q);

                        if(file_exists("../../../assets/galeri/foto/industri/".$l->logo_perusahaan))
                        {
                            unlink("../../../assets/galeri/foto/industri/".$l->logo_perusahaan);
                        }

                        $update = mysqli_query($con, "UPDATE hub_industri SET nama_perusahaan='$nama_perusahaan',logo_perusahaan='$file_name' WHERE id='$id'");

                        if($update)
                        {
                            move_uploaded_file($temp_file, $dir);
                            $_SESSION['val'] = '<div class="alert alert-success" id="auto-close">
                            <em class="fas fa-check-circle"></em> Ubah Perusahaan Berhasil !
                            </div>';
                            header('location: ../?page=hub');
                        }
                    }
                }
            }
        }
    }
    else if(isset($_POST['hapus']))
    {
        $id = mysqli_real_escape_string($con, $_POST['id']);

        $q = mysqli_query($con, "SELECT logo_perusahaan FROM hub_industri WHERE id='$id'");
        $l = mysqli_fetch_object($q);
        if(file_exists("../../../assets/galeri/foto/industri/".$l->logo_perusahaan))
        {
            unlink("../../../assets/galeri/foto/industri/".$l->logo_perusahaan);
        }

        $delete = mysqli_query($con, "DELETE FROM hub_industri WHERE id='$id'");

        if($delete)
        {
            $_SESSION['val'] = '<div class="alert alert-success" id="auto-close">
                <em class="fas fa-check-circle"></em> Hapus Perusahaan Berhasil !
            </div>';
            header('location: ../?page=hub');
        }
    }
        
?>