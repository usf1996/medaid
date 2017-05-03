<?php
include 'connect.php';

$bloodtype = $_POST['bloodtype'];
$hospital = $_POST['hospital'];
$info = $_POST['info'];
$dcenterid = $_POST['dcenterid'];

$tsql= "insert into bloodreq(bloodtype, hospital, info, dcenterid) VALUES (?,?,?,?)";
$params = array($bloodtype, $hospital, $info, $dcenterid);
$getResults= sqlsrv_query($conn, $tsql, $params);
if ($getResults == FALSE)
    echo print_r(sqlsrv_errors(), true);
else{
    sqlsrv_free_stmt($getResults);
	echo json_encode("Done");
}

?>