<?php
require '../../../connection/database_connect.php';
// error_reporting(0);

$requestData= $_REQUEST;

$columns = array(
  0 => 'null', 
  1 => 'nama',
  2 => 'jk',
  3 => 'usia',
  4 => 'username',
  5 => 'password',
  6 => 'last_login',
  7 => 'status_akun',
  8 => 'null'
);


$sql = "SELECT id_user, nama,jk,username,password,last_login,status_akun, timestampdiff(year, tgl_lahir, curdate()) as usia FROM user";

$query = mysqli_query($con, $sql);
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;

$sql = "SELECT id_user,nama,jk,username,password,last_login,status_akun, timestampdiff(year, tgl_lahir, curdate()) as usia FROM user WHERE 1=1";

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
  	$nestedData[] = "";
	$nestedData[] = $row->nama;
	$nestedData[] = $row->jk;
	$nestedData[] = $row->usia;
	$nestedData[] = $row->username;
	$nestedData[] = $row->password;

    if($row->last_login == NULL)
    {
        $lastlog = "Belum Login";
    }else{
        $lastlog = date('d-m-Y H:i:s', strtotime($row->last_login));
    }
	$nestedData[] = $lastlog;
	
	if($row->status_akun == "Aktif")
	{
		$status = '<em class="fas fa-check-circle text-success"></em>';
	}
    else if($row->status_akun == "Tidak Aktif")
    {
        $status = '<em class="fas fa-times-circle text-danger"></em>';
    }

	$nestedData[] = $status;
    // $nestedData[] = "";
    $nestedData[] = "<button class='btn btn-info btn-sm update' data-id='{$row->id_user}'><em class='fas fa-edit'></em></button> <button class='btn btn-danger btn-sm delete' data-id='{$row->id_user}'><em class='fas fa-trash-alt'></em></button>";

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