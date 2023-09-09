<?php
require '../../../connection/database_connect.php';
// error_reporting(0);

$requestData= $_REQUEST;

$columns = array(
  0 => 'null', 
  1 => 'nama',
  2 => 'jk',
  3 => 'asal_instansi',
  4 => 'status'
);


$sql = "SELECT * FROM registrasi_anggota";

$query = mysqli_query($con, $sql);
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;

$sql = "SELECT * FROM registrasi_anggota WHERE 1=1";

if( !empty($requestData['search']['value']) ) {
	$sql.=" AND  nama LIKE '%".$requestData['search']['value']."%' ";    
	$sql.=" OR jk LIKE '%".$requestData['search']['value']."%' ";
}

$query = mysqli_query($con, $sql);
$totalFiltered = mysqli_num_rows($query);
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";	
$query = mysqli_query($con, $sql);

$data = array();
while( $row = mysqli_fetch_object($query) ) {
	$nestedData=array(); 
  	$nestedData[] = "";
	$nestedData[] = $row->nama;
	$nestedData[] = $row->jk;
	$nestedData[] = $row->asal_instansi;
	
	if($row->status == "Menunggu")
	{
		$status = '<p class="badge badge-info">Menunggu</p>';
	}
    else if($row->status == "Terima")
    {
        $status = '<p class="badge badge-success">Terima</p>';
    }else if($row->status == "Tolak")
    {
        $status = '<p class="badge badge-danger">Tolak</p>';
    }

	$nestedData[] = $status;

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