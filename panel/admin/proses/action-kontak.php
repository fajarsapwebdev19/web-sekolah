<?php
  require '../../../connection/database_connect.php';
  session_start();

  if(isset($_POST['simpan']))
  {
    if(isset($_POST['id']))
    {
      $id = mysqli_real_escape_string($con, $_POST['id']); 
      $alamat = mysqli_real_escape_string($con, $_POST['alamat']);
      $link_alamat = mysqli_real_escape_string($con, $_POST['link-peta-embed']);
      $show_telp = mysqli_real_escape_string($con, $_POST['show_telp']);
      $no_telp = mysqli_real_escape_string($con, $_POST['no_telp']);
      $show_email = mysqli_real_escape_string($con, $_POST['show_email']);
      $email = mysqli_real_escape_string($con, $_POST['email']);
      $show_wa = mysqli_real_escape_string($con, $_POST['show_wa']);
      $whatsapp = mysqli_real_escape_string($con, $_POST['whatsapp']);
      $show_fb = mysqli_real_escape_string($con, $_POST['show_fb']);
      $facebook = mysqli_real_escape_string($con, $_POST['facebook']);
      $link_fb = mysqli_real_escape_string($con, $_POST['link-fb']);
      $show_ig = mysqli_real_escape_string($con, $_POST['show_ig']);
      $instagram = mysqli_real_escape_string($con, $_POST['instagram']);
      $link_ig = mysqli_real_escape_string($con, $_POST['link-ig']);
      $show_yt = mysqli_real_escape_string($con, $_POST['show_yt']);
      $youtube = mysqli_real_escape_string($con, $_POST['youtube']);
      $link_yt = mysqli_real_escape_string($con, $_POST['link-yt']);
      $date = date('Y-m-d');
      $by = $_SESSION['username'];


      $save = mysqli_query($con, "UPDATE kontak SET alamat='$alamat',link_alamat='$link_alamat',view_telp='$show_telp',no_telp='$no_telp',view_email='$show_email',email='$email',view_wa='$show_wa',no_wa='$whatsapp',view_fb='$show_fb',user_fb='$facebook',link_fb='$link_fb',view_ig='$show_ig',user_ig='$instagram',link_ig='$link_ig',view_yt='$show_yt',user_yt='$youtube',link_yt='$link_yt',modified_date='$date',modified_by='$by' WHERE id_kontak='$id'");

      if($save)
      {
        $_SESSION['val'] = '<div class="alert alert-success" id="auto-close">
          <em class="fas fa-check-circle"></em> Berhasil Ubah Data
        </div>';
        header('location: ../?page=kontak');
      }
    }
  }
?>