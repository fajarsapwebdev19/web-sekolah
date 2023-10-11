<?php
    require '../../../connection/database_connect.php';

    $id = isset($_POST['id']) ? $_POST['id'] : null;

    $q = mysqli_query($con, "SELECT * FROM version WHERE v_id='$id'");
    $data = mysqli_fetch_object($q);

    $result = array(
        "id" => $data->v_id,
        "version" => $data->version
    );

    echo json_encode($result);
?>