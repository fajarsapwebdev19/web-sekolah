<?php
    require '../../../connection/database_connect.php';

    $requestData= $_REQUEST;

    $columns = array(
        0 => 'null',
        1 => 'judul_file',
        2 => 'file',
        3 => 'file',
        4 => 'date_upload',
        5 => 'null'

    );

    $sql = "SELECT * FROM foto_upload ORDER BY judul_file DESC";

    $query = mysqli_query($con, $sql);
    $totalData = mysqli_num_rows($query);
    $totalFiltered = $totalData;

    $sql = "SELECT * FROM foto_upload WHERE 1=1";

    if( !empty($requestData['search']['value']) ) 
    {
        $sql.=" AND  judul_file LIKE '%".$requestData['search']['value']."%'  ORDER BY judul_file DESC";
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
        $nestedData[] = $row->file;
        $nestedData[] = "<button class='btn btn-primary btn-sm mt-1 mb-1 view'  title='View' data-id='{$row->id_foto}'><em class='fas fa-eye'></button>";
        if($row->date_upload == NULL)
        {
            $date = "";
        }else{
            $date =  date('d-m-Y', strtotime($row->date_upload));
        }
        $nestedData[] = $date;
        $nestedData[] = "<button class='btn btn-info btn-sm update mt-1 mb-1' data-id='{$row->id_foto}'><em class='fas fa-edit'></em></button> <button class='btn btn-danger btn-sm delete mt-1 mb-1' data-id='{$row->id_foto}'><em class='fas fa-trash'></em></button>";
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