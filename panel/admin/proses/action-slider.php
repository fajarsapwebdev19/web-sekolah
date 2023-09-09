<?php
    require '../../../connection/database_connect.php';
    session_start();
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

        $foto_slider = $_FILES['slider_picture']['name'];
        $temp_slider = $_FILES['slider_picture']['tmp_name'];
        $size = $_FILES['slider_picture']['size'];
        $ext = array("jpg","jpeg","png");
        $extension = pathinfo($foto_slider, PATHINFO_EXTENSION);

        if(!in_array($extension,$ext))
        {
            $_SESSION['val'] = '<div class="alert alert-warning" id="auto-close">
                <em class="fas fa-info-circle"></em> Ekstensi File Yang Di Izinkan Hanya jpg,jpeg,dan png
            </div>';
            header('location: ../?page=slider');
        }else{
            if($size >= 5000000)
            {
                $_SESSION['val'] = '<div class="alert alert-danger" id="auto-close">
                    <em class="fas fa-info-circle"></em> Ukuran File Lebih Dari 5MB
                </div>';
                header('location: ../?page=slider');
            }else{
                $id = create_guid();
                $judul_slider = mysqli_real_escape_string($con, $_POST['judul_slider']);
                $content_slider = mysqli_real_escape_string($con, $_POST['content_slider']);
                $create_date = date('Y-m-d');
                $create_by = $_SESSION['username'];

                // tempat menaruh file slider
                $dir = "../../../assets/galeri/vendor/".$foto_slider;
                move_uploaded_file($temp_slider, $dir);

                $tambah = mysqli_query($con, "INSERT INTO slider_data VALUES ('$id','$foto_slider','$judul_slider','$content_slider','$create_date','$create_by')");

                if($tambah)
                {
                    $_SESSION['val'] = '<div class="alert alert-success" id="auto-close">
                        <em class="fas fa-check-circle"></em> Berhasi Tambah Slider
                    </div>';
                    header('location: ../?page=slider');
                }
            }
        }
    }
    else if(isset($_POST['ubah']))
    {
        if(isset($_POST['id']))
        {
            $id = mysqli_real_escape_string($con, $_POST['id']);
            $judul_slider = mysqli_real_escape_string($con, $_POST['judul_slider']);
            $content_slider = mysqli_real_escape_string($con, $_POST['content_slider']);

            // jika pengguna tidak melakukan update foto slider
            if(empty($_FILES['slider_picture']['name']))
            {
                $update = mysqli_query($con, "UPDATE slider_data SET judul_slider='$judul_slider', kontent_slider='$content_slider' WHERE id='$id'");
            }
            else
            {
                // ambil data gambar
                $foto_slider = $_FILES['slider_picture']['name'];
                $temp_slider = $_FILES['slider_picture']['tmp_name'];
                $size = $_FILES['slider_picture']['size'];
                $ext = array("jpg","jpeg","png");
                $extension = pathinfo($foto_slider, PATHINFO_EXTENSION);

                // validasi ekstensi file atau ukuran file
                if(!in_array($extension,$ext))
                {
                    $_SESSION['val'] = '<div class="alert alert-warning" id="auto-close">
                        <em class="fas fa-info-circle"></em> Ekstensi File Yang Di Izinkan Hanya jpg,jpeg,dan png
                    </div>';
                    header('location: ../?page=slider');
                }
                else
                {
                    if($size >= 5000000)
                    {
                        $_SESSION['val'] = '<div class="alert alert-danger" id="auto-close">
                            <em class="fas fa-info-circle"></em> Ukuran File Lebih Dari 5MB
                        </div>';
                        header('location: ../?page=slider');
                    }
                    else
                    {

                        // hapus gambar lama sebelum melakukan upload
                        $query = mysqli_query($con, "SELECT * FROM slider_data WHERE id='$id'");
                        $gambar_lama = mysqli_fetch_object($query);

                        if(file_exists('../../../assets/galeri/vendor/'.$gambar_lama->foto_slider))
                        {
                            unlink('../../../assets/galeri/vendor/'.$gambar_lama->foto_slider);
                        }
                        // tempat menaruh file slider
                        // rename file update
                        $rename = rand().'__'.$foto_slider;
                        $dir = "../../../assets/galeri/vendor/".$rename;
                        move_uploaded_file($temp_slider, $dir);

                        $update = mysqli_query($con, "UPDATE slider_data SET foto_slider='$rename',judul_slider='$judul_slider',kontent_slider='$content_slider' WHERE id='$id'");
                    }
                }
            }
            if($update)
            {
                $_SESSION['val'] = '<div class="alert alert-success" id="auto-close">
                    <em class="fas fa-check-circle"></em> Berhasil Ubah Slider Data
                </div>';
                header('location: ../?page=slider');
            }
        }
    }
    elseif(isset($_POST['hapus']))
    {
        $id =  mysqli_real_escape_string($con, $_POST['id']);

        // hapus gambar di file
        $query = mysqli_query($con, "SELECT * FROM slider_data WHERE id='$id'");
        $gambar_lama = mysqli_fetch_object($query);

        if(file_exists('../../../assets/galeri/vendor/'.$gambar_lama->foto_slider))
        {
            unlink('../../../assets/galeri/vendor/'.$gambar_lama->foto_slider);
        }
        
        // eksekusi hapus data ke database
        $delete = mysqli_query($con, "DELETE FROM slider_data WHERE id='$id'");
        
        if($delete)
        {
            $_SESSION['val'] = '<div class="alert alert-success" id="auto-close">
                <em class="fas fa-check-circle"></em> Berhasil Update Data
            </div>';
            header('location: ../?page=slider');
        }
    }
?>