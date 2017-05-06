<?php
include 'connect.php';

$userid = $_POST['userid'];
$reqid = $_POST['reqid'];

$tsql= "DELETE FROM accreq WHERE reqid = ? AND userid = ?";

$params = array($reqid, $userid);
$getResults= sqlsrv_query($conn, $tsql, $params);
if ($getResults == FALSE)
    echo print_r(sqlsrv_errors(), true);
else{
    sqlsrv_free_stmt($getResults);
	echo json_encode("Done");
}

?>