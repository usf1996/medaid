<?php
include 'connect.php';

$drivename = $_POST['drivename'];
$driveloc = $_POST['driveloc'];
$sdate = $_POST['sdate'];
$edate = $_POST['edate'];
$info = $_POST['info'];
$dcenterid = $_POST['dcenterid'];

$tsql= "insert into blooddrive(drivename, driveloc, sdate, edate, info, dcenterid)
			values('$drivename', '$driveloc', '$sdate', '$edate', '$info', '$dcenterid')";

$getResults= sqlsrv_query($conn, $tsql);

if ($getResults == FALSE)
	echo (sqlsrv_errors());
else{
	sqlsrv_free_stmt($getResults);
	echo json_encode($data);
}

?>