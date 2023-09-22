<?php
require '../../../connection/database_connect.php';
// error_reporting(0);

$requestData= $_REQUEST;

$columns = array(
  0 => 'judul', 
  1 => 'isi',
  2 => 'tanggal',
  3 => 'null'
);


$sql = "SELECT * FROM info_ppdb";

$query = mysqli_query($con, $sql);
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;

$sql = "SELECT * FROM info_ppdb WHERE 1=1";

if( !empty($requestData['search']['value']) ) {
	$sql.=" AND  judul LIKE '%".$requestData['search']['value']."%' ";    
	$sql.=" OR tanggal LIKE '%".$requestData['search']['value']."%' ";
}

$query = mysqli_query($con, $sql);
$totalFiltered = mysqli_num_rows($query);
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";	
$query = mysqli_query($con, $sql);

$data = array();
while( $row = mysqli_fetch_object($query) ) {
	$nestedData=array(); 
  $nestedData[] = $row->judul;
	$nestedData[] = substr($row->isi,0,150);
	$nestedData[] = ($row->tanggal == NULL ? "" : date("d-m-Y", strtotime($row->tanggal))).' '. $row->waktu;
	$nestedData[] = "<button class='btn btn-info btn-sm update mb-2' data-id='{$row->info_id}'><em class='fas fa-edit'></em></button> <button class='btn btn-danger btn-sm delete mb-2' data-id='{$row->info_id}'><em class='fas fa-trash-alt'></em></button>";

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