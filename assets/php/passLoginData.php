<?php
include 'connect.php';

$data = array();

$data = $_SESSION['loginData'];

$usertype = $data['usertype'];

switch($usertype){
	case 1:{
		$id = $data['userid'];
		$tsql= "SELECT * FROM citizen WHERE userid = '$id'";
		
		$getResults= sqlsrv_query($conn, $tsql);

		if ($getResults == FALSE)
			echo (sqlsrv_errors());
		else{
			while ($row = sqlsrv_fetch_array($getResults)) {
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
		break;
	}
	case 2:{
		$id = $data['dcenterid'];
		$tsql= "SELECT * FROM citizen WHERE dcenterid = '$id'";
		
		$getResults= sqlsrv_query($conn, $tsql);

		if ($getResults == FALSE)
			echo (sqlsrv_errors());
		else{
			while ($row = sqlsrv_fetch_array($getResults)) {
				$data['dcenterid'] = $row['dcenterid'];
				$data['dcentername'] = $row['dcentername'];
				$data['email'] = $row['email'];
				$data['addr'] = $row['addr'];
				$data['phonenum'] = $row['phonenum'];
				$data['long'] = $row['long'];
				$data['lat'] = $row['lat'];
			}
		}

		sqlsrv_free_stmt($getResults);
		echo json_encode($data);
		break;
	}
	case 3:{
		$id = $data['redcrossid'];
		$tsql= "SELECT * FROM citizen WHERE redcrossid = '$id'";
		
		$getResults= sqlsrv_query($conn, $tsql);

		if ($getResults == FALSE)
			echo (sqlsrv_errors());
		else{
			while ($row = sqlsrv_fetch_array($getResults)) {
				$data['redcrossid'] = $row['redcrossid'];
				$data['redcrossname'] = $row['redcrossname'];
				$data['email'] = $row['email'];
				$data['addr'] = $row['addr'];
				$data['phonenum'] = $row['phonenum'];
				$data['long'] = $row['long'];
				$data['lat'] = $row['lat'];
			}
		}

		sqlsrv_free_stmt($getResults);
		echo json_encode($data);
		break;
	}
}


?>