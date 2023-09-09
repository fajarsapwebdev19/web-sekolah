<?php
  session_start();
  require '../../../connection/database_connect.php';

  if(isset($_POST['simpan']))
  {
    if(isset($_POST['id']))
    {
      $id = mysqli_real_escape_string($con, $_POST['id']);
      $nama_instansi = mysqli_real_escape_string($con, $_POST['nama_instansi']);
      $kab_kota = mysqli_real_escape_string($con, $_POST['kab_kota']);
      $isi = mysqli_real_escape_string($con, $_POST['isi']);
      $visi = mysqli_real_escape_string($con, $_POST['visi']);
      $misi = mysqli_real_escape_string($con, $_POST['misi']);
      $by = $_SESSION['username'];
      $date = date('Y-m-d');

      if(empty($_FILES['logo_instansi']['name']))
      {
        $save = mysqli_query($con, "UPDATE about SET nama_instansi='$nama_instansi', kab_kota='$kab_kota', isi_about='$isi', visi='$visi', misi='$misi', modified_by='$by', modified_date='$date' WHERE id='$id'");

        if($save)
        {
            $_SESSION['val'] = '<div class="alert alert-success" id="auto-close">
              <em class="fas fa-check-circle"></em> Ubah Tentang Kami Berhasil
            </div>';
            header('location: ../?page=about');
        }
      }
      else
      {
        $logo = $_FILES['logo_instansi']['name'];
        $tmp_logo = $_FILES['logo_instansi']['tmp_name'];
        $size = $_FILES['logo_instansi']['size'];
        $ex = array("jpg","jpeg","png");
        $extension = pathinfo($logo, PATHINFO_EXTENSION);
        // validasi ekstensi
        if(!in_array($extension, $ex))
        {
          $_SESSION['val'] = '<div class="alert alert-warning" id="auto-close">
            <em class="fas fa-info-circle"></em> Ekstensi file yang didukung hanya jpg,jpeg,dan png
          </div>';
          header('location: ../?page=about');
        }
        else
        {
          // validasi file size
          // file max 5MB
          if($size >= 5000000)
          {
            $_SESSION['val'] = '<div class="alert alert-danger" id="auto-close">
              <em class="fas fa-info-circle"></em> Ukuran file melebihi dari 5 MB
            </div>';
            header('location: ../?page=about');
          }
          else
          {
            // hapus file lama dari folder local
            // cari data file lama di database
            $query = mysqli_query($con, "SELECT * FROM about WHERE id='$id'");
            $data = mysqli_fetch_object($query);

            if(file_exists("../../../assets/galeri/vendor/".$data->logo))
            {
              unlink("../../../assets/galeri/vendor/".$data->logo);
            }

            $dir = "../../../assets/galeri/vendor/".$logo;
            move_uploaded_file($tmp_logo, $dir);

                  $save = mysqli_query($con, "UPDATE about SET logo='$logo', nama_instansi='$nama_instansi', kab_kota='$kab_kota', isi_about='$isi', visi='$visi', misi='$misi', modified_by='$by', modified_date='$date' WHERE id='$id'");

            if($save)
            {
              $_SESSION['val'] = '<div class="alert alert-success" id="auto-close">
                  <em class="fas fa-check-circle"></em> Ubah Tentang Kami Berhasil
                </div>';
              header('location: ../?page=about');
            }
          } 
      }

      
    }
  }
}
?>