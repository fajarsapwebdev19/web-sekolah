<?php
require '../../../connection/database_connect.php';
// error_reporting(0);

$requestData= $_REQUEST;

$columns = array(
  0 => 'null',
  1 => 'null',
  2 => 'nama',
  3 => 'nik',
  4 => 'jk',
  5 => 'asal_instansi',
  6 => 'status'
);


$sql = "SELECT * FROM registrasi_anggota WHERE status='Menunggu'";

$query = mysqli_query($con, $sql);
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;

$sql = "SELECT * FROM registrasi_anggota WHERE 1=1 AND status='Menunggu'";

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
    $nestedData[] = "<button class='btn btn-success confirm' data-id='{$row->registrasi_id}'><em class='fas fa-user-check'></em></button>";
	$nestedData[] = $row->nama;
	$nestedData[] = $row->nik;
	$nestedData[] = $row->jk;
	$nestedData[] = $row->asal_instansi;
	$nestedData[] = $row->no_telp;

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