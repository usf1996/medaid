<?php
include 'connect.php';

$data = array();

$usertype = $_POST['usertype'];

switch($usertype){
	case 1:{
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
		break;
	}
	case 2:{
		$id = $_POST['dcenterid'];
		$tsql= "SELECT * FROM donationcenter WHERE dcenterid = '$id'";
		
		$getResults= sqlsrv_query($conn, $tsql);

		if ($getResults == FALSE)
			echo (sqlsrv_errors());
		else{
			while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
				$data['dcenterid'] = $row['dcenterid'];
				$data['dcentername'] = $row['dcentername'];
				$data['email'] = $row['email'];
				$data['addr'] = $row['addr'];
				$data['phonenum'] = $row['phonenum'];
				$data['long'] = $row['long'];
				$data['lat'] = $row['lat'];
			}
		}
		break;
	}
	case 3:{
		$id = $_POST['redcrossid'];
		$tsql= "SELECT * FROM redcross WHERE redcrossid = '$id'";
		
		$getResults= sqlsrv_query($conn, $tsql);

		if ($getResults == FALSE)
			echo (sqlsrv_errors());
		else{
			while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
				$data['redcrossid'] = $row['redcrossid'];
				$data['redcrossname'] = $row['redcrossname'];
				$data['email'] = $row['email'];
				$data['addr'] = $row['addr'];
				$data['phonenum'] = $row['phonenum'];
				$data['long'] = $row['long'];
				$data['lat'] = $row['lat'];
			}
		}
		break;
	}
}


sqlsrv_free_stmt($getResults);
echo json_encode($id);

?>