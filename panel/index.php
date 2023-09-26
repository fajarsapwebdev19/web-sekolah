<?php
session_start();

// jika masih ada sesi login maka akan dilempar ke halaman dashboard
if (isset($_SESSION['login_status']) == "OKE") {
  // get url by cookie
  $url = isset($_COOKIE['page']) ? $_COOKIE['page'] : null;

  // get history
  if ($url == 'null' || !$url) {
    $get = '';
  } else {
    $get = '?page=' . $url;
  }
  header("location: admin/" . $get);
}
require '../connection/database_connect.php';
$query = mysqli_query($con, "SELECT * FROM about");
$data_about = mysqli_fetch_object($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in - Admin Panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- fav icon -->
  <link rel="shortcut icon" href="../assets/galeri/vendor/<?= $data_about->logo; ?>" type="image/x-icon">
</head>

<body class="hold-transition login-page">
  <div class="login-box mb-4 pt-2">
    <div class="login-logo">
      <img src="../assets/galeri/vendor/<?= $data_about->logo; ?>" width="60" alt="logo-panel">
      <br>
      <b>LOGIN PANEL</b>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">
        <div id="message-succes">
          <div class="alert alert-success">
            <div class="success-msg">

            </div>
          </div>
        </div>
        <div id="message-error">
          <div class="alert alert-danger bg-danger">
            <div class="error-msg">

            </div>
          </div>
        </div>
        </p>
        <form id="login-form">
          <div class="input-group mb-3">
            <input type="text" name="username" class="form-control username" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <button type="button" class="btn btn-block btn-primary login">
                Login
              </button>
              <div class="mt-2 mb-2 text-center">
                &copy; <?= date("Y") ?> <?= $data_about->nama_instansi; ?>
              </div>
            </div>
          </div>
      </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  
  <script>

    $('#message-succes').hide();
    $('#message-error').hide();

    $('.form-control').keypress(function(e) {
      if (e.which == 13) {
        $(".login").click();
      }
    });

    <?php
      if(isset($_SESSION['message']))
      {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
      }
    ?>


    $('.login').click(function() {
      var username = $('.username').val();
      var password = $('.password').val();

      var login = $('#login-form').serialize();

      if (username == "") {
        $('#message-error').show();
        $('.error-msg').html('Username Anda Kosong');
        $('#message-error').fadeTo(3000, 5000).slideUp(1200, function() {
          $('#message-error').slideUp(600)
        });
      } else if (password == "") {
        $('#message-error').show();
        $('.error-msg').html("Password Anda Kosong");
        $("#message-error").fadeTo(3000, 5000).slideUp(1200, function() {
          $("#message-error").slideUp(600)
        });
      } else {
        $('#message-error').hide();
        $('.error-msg').html(null);
        $("#message-error").fadeTo(3000, 5000).slideUp(1200, function() {
          $("#message-error").slideUp(600)
        });

        $.ajax({
          url: 'proses-login.php',
          type: 'POST',
          data: $('#login-form').serialize(),
          success: function(respond) {
            if (respond == "Berhasil") {
              $('#message-succes').show();
              $('.success-msg').html("Login Berhasil");
              $("#message-succes").fadeTo(3000, 5000).slideUp(1200, function() {
                $("#message-succes").slideUp(600)
              });

              $('#message-error').hide();
              $('.error-msg').html(null);
              window.location.href = 'admin/';
            } else if (respond == "Akun Non Active") {
              $('#message-error').show();
              $('.error-msg').html("Akun Anda Tidak Aktif");
              $("#message-error").fadeTo(3000, 5000).slideUp(1200, function() {
                $("#message-error").slideUp(600)
              });

              $('#message-succes').hide();
              $('.success-msg').html(null);

              $('.username').val(null);
              $('.password').val(null);
            } else {
              $('#message-error').show();
              $('.error-msg').html("Username Atau Password Anda Salah");
              $("#message-error").fadeTo(3000, 5000).slideUp(1200, function() {
                $("#message-error").slideUp(600)
              });
              $('#message-succes').hide();
              $('.success-msg').html(null);
              $('.password').val(null);
            }
          }
        });
      }
    });

    $("#auto-close").fadeTo(3000, 5000).slideUp(1200, function() {
      $("#auto-close").slideUp(600)
    });
  </script>
  <!-- Bootstrap 4 -->
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/dist/js/adminlte.min.js"></script>

</body>

</html>