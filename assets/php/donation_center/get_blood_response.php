<?php
include 'connect.php';

$data = array();

$id = $_POST['reqid'];

$tsql= "SELECT citizen.fname, citizen.lname, citizen.bloodtype, citizen.phonenum citizen.dob
        FROM accreq
        join citizen ON accreq.userid = citizen.userid AND accreq.reqid = '$id'";

$getResults= sqlsrv_query($conn, $tsql);

if ($getResults == FALSE)
	echo (sqlsrv_errors());
else{
	while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
		$data['phonenum'] = $row['phonenum'];
		$data['bloodtype'] = $row['bloodtype'];
		$data['fname'] = $row['fname'];
		$data['lname'] = $row['lname'];
		$data['dob'] = $row['dob'];
	}
}

sqlsrv_free_stmt($getResults);
echo json_encode($data);

?>