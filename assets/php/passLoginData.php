<?php
include 'connect.php';

$data = array();

session_start();
$data = $_SESSION['loginData'];

$usertype = $data['usertype'];

switch($usertype){
	case 1:{
		$id = $data['userid'];
		$tsql= "SELECT * FROM citizen WHERE userid = '$id'";
		break;
	}
	case 2:{
		$id = $data['dcenterid'];
		$tsql= "SELECT * FROM citizen WHERE dcenterid = '$id'";
		break;
	}
	case 3:{
		$id = $data['redcrossid'];
		$tsql= "SELECT * FROM citizen WHERE redcrossid = '$id'";
		break;
	}
}

$getResults= sqlsrv_query($conn, $tsql);

if ($getResults == FALSE)
    echo (sqlsrv_errors());
else{
	while ($row = sqlsrv_fetch_array($getResults)) {
		$data = $row;
	}
}

sqlsrv_free_stmt($getResults);

echo json_encode($data);

?>