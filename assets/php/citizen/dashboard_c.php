<?php
include 'connect.php';

$data = array();

$drivedata = array();
$drivetable = array();

$reqdata = array();
$reqtable = array();

$tsql= "SELECT info, driveid, drivename, driveloc, CONVERT(VARCHAR(11), sdate, 106) AS sdate, CONVERT(VARCHAR(11), edate, 106) AS edate
		FROM blooddrive";

$getResults= sqlsrv_query($conn, $tsql);

if ($getResults == FALSE)
	echo (sqlsrv_errors());
else{
	while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
		$drivedata['driveid'] = $row['driveid'];
		$drivedata['drivename'] = $row['drivename'];
		$drivedata['driveloc'] = $row['driveloc'];
		$drivedata['sdate'] = $row['sdate'];
		$drivedata['edate'] = $row['edate'];
		$drivedata['info'] = $row['info'];
		array_push($drivetable, $drivedata);
	}
	$data['drivedata'] = $drivetable;
}

$tsql= "SELECT info, reqid, bloodtype, hospital
		FROM bloodreq";

$getResults= sqlsrv_query($conn, $tsql);

if ($getResults == FALSE)
	echo (sqlsrv_errors());
else{
	while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
		$reqdata['reqid'] = $row['reqid'];
		$reqdata['bloodtype'] = $row['bloodtype'];
		$reqdata['hospital'] = $row['hospital'];
		$reqdata['info'] = $row['info'];
		array_push($reqtable, $reqdata);
	}
	$data['reqdata'] = $reqtable;
}

sqlsrv_free_stmt($getResults);
echo json_encode($data);

?>