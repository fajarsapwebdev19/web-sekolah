<?php
require '../../../connection/database_connect.php';
// error_reporting(0);

$requestData= $_REQUEST;

$columns = array(
  0 => 'null', 
  1 => 'no_ticket',
  2 => 'username',
  3 => 'tanggal',
  4 => 'waktu',
  5 => 'perihal',
  6 => 'status',
  7 => 'null'
);


$sql = "SELECT * FROM ticket";

$query = mysqli_query($con, $sql);
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;

$sql = "SELECT * FROM ticket WHERE 1=1";

if( !empty($requestData['search']['value']) ) {
	$sql.=" AND  no_ticket LIKE '%".$requestData['search']['value']."%' ";    
	$sql.=" OR username LIKE '%".$requestData['search']['value']."%' ";
}

$query = mysqli_query($con, $sql);
$totalFiltered = mysqli_num_rows($query);
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";	
$query = mysqli_query($con, $sql);

$data = array();
$no = 1;
while( $row = mysqli_fetch_object($query) ) {
	$nestedData=array(); 
  	$nestedData[] = $row->no_ticket;
	$nestedData[] = $row->username;
	$nestedData[] = $row->tanggal;
	$nestedData[] = $row->waktu;
	$nestedData[] = $row->perihal;
	$nestedData[] = $row->status;
    $nestedData[] = "<button class='btn btn-info btn-sm update' data-id='{$row->no_ticket}'><em class='fas fa-edit'></em></button> <button class='btn btn-danger btn-sm delete' data-id='{$row->no_ticket}'><em class='fas fa-trash-alt'></em></button>";

	$data[] = $nestedData;
}


$json_data = array(
        "draw"            => intval( $requestData['draw'] ),  
        "recordsTotal"    => intval( $totalData ), 
        "recordsFiltered" => intval( $totalFiltered ), 
        "data"            => $data 
    );

echo json_encode($json_data);

sleep(2);
?>