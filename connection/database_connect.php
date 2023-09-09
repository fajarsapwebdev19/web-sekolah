<?php
    date_default_timezone_set('Asia/Jakarta');
    setlocale(LC_TIME, 'id-ID');

    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $database   = "website_sekolah";

    $con = mysqli_connect($servername, $username, $password, $database);
?>