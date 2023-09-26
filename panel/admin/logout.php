<?php
    session_start();

    unset($_SESSION['username']);
    unset($_SESSION['login_status']);

    $_SESSION['message'] = "$('#message-succes').show();
    $('.success-msg').html('Logout Berhasil');
    $('#message-succes').fadeTo(3000, 5000).slideUp(1200, function() {
      $('#message-succes').slideUp(600)
    });
    $('#message-error').hide();
    $('.error-msg').html(null);";
    header('location: ../');
?>