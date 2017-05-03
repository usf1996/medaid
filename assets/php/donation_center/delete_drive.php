<?php
include 'connect.php';

$drivename = $_POST['drivename'];
$driveloc = $_POST['driveloc'];
$sdate = date('Y-m-d', strtotime($_POST['sdate']));
$edate = date('Y-m-d', strtotime($_POST['edate']));
$info = $_POST['info'];
$dcenterid = $_POST['dcenterid'];

$tsql= "insert into blooddrive(drivename, driveloc, sdate, edate, info, dcenterid) VALUES (?,?,?,?,?,?);";
$params = array($drivename, $driveloc, $sdate, $edate, $info, $dcenterid);
$getResults= sqlsrv_query($conn, $tsql, $params);
if ($getResults == FALSE)
    echo print_r(sqlsrv_errors(), true);
else{
    sqlsrv_free_stmt($getResults);
	echo json_encode("Done");
}

?>