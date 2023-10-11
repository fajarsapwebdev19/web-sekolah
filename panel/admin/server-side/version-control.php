<?php
require '../../../connection/database_connect.php';
// error_reporting(0);

$requestData= $_REQUEST;

$columns = array(
  0 => 'version', 
  1 => 'v_id'
);


$sql = "SELECT * FROM version";

$query = mysqli_query($con, $sql);
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;

$sql = "SELECT * FROM version WHERE 1=1";

if( !empty($requestData['search']['value']) ) {
	$sql.=" AND  nama LIKE '%".$requestData['search']['value']."%' ";    
	$sql.=" OR jk LIKE '%".$requestData['search']['value']."%' ";
}

$query = mysqli_query($con, $sql);
$totalFiltered = mysqli_num_rows($query);
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";	
$query = mysqli_query($con, $sql);

$data = array();
$no = 1;
while( $row = mysqli_fetch_object($query) ) {
	$nestedData=array(); 
	$nestedData[] = ($row->status == "N" ? $row->version : "<b>".$row->version."</b>");
  $nestedData[] = "<button class='btn btn-success btn-sm active mb-2' ".($row->status == "Y" ? 'disabled' : '')." data-id='{$row->v_id}'><em class='fas fa-check'></em></button> <button class='btn btn-danger btn-sm delete mb-2' data-id='{$row->v_id}'><em class='fas fa-trash-alt'></em></button> <button class='btn btn-info btn-sm feature mb-2' data-id='{$row->v_id}'><em class='fas fa-bars'></em></button>";

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