<?php
include 'connect.php';

$data = array();

$email = $_POST['email'];
$password = $_POST['password'];

$tsql= "SELECT * FROM (
		SELECT userid AS id, email, pass, usertype FROM citizen
		UNION
		SELECT dcenterid AS id, email, pass, usertype FROM donationcenter
		UNION
		SELECT redcrossid AS id, email, pass, usertype FROM redcross) AS loginres WHERE email = '$email' AND pass = '$password'";
$getResults= sqlsrv_query($conn, $tsql);

if ($getResults == FALSE)
    echo (sqlsrv_errors());
else{
	if(!sqlsrv_has_rows($getResults)){
		$data['usertype'] = 0;
	}else{
		while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
			switch($row['usertype']){
				case "citizen":{
					$data['usertype'] = 1;
					$data['userid'] = $row['id'];
					break;
				}
				case "donation center":{
					$data['usertype'] = 2;
					$data['dcenterid'] = $row['id'];
					break;
				}
				case "red cross":{
					$data['usertype'] = 3;
					$data['redcrossid'] = $row['id'];
					break;
				}
			}
		}
	}	
}

sqlsrv_free_stmt($getResults);

include 'connect.php';

switch($data['usertype']){
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
		break;
	}
	default:{
		$data['asd'] = "asd";
		break;
	}
}

sqlsrv_free_stmt($getResults);

//session_start();
//$_SESSION['loginData'] = $data;
echo json_encode($data);

?>