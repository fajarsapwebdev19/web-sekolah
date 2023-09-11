<?php
require '../../../connection/database_connect.php';
// error_reporting(0);

$requestData= $_REQUEST;

$columns = array(
  0 => 'null',
  1 => 'null',
  2 => 'nama_perusahaan',
  3 => 'null'
);


$sql = "SELECT * FROM hub_industri";

$query = mysqli_query($con, $sql);
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;

$sql = "SELECT * FROM hub_industri WHERE 1=1";

if( !empty($requestData['search']['value']) ) {
	$sql.=" AND  nama_perusahaan LIKE '%".$requestData['search']['value']."%' ";    
	// $sql.=" OR jk LIKE '%".$requestData['search']['value']."%' ";
}

$query = mysqli_query($con, $sql);
$totalFiltered = mysqli_num_rows($query);
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";	
$query = mysqli_query($con, $sql);

$data = array();
while( $row = mysqli_fetch_object($query) ) {
	$nestedData=array();
	$nestedData[] = "<img src='../../assets/galeri/foto/industri/{$row->logo_perusahaan}' width='50' height='50'>";
	$nestedData[] = $row->nama_perusahaan;
  $nestedData[] = "<button class='btn btn-info update_industri mb-2 btn-sm' data-id='{$row->id}'><em class='fas fa-edit'></em></button> <button class='btn btn-danger delete_industri mb-2 btn-sm' data-id='{$row->id}'><em class='fas fa-trash'></em></button>";

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