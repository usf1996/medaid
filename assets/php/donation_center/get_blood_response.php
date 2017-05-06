<?php
include 'connect.php';

$data = array();
$datausers = array();

$id = $_POST['reqid'];

$tsql= "SELECT citizen.fname, citizen.lname, citizen.bloodtype, citizen.phonenum, CONVERT(VARCHAR(11), citizen.dob, 106) AS dob
        FROM accreq
        join citizen ON accreq.userid = citizen.userid AND accreq.reqid = 1";

$getResults= sqlsrv_query($conn, $tsql);

if ($getResults == FALSE)
	echo (sqlsrv_errors());
else{
	$i = 1;
	while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
		$data['phonenum'] = $row['phonenum'];
		$data['bloodtype'] = $row['bloodtype'];
		$data['fname'] = $row['fname'];
		$data['lname'] = $row['lname'];
		$data['dob'] = $row['dob'];
		
		array_push($datausers, $drivedata);
	}
}

sqlsrv_free_stmt($getResults);
echo json_encode($datausers);

?>