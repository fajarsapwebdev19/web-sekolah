<?php
    require '../../../connection/database_connect.php';

    $requestData= $_REQUEST;

    $columns = array(
        0 => 'null',
        1 => 'judul_file',
        2 => 'null',
        3 => 'create_date',
        4 => 'null'

    );

    $sql = "SELECT * FROM video_upload";

    $query = mysqli_query($con, $sql);
    $totalData = mysqli_num_rows($query);
    $totalFiltered = $totalData;

    $sql = "SELECT * FROM video_upload WHERE 1=1";

    if( !empty($requestData['search']['value']) ) 
    {
        $sql.=" AND  judul_file LIKE '%".$requestData['search']['value']."%' ";
    }

    $query = mysqli_query($con, $sql);
    $totalFiltered = mysqli_num_rows($query);
    $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";	
    $query = mysqli_query($con, $sql);

    $data = array();
    $no = 1;
    while( $row = mysqli_fetch_object($query) ) 
    {
        $nestedData=array(); 
        $nestedData[] = "";
        $nestedData[] = $row->judul_file;
        $nestedData[] = "<button class='btn btn-primary btn-sm view' data-id='{$row->id_video}'><em class='fas fa-play'></em></button>";
        $nestedData[] = ($row->create_date == NULL ? "" : date('d-m-Y', strtotime($row->create_date)));
        $nestedData[] = "<button class='btn btn-info btn-sm update' data-id='{$row->id_video}'><em class='fas fa-edit'></em></button> <button class='btn btn-danger btn-sm delete' data-id='{$row->id_video}'><em class='fas fa-trash'></em></button>";
        $data[] = $nestedData;
    }


    $json_data = 
        array
            (
                "draw"            => intval( $requestData['draw'] ),  
                "recordsTotal"    => intval( $totalData ), 
                "recordsFiltered" => intval( $totalFiltered ), 
                "data"            => $data 
            );

    echo json_encode($json_data);
?>