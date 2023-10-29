<?php
    require '../../../connection/database_connect.php';

    $id = mysqli_real_escape_string($con, $_POST['id']);

    $delete = mysqli_query($con, "DELETE FROM version_control WHERE id='$id'");
    $delete .= mysqli_query($con, "ALTER TABLE version_control AUTO_INCREMENT=1");

    if($delete)
    {
        echo "berhasil";
    }
?>