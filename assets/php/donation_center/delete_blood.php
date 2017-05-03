<?php
include 'connect.php';

$reqid = $_POST['reqid'];

$tsql= "delete from bloodreq where reqid = ?";
$params = array($reqid);
$getResults= sqlsrv_query($conn, $tsql, $params);
if ($getResults == FALSE)
    echo print_r(sqlsrv_errors(), true);
else{
    sqlsrv_free_stmt($getResults);
	echo json_encode("Done");
}

?>