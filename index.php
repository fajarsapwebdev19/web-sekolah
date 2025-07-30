<?php
  require 'connection/database_connect.php';
  $query_about = mysqli_query($con, "SELECT * FROM about");
  $data_about = mysqli_fetch_object($query_about);
  $query_kontak = mysqli_query($con, "SELECT * FROM kontak");
  $data_kontak = mysqli_fetch_object($query_kontak);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <META NAME="description" CONTENT="SMK PGRI Neglasari">
    <META NAME="keywords" CONTENT="smkpgrineglasari, smkgrineta, smkpgribandara">
    <META NAME="robot" CONTENT="index,follow">
    <meta name="language" content="indonesia"> 
    <title><?php require 'template/title.php'; echo $title; ?></title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="assets/plugins/owlcarousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/plugins/owlcarousel/css/owl.theme.default.min.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/all.min.css">
    <!-- fav icon -->
    <link rel="shortcut icon" href="assets/galeri/vendor/<?= $data_about->logo; ?>" type="image/x-icon">
    <style>
      .navbar {
        padding: 0.1rem 1rem;
      }

      .dropdown-item 
      {
        display: block;
        width: 100%;
        padding: .10rem 1.5rem;
        clear: both;
        font-weight: 400;
        color: white;
        text-align: inherit;
        white-space: nowrap;
        background-color: transparent;
        border: 0;
    }

    .dropdown-item:hover{
      background-color: transparent !important;
      color: rgba(255,255,255,.75);
    }

      .sticky-custom
      {
        position: sticky;
        top:0;
        bottom: 0;
        left: 0;
        right: 0;
        z-index:1200;
        /* z-index: 100; */
      }
    </style>
</head>
<body id="home">
    <?php require 'template/navbar.php'; ?>
    <!-- page -->
      <div id="page">
        <section class="content-page">
          <div class="section">
            <?php require 'template/page.php'; ?>
          </div>
        </section>
        <!-- footer awal -->
        <?php require 'template/footer.php'; ?>
        <!-- footer akhir -->
      </div>
    <!-- end page -->

    

      <script src="assets/plugins/jquery/jquery-3.3.1.min.js "></script>
      <script>
        window.onscroll = function() {myFunction()};

        var navbar = document.getElementById("navbar");
        var sticky = navbar.offsetTop;

        function myFunction() {
          if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
          } else {
            navbar.classList.remove("sticky");
          }
        }
      </script>
      <script src="assets/plugins/bootstrap/js/bootstrap.min.js "></script>
      <script src="assets/plugins/owlcarousel/js/owl.carousel.min.js "></script>
      <script src="assets/main.js "></script>
</body>
</html>