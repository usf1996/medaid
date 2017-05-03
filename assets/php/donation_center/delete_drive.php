<?php
include 'connect.php';

$driveid = $_POST['driveid'];

$tsql= "delete from blooddrive where driveid = 23";
$params = array($driveid);
$getResults= sqlsrv_query($conn, $tsql, $params);
if ($getResults == FALSE)
    echo print_r(sqlsrv_errors(), true);
else{
    sqlsrv_free_stmt($getResults);
	echo json_encode("Done");
}

?>