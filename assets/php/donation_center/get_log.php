<?php
include 'connect.php';

$data = array();

$id = $_POST['userid'];

$tsql= "SELECT * FROM citizen WHERE userid = '$id'";

$getResults= sqlsrv_query($conn, $tsql);

if ($getResults == FALSE)
	echo (sqlsrv_errors());
else{
	while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
		$data['userid'] = $row['userid'];
		$data['gender'] = $row['gender'];
		$data['dob'] = $row['dob'];
		$data['phonenum'] = $row['phonenum'];
		$data['bloodtype'] = $row['bloodtype'];
		$data['fname'] = $row['fname'];
		$data['lname'] = $row['lname'];
		$data['username'] = $row['username'];
		$data['email'] = $row['email'];
	}
}

sqlsrv_free_stmt($getResults);
echo json_encode($data);

?>