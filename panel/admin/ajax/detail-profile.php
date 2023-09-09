<?php
    session_start();
    require '../../../connection/database_connect.php';

    $user_session = $_SESSION['username'];

    $query = mysqli_query($con, "SELECT * FROM user WHERE username='$user_session'");
    $data_user = mysqli_fetch_object($query);
?>

<div class="text-center">
    <div class="profile-foto">
        <img src="../assets/vendor/male.jpg" width="90" class="img-circle elevation-2" alt="">
    </div>
    <div class="profile-user mt-2 mb-2">
        <b>Nama</b>
        <br>
        <p><?= $data_user->nama; ?></p>
        <b>Jenis Kelamin</b>
        <br>
        <p><?= $data_user->jk; ?></p>
        <b>Role</b>
        <br>
        <p><?= $data_user->role; ?></p>
    </div>
</div>