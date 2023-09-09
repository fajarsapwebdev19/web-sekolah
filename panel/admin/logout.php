<?php
    session_start();

    unset($_SESSION['username']);
    unset($_SESSION['login_status']);

    $_SESSION['val'] = '<div class="alert alert-success" id="auto-close">
        Berhasil Logout
    </div>';
    header('location: ../');
?>