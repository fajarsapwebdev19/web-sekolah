<?php
  require '../../../connection/database_connect.php';
  session_start();

  if(isset($_POST['tambah']))
  {
    $id = mt_rand();
    $judul_foto = mysqli_real_escape_string($con, $_POST['judul_foto']);
    $foto = $_FILES['foto']['name'];
    $tmp_foto = $_FILES['foto']['tmp_name'];
    $size = $_FILES['foto']['size'];
    $extension = array("png","jpg","jpeg");
    $ex = pathinfo($foto, PATHINFO_EXTENSION);

    // jika user bandel melakukan pembuka validasi
    if(empty($_FILES['foto']['name']))
    {
      $_SESSION['val'] = '<div class="alert alert-danger" id="auto-close">
        <em class="fas fa-info-circle"></em> Foto Kosong
      </div>';
      header('location: ../?page=galery_foto');
    }
    else
    {
      // validasi ekstensi file
      if(!in_array($ex,$extension))
      {
        $_SESSION['val'] = '<div class="alert alert-warning" id="auto-close">
          <em class="fas fa-info-circle"></em> Ekstensi file yang di izinkan hanya jpg,jpeg,dan png
        </div>';
        header('location: ../?page=galery_foto');
      }
      else{
        // validasi ukuran file
        // max ukuran file 5 MB
        if($size >= 5000000)
        {
          $_SESSION['val'] = '<div class="alert alert-danger" id="auto-close">
            <em class="fas fa-info-circle"></em> Ukuran file anda melebihi 5 mb
          </div>';
          header('location: ../?page=galery_foto');
        }
        else
        {
          // eksekusi upload file
          // tempat naruh file
          $dir = "../../../assets/galeri/foto/".$foto;

          move_uploaded_file($tmp_foto, $dir);

          // date time and by uploader
          $upload_date = date('Y-m-d');
          $date = $upload_date;
          $by = $_SESSION['username'];

          // tambah data ke database
          $tambah = mysqli_query($con, "INSERT INTO foto_upload VALUES('$id','$judul_foto','$foto','$upload_date','$date','$by', NULL, NULL)");

          if($tambah)
          {
            $_SESSION['val'] = '<div class="alert alert-success" id="auto-close">
              <em class="fas fa-check-circle"></em> Berhasil Upload Foto
            </div>';
            header('location: ../?page=galery_foto');
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
      $judul_foto = mysqli_real_escape_string($con, $_POST['judul_foto']);
      
      // jika user tidak memasukan sebuah file maka sistem akan merubah data tidak beserta foto
      if(empty($_FILES['foto']['name']))
      {
        $update = mysqli_query($con, "UPDATE foto_upload SET judul_file='$judul_foto' WHERE id_foto='$id'");
      }else{
        // proses upload jika user memasukan file

        $foto = $_FILES['foto']['name'];
        $tmp_foto = $_FILES['foto']['tmp_name'];
        $size = $_FILES['foto']['size'];
        $extension = array("png","jpg","jpeg");
        $ex = pathinfo($foto, PATHINFO_EXTENSION);

        // validasi ekstensi file
        if(!in_array($ex, $extension))
        {
          $_SESSION['val'] = '<div class="alert alert-warning" id="auto-close">
            <em class="fas fa-info-circle"></em> Ekstensi file yang di izinkan hanya jpg,jpeg,dan png
          </div>';
          header('location: ../?page=galery_foto');
        }else{
          // validasi ukuran file
          // max 5MB
          if($size >= 5000000)
          {
            $_SESSION['val'] = '<div class="alert alert-danger" id="auto-close">
              <em class="fas fa-info-circle"></em> Ukuran file anda melebihi 5 mb
            </div>';
            header('location: ../?page=galery_foto');
          }else{
            // hapus file lama dari folder local
            // cari data foto di database
            $query = mysqli_query($con, "SELECT * FROM foto_upload WHERE id_foto='$id'");
            $data = mysqli_fetch_object($query);

            if(file_exists("../../../assets/galeri/foto/".$data->file))
            {
              unlink("../../../assets/galeri/foto/".$data->file);
            }

            // rename file baru
            $rename = rand().'__'.$foto;
            $dir = "../../../assets/galeri/foto/".$rename;
            move_uploaded_file($tmp_foto, $dir);
            $date = date('Y-m-d');
            $by = $_SESSION['username'];

            $update = mysqli_query($con, "UPDATE foto_upload SET judul_file='$judul_foto', file='$rename', modified_date='$date', modified_by='$by' WHERE id_foto='$id'");
          }
        }
      }

      if($update)
      {
        $_SESSION['val'] = '<div class="alert alert-success" id="auto-close">
          <em class="fas fa-check-circle"></em> Berhasil Ubah Foto
        </div>';
        header('location: ../?page=galery_foto');
      }
    }
  }
  else if(isset($_POST['hapus']))
  {
    $id = mysqli_real_escape_string($con, $_POST['id']);

    // hapus data file di folder local
    // cari data foto di database
    $query = mysqli_query($con, "SELECT * FROM foto_upload WHERE id_foto='$id'");
    $data = mysqli_fetch_object($query);

    if(file_exists("../../../assets/galeri/foto/".$data->file))
    {
      unlink("../../../assets/galeri/foto/".$data->file);
    }

    $hapus = mysqli_query($con, "DELETE FROM foto_upload WHERE id_foto='$id'");

    if($hapus)
    {
      $_SESSION['val'] = '<div class="alert alert-success" id="auto-close">
          <em class="fas fa-check-circle"></em> Berhasil Hapus Foto
        </div>';
      header('location: ../?page=galery_foto');
    }
  }
?>