<?php
  require '../../../connection/database_connect.php';
  session_start();
  $by = $_SESSION['username'];
  $date = date('Y-m-d');
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
    $id = guidv4();
    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $jenis_kelamin = mysqli_real_escape_string($con, $_POST['jenis_kelamin']);
    $asal_instansi = mysqli_real_escape_string($con, $_POST['asal_instansi']);
    $jabatan = mysqli_real_escape_string($con, $_POST['jabatan']);
    
    // jika ada user jail matiin validasi yang ada di depan layar
    if(empty($_FILES['foto']['name']))
    {
      $tambah = mysqli_query($con, "INSERT INTO ptk VALUES ('$id',NULL,'$nama','$jenis_kelamin','$asal_instansi', '$jabatan', '$date', '$by', NULL, NULL)");

        if($tambah)
        {
          $_SESSION['val'] = '<div class="alert alert-success" id="auto-close">
            <em class="fas fa-check-circle"></em> Tambah PTK Berhasil
          </div>';
          header('location: ../?page=anggota');
        }
    }
    else
    {
      $foto = $_FILES['foto']['name'];
      $tmp_foto = $_FILES['foto']['tmp_name'];
      $size = $_FILES['foto']['size'];
      $ekstensi = array("jpg","jpeg","png");
      $ex = pathinfo($foto, PATHINFO_EXTENSION);

      // validasi ekstensi file
      if(!in_array($ex, $ekstensi))
      {
        $_SESSION['val'] = '<div class="alert alert-warning" id="auto-close">
          <em class="fas fa-info-circle"></em> Ekstensi file yang di izinkan hanya jpg,jpeg dan png
        </div>';
        header('location: ../?page=anggota');
      }
      else
      {
        // validasi ukuran file
        // maximal 5 MB
        if($size >= 5000000)
        {
          $_SESSION['val'] = '<div class="alert alert-danger" id="auto-close">
            <em class="fas fa-info-circle"></em> Ukuran file lebih dari 5 MB
          </div>';
        header('location: ../?page=anggota');
        }
        else
        {
          // eksekusi upload file
          // tempat naruh file foto
          $dir = "../../../assets/galeri/foto/anggota/".$foto;

          move_uploaded_file($tmp_foto, $dir);

          // simpan data ke database
          $tambah = mysqli_query($con, "INSERT INTO ptk VALUES ('$id','$foto','$nama','$jenis_kelamin','$asal_instansi', '$jabatan', '$date', '$by', NULL, NULL)");

          echo $id;

          if($tambah)
          {
            $_SESSION['val'] = '<div class="alert alert-success" id="auto-close">
              <em class="fas fa-check-circle"></em> Tambah PTK Berhasil
            </div>';
            header('location: ../?page=anggota');
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
      $nama = mysqli_real_escape_string($con, $_POST['nama']);
      $jenis_kelamin = mysqli_real_escape_string($con, $_POST['jenis_kelamin']);
      $asal_instansi = mysqli_real_escape_string($con, $_POST['asal_instansi']);
      $jabatan = mysqli_real_escape_string($con, $_POST['jabatan']);
      $date = date('Y-m-d');
      $by = $_SESSION['username'];

      // jika user tidak melakukan upload file maka sistem merubah data tidak beserta foto
      if(empty($_FILES['foto']['name']))
      {
        $update = mysqli_query($con, "UPDATE ptk SET nama='$nama',jk='$jenis_kelamin', asal_instansi='$asal_instansi', jabatan='$jabatan', modified_date='$date', modified_by='$by' WHERE id_anggota='$id'");
      }
      else
      {
        $foto = $_FILES['foto']['name'];
        $tmp_foto = $_FILES['foto']['tmp_name'];
        $size = $_FILES['foto']['size'];
        $ekstensi = array("jpg","jpeg","png");
        $ex = pathinfo($foto, PATHINFO_EXTENSION);

        // validasi ekstensi file
        if(!in_array($ex, $ekstensi))
        {
          $_SESSION['val'] = '<div class="alert alert-warning" id="auto-close">
            <em class="fas fa-info-circle"></em> Ekstensi file yang di izinkan hanya jpg,jpeg dan png
          </div>';
          header('location: ../?page=anggota');
        }
        else
        {
          // validasi ukuran file
          // maximal 5 MB
          if($size >= 5000000)
          {
            $_SESSION['val'] = '<div class="alert alert-danger" id="auto-close">
              <em class="fas fa-info-circle"></em> Ukuran file lebih dari 5 MB
            </div>';
          header('location: ../?page=anggota');
          }
          else
          {
            // hapus gambar lama
            $query = mysqli_query($con, "SELECT * FROM ptk WHERE id_anggota='$id'");

            $data = mysqli_fetch_object($query);

            if(file_exists("../../../assets/galeri/foto".$data->foto))
            {
              unlink("../../../assets/galeri/foto".$data->foto);
            }

            // rename file dan simpan file baru
            $rename = mt_rand().'__'.$foto;
            $dir = "../../../assets/galeri/foto/anggota/".$rename;

            move_uploaded_file($tmp_foto, $dir);

            $update = mysqli_query($con, "UPDATE ptk SET foto='$rename', nama='$nama',jk='$jenis_kelamin', asal_instansi='$asal_instansi', jabatan='$jabatan', modified_date='$date', modified_by='$by' WHERE id_anggota='$id'");
          }
        }
      }
        if($update)
        {
          $_SESSION['val'] = '<div class="alert alert-success" id="auto-close">
            <em class="fas fa-check-circle"></em> Ubah PTK Berhasil
          </div>';
          header('location: ../?page=anggota');
        }
    }
  }
  else if(isset($_POST['hapus']))
  {
    $id = mysqli_real_escape_string($con, $_POST['id']);

    // hapus foto dari folder local
    // cari data di database
    $query = mysqli_query($con, "SELECT * FROM ptk WHERE id_anggota='$id'");
    $data = mysqli_fetch_object($query);

    if(file_exists("../../../assets/galeri/foto/anggota/".$data->foto))
    {
      unlink("../../../assets/galeri/foto/anggota/".$data->foto);
    }

    // eksekusi hapus data anggota by id
    $delete = mysqli_query($con, "DELETE FROM ptk WHERE id_anggota='$id'");

    if($delete)
    {
      $_SESSION['val'] = '<div class="alert alert-success" id="auto-close">
        <em class="fas fa-check-circle"></em> Hapus PTK Berhasil
      </div>';
      header('location: ../?page=anggota');
    }
  }
  
?>