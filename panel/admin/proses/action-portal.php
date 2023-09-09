<?php
  require '../../../connection/database_connect.php';
  session_start();

  if(isset($_POST['tambah']))
  {
    // create id portal
    $id = mt_rand();
    $picture_portal = $_FILES['portal_picture']['name'];
    $tmp_pic_portal = $_FILES['portal_picture']['tmp_name'];
    $size = $_FILES['portal_picture']['size'];
    $extension = array("jpg", "jpeg", "png");
    $ex = pathinfo($picture_portal, PATHINFO_EXTENSION);
    $judul_portal = mysqli_real_escape_string($con, $_POST['judul_portal']);
    $konten_portal = mysqli_real_escape_string($con, $_POST['konten_portal']);
    $date = date('Y-m-d');
    $username = $_SESSION['username'];

    // validasi ketika ada user jail meloloskan diri dari validasi awal
    if(empty($_FILES['portal_picture']['name']))
    {
      $_SESSION['val'] = '<div class="alert alert-danger" id="auto-close">
        <em class="fas fa-times-circle"></em> Foto Kosong !
      </div>';
      header('location: ../?page=portal');
    }else
    {
      // validasi ekstensi file
      if(!in_array($ex, $extension))
      {
        $_SESSION['val'] = '<div class="alert alert-warning" id="auto-close">
          <em class="fas fa-info-circle"></em> Ekstensi yang di izinkan hanya jpg, jpeg dan png
        </div>';
        header('location: ../?page=portal');
      }
      else
      {
        // validasi ukuran file
        // max = 5 MB
        if($size >= 5000000)
        {
          $_SESSION['val'] = '<div class="alert alert-danger" id="auto-close">
            <em class="fas fa-times-circle"></em> Ukuran File Melebihi 5 MB
          </div>';
          header('location: ../?page=portal');
        }
        else
        {
          // penempatan file yang akan di upload
          $dir = "../../../assets/galeri/vendor/".$picture_portal;

          // eksekusi upload file
          move_uploaded_file($tmp_pic_portal, $dir);

          // simpan data portal ke database
          $tambah = mysqli_query($con, "INSERT INTO portal VALUES ('$id', '$picture_portal', '$judul_portal', '$konten_portal', '$date', '$username')");

          if($tambah)
          {
            $_SESSION['val'] = '<div class="alert alert-success" id="auto-close">
              <em class="fas fa-check-circle"></em> Tambah Data Berhasil !
            </div>';
            header('location: ../?page=portal');
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
      $judul_portal = mysqli_real_escape_string($con, $_POST['judul_portal']);
      $konten_portal = mysqli_real_escape_string($con, $_POST['konten_portal']);

      // jika user tidak melakukan upload file maka langsung eksekusi ubah data kata saja
      if(empty($_FILES['portal_picture']['name']))
      {
        $update = mysqli_query($con, "UPDATE portal SET judul_portal='$judul_portal', konten_portal='$konten_portal' WHERE portal_id='$id'");
      }
      else
      {
        $picture_portal = $_FILES['portal_picture']['name'];
        $tmp_pic_portal = $_FILES['portal_picture']['tmp_name'];
        $size = $_FILES['portal_picture']['size'];
        $extension = array("jpg", "jpeg", "png");
        $ex = pathinfo($picture_portal, PATHINFO_EXTENSION);

        
        // validasi ekstensi file
        if(!in_array($ex, $extension))
        {
          $_SESSION['val'] = '<div class="alert alert-warning" id="auto-close">
            <em class="fas fa-info-circle"></em> Ekstensi yang di izinkan hanya jpg, jpeg dan png
          </div>';
          header('location: ../?page=portal');
        }
        else
        {
          // validasi ukuran file
          // max = 5 MB
          if($size >= 5000000)
          {
            $_SESSION['val'] = '<div class="alert alert-danger" id="auto-close">
              <em class="fas fa-times-circle"></em> Ukuran File Melebihi 5 MB
            </div>';
            header('location: ../?page=portal');
          }
          else
          {
            // hapus gambar lama
            $query = mysqli_query($con, "SELECT * FROM portal WHERE portal_id='$id'");
            $data = mysqli_fetch_object($query);

            // eksekusi hapus file lama
            if(file_exists("../../../assets/galeri/vendor/".$data->foto_portal))
            {
              unlink("../../../assets/galeri/vendor/".$data->foto_portal);
            }

            // rename file
            $rename = mt_rand().'__'.$picture_portal;

            // eksekusi upload
            // tempat file
            $dir = "../../../assets/galeri/vendor/".$rename;
            move_uploaded_file($tmp_pic_portal, $dir);

            $update = mysqli_query($con, "UPDATE portal SET foto_portal='$rename', judul_portal='$judul_portal', konten_portal='$konten_portal' WHERE portal_id='$id'");
          }
          
        }
      }
      // eksekusi update
      if($update)
      {
        $_SESSION['val'] = '<div class="alert alert-success" id="auto-close">
          <em class="fas fa-check-circle"></em> Berhasil Update Portal
        </div>';
        header('location: ../?page=portal');
      }
    }
  }
  else if(isset($_POST['hapus']))
  {
    $id = mysqli_real_escape_string($con, $_POST['id']);

    // hapus gambar dari file local
    // hapus gambar lama
    $query = mysqli_query($con, "SELECT * FROM portal WHERE portal_id='$id'");
    $data = mysqli_fetch_object($query);

    // eksekusi hapus file lama
    if(file_exists("../../../assets/galeri/vendor/".$data->foto_portal))
    {
      unlink("../../../assets/galeri/vendor/".$data->foto_portal);
    }

    $delete = mysqli_query($con, "DELETE FROM portal WHERE portal_id='$id'");

    if($delete)
    {
        $_SESSION['val'] = '<div class="alert alert-success" id="auto-close">
          <em class="fas fa-check-circle"></em> Berhasil Hapus Portal
        </div>';
        header('location: ../?page=portal');
    }
  }
?>