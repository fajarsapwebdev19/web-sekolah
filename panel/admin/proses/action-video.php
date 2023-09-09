<?php
  require '../../../connection/database_connect.php';
  session_start();
  if(isset($_POST['tambah']))
  {
    $id = mt_rand();
    $judul_video = mysqli_real_escape_string($con, $_POST['judul_video']);
    $link = "https://youtube.com/embed/";
    $id_yt = mysqli_real_escape_string($con, $link.''.$_POST['id_yt']);
    $create_date = date('Y-m-d');
    $username = $_SESSION['username'];

    
    $tambah = mysqli_query($con, "INSERT INTO video_upload VALUES('$id', '$judul_video', '$id_yt', '$create_date', '$username', NULL, NULL)");

    if($tambah)
    {
      $_SESSION['val'] = '<div class="alert alert-success bg-success text-white" id="auto-close">
        Berhasil Tambah Video
      </div>';
      header('location: ../?page=galery_video');
    }
  }
  else if(isset($_POST['ubah']))
  {
    if(isset($_POST['id']))
    {
      $id = mysqli_real_escape_string($con, $_POST['id']);
      $judul_video = mysqli_real_escape_string($con, $_POST['judul_video']);
      $id_yt = mysqli_real_escape_string($con, 'https://youtube.com/embed/'.''.$_POST['id_yt']);
      $date = date('Y-m-d');
      $by = $_SESSION['username'];

      $ubah = mysqli_query($con, "UPDATE video_upload SET judul_file='$judul_video', link_embed='$id_yt', modified_date='$date', modified_by='$by' WHERE id_video='$id'");

      if($ubah)
      {
        $_SESSION['val'] = '<div class="alert alert-success bg-success text-white" id="auto-close">
          Berhasil Ubah Data Video
        </div>';
        header('location: ../?page=galery_video');
      }
    }
  }
  else if(isset($_POST['hapus']))
  {
    $id = mysqli_real_escape_string($con, $_POST['id']);

    $hapus = mysqli_query($con, "DELETE FROM video_upload WHERE id_video='$id'");

    if($hapus)
    {
      $_SESSION['val'] = '<div class="alert alert-success bg-success text-white" id="auto-close">
        Berhasil Melakukan Hapus Data
      </div>';
      header('location: ../?page=galery_video');
    }
  }
  
?>