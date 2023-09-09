<?php
    require '../../../connection/database_connect.php';

    $requestData= $_REQUEST;

    $columns = array(
        0 => 'null',
        1 => 'foto_portal',
        2 => 'judul_portal',
        3 => 'konten_portal',
        4 => 'null'
    );

    $sql = "SELECT * FROM portal";

    $query = mysqli_query($con, $sql);
    $totalData = mysqli_num_rows($query);
    $totalFiltered = $totalData;

    $sql = "SELECT * FROM portal WHERE 1=1";

    if( !empty($requestData['search']['value']) ) {
        $sql.=" AND  judul_portal LIKE '%".$requestData['search']['value']."%' ";
    }

    $query = mysqli_query($con, $sql);
    $totalFiltered = mysqli_num_rows($query);
    $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";	
    $query = mysqli_query($con, $sql);

    $data = array();
    $no = 1;
    while( $row = mysqli_fetch_object($query) ) {
        $nestedData=array(); 
        $nestedData[] = "";
        $nestedData[] = "<img src='../../assets/galeri/vendor/{$row->foto_portal}' width='80'>";
        $nestedData[] = $row->judul_portal;
        $nestedData[] = substr($row->konten_portal, 0,250);
        $nestedData[] = "<button class='btn btn-info btn-sm update mt-1 mb-1' data-id='{$row->portal_id}'><em class='fas fa-edit'></em></button> <button class='btn btn-danger btn-sm delete mt-1 mb-1' data-id='{$row->portal_id}'><em class='fas fa-trash-alt'></em></button>";

        $data[] = $nestedData;
    }


    $json_data = array(
            "draw"            => intval( $requestData['draw'] ),  
            "recordsTotal"    => intval( $totalData ), 
            "recordsFiltered" => intval( $totalFiltered ), 
            "data"            => $data 
        );

    echo json_encode($json_data);
?>