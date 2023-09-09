<?php
    require '../../../connection/database_connect.php';

    $requestData= $_REQUEST;

    $columns = array(
        0 => 'foto',
        1 => 'nama',
        2 => 'asal_instansi',
        3 => 'null'
    );

    $sql = "SELECT * FROM ptk";

    $query = mysqli_query($con, $sql);
    $totalData = mysqli_num_rows($query);
    $totalFiltered = $totalData;

    $sql = "SELECT * FROM ptk WHERE 1=1";

    if( !empty($requestData['search']['value']) ) 
    {
        $sql.=" AND  nama LIKE '%".$requestData['search']['value']."%' ";
    }

    $query = mysqli_query($con, $sql);
    $totalFiltered = mysqli_num_rows($query);
    $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";	
    $query = mysqli_query($con, $sql);

    $data = array();
    $no = 1;
    while( $row = mysqli_fetch_object($query) ) {
        $nestedData=array();
        if($row->foto == NULL)
        {
            if($row->jk == "Laki-Laki")
            {
                $foto = "<img src='../../assets/galeri/foto/male-ptk.jpg' width='50' height='50'>";
            }
            else if($row->jk == "Perempuan")
            {
                $foto = "<img src='../../assets/galeri/foto/female-ptk.jpg' width='50' height='50'>";
            }
        }
        else
        {
            $foto = "<img src='../../assets/galeri/foto/anggota/{$row->foto}' width='50' height='50'>";
        }
        $nestedData[] = $foto;
        $nestedData[] = $row->nama;
        $nestedData[] = $row->asal_instansi;
        $nestedData[] = "<button class='btn btn-primary btn-sm view' data-id='{$row->id_anggota}'><em class='fas fa-eye'></em></button> <button class='btn btn-info btn-sm update' data-id='{$row->id_anggota}'><em class='fas fa-edit'></em></button> <button class='btn btn-danger btn-sm delete' data-id='{$row->id_anggota}'><em class='fas fa-trash-alt'></em></button>";

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