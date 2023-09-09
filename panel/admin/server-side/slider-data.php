<?php
require '../../../connection/database_connect.php';
// error_reporting(0);

$requestData= $_REQUEST;

$columns = array(
  0 => 'null', 
  1 => 'judul_slider',
  2 => 'foto_slider',
  3 => 'kontent_slider',
  4 => 'null'
);


$sql = "SELECT * FROM slider_data";

$query = mysqli_query($con, $sql);
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;

$sql = "SELECT * FROM slider_data WHERE 1=1";

if( !empty($requestData['search']['value']) ) {
	$sql.=" AND  judul_slider LIKE '%".$requestData['search']['value']."%' ";    
}

$query = mysqli_query($con, $sql);
$totalFiltered = mysqli_num_rows($query);
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";	
$query = mysqli_query($con, $sql);

$data = array();
while( $row = mysqli_fetch_object($query) ) {
	$nestedData=array(); 
  $nestedData[] = "";
	$nestedData[] = $row->judul_slider;
	$nestedData[] = "<img src='../../assets/galeri/vendor/{$row->foto_slider}' width='120'>";
	$nestedData[] = substr($row->kontent_slider,0,250);
	$nestedData[] = "<button type='button' class='btn btn-info btn-sm mt-2 mb-2 update' data-id='{$row->id}'><em class='fas fa-edit'></em></button> <button type='button' class='btn btn-danger btn-sm mt-2 mb-2 delete' data-id='{$row->id}'><em class='fas fa-trash-alt'></em></button>";

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