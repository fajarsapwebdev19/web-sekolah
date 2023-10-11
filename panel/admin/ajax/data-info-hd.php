<?php
    require '../../../connection/database_connect.php';

    $id = mysqli_real_escape_string($con, $_POST['id']);
    
    if(empty($id))
    {
        echo "ID Tidak Di Temukan !";
    }else{
        $sql = mysqli_query($con, "SELECT id_info FROM info_hd WHERE id_info='$id'");
        $data = mysqli_fetch_object($sql);

        $data = array(
            "id" => $data->id_info
        );

        echo json_encode($data);
    }
?>