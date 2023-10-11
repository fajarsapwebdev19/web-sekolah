<?php
session_start();
require '../../../connection/database_connect.php';
$username = $_SESSION['username'];
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


$sql = "SELECT * FROM ticket WHERE username='$username'";

$query = mysqli_query($con, $sql);
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;

$sql = "SELECT * FROM ticket WHERE username='$username' AND 1=1";

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
	$nestedData[] = (empty($row->tanggal) ? "NULL" : date("d-m-Y",strtotime($row->tanggal)));
	$nestedData[] = $row->waktu;
	$nestedData[] = $row->perihal;
  // status
  if($row->status == "Menunggu")
  {
    $status = "<div class='badge badge-warning'>Menunggu</div>";
  }
  else if($row->status == "Proses")
  {
    $status = "<div class='badge badge-info'>Proses</div>";
  }
  else if($row->status == "Selesai")
  {
    $status = "<div class='badge badge-success bg-success'>Selesai</div>";
  }
	$nestedData[] = $status;
  $nestedData[] = "<button class='btn btn-info btn-sm view' data-id='{$row->no_ticket}'><em class='fas fa-eye'></em></button> <button class='btn btn-danger btn-sm cancel' ".($row->status == 'Selesai' ? "disabled" : "")." data-id='{$row->no_ticket}'><em class='fas fa-times'></em></button>";

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