<?php
    session_start();
    include '../../connection/database_connect.php';
    require 'kal-ind.php';

    $page = isset($_GET['page']) ? $_GET['page'] : null;

    $query = mysqli_query($con, "SELECT logo FROM about");
    $data_about = mysqli_fetch_object($query);

    if(empty($_SESSION['login_status'] == "OKE"))
    {
        $_SESSION['val'] = "<div class='alert alert-danger bg-danger'>
            Anda Belum Login
        </div>";
        header('location: ../'); 
    }else{
        $user_session = $_SESSION['username'];
        $query = mysqli_query($con, "SELECT * FROM user WHERE username='$user_session'");
        $data_user = mysqli_fetch_object($query);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?php require 'template/title.php'; echo $title; ?></title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.css">
  <!-- teks editor -->
  <link rel="stylesheet" href="../assets/editor/summernote-bs4.min.css">
  
  <!-- Datatables -->
  <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- datepicker -->
  <link rel="stylesheet" href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
  <!-- fav icon -->
  <link rel="shortcut icon" href="../../assets/galeri/vendor/<?= $data_about->logo; ?>" type="image/x-icon">
  <style>
    .err{
      border: 1px solid red;
    }
    .form-control.err:focus{
      border: 1px solid red;
    }

    .error{
      color: red;
      font-size: 12px;
      padding-left: 4px;
      padding-right: 4px;
    }

    table.datatable{
      width: 100% !important;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php require 'template/navbar.php'; ?>
  <!-- /.navbar -->
  
  <!-- Sidebar -->
  <?php require 'template/sidebar.php'; ?>
  <!-- Sidebar -->
  
  <!-- page -->
  <?php require 'template/page.php'; ?>
  <!-- page -->

  <!-- footer -->
  <?php require 'template/footer.php'; ?>
  <!-- end footer -->
  
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<script src="../assets/dist/jquery.validate.min.js"></script>
<!-- Datatables -->
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- datepicker -->
<script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<!-- teks editor -->
<script src="../assets/editor/summernote-bs4.min.js"></script>

<script src="../assets/plugins/main.js"></script>

<!-- Bootstrap -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../assets/dist/js/demo.js"></script>

<!-- PAGE SCRIPTS -->
<script src="../assets/dist/js/pages/dashboard2.js"></script>

<script>
  $('.tambah-kolom').click(function() {
    var html = $('.copy').html();
    $('.kolom-duplikat').after(html);

    $("body").on("click", ".remove", function() {
      $(this).parents(".kolom").remove();
    })
  })
</script>


</body>
</html>
