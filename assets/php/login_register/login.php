<?php
include 'connect.php';

$data = array();

$email = $_POST['email'];
$password = $_POST['password'];

$tsql= "SELECT * FROM (
		SELECT userid AS id, username AS label, email, pass, usertype FROM citizen
		UNION
		SELECT dcenterid AS id, dcentername AS label, email, pass, usertype FROM donationcenter
		UNION
		SELECT redcrossid AS id, redcrossname AS label, email, pass, usertype FROM redcross) AS loginres WHERE email = '$email' AND pass = '$password'";
$getResults= sqlsrv_query($conn, $tsql);

if ($getResults == FALSE){}
    echo (sqlsrv_errors());
	$data['status'] = "Query Error!";
}else{
	if(!sqlsrv_has_rows($getResults)){
		$data['usertype'] = 0;
	}else{
		while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
			switch($row['usertype']){
				case "citizen":{
					$data['usertype'] = 1;
					$data['userid'] = $row['id'];
					$data['username'] = $row['label'];
					$data['email'] = $row['email'];
					break;
				}
				case "donation center":{
					$data['usertype'] = 2;
					$data['dcenterid'] = $row['id'];
					$data['dcentername'] = $row['label'];
					$data['email'] = $row['email'];
					break;
				}
				case "red cross":{
					$data['usertype'] = 3;
					$data['redcrossid'] = $row['id'];
					$data['redcrossname'] = $row['label'];
					$data['email'] = $row['email'];
					break;
				}
			}
		}
	}	
}

sqlsrv_free_stmt($getResults);

switch($data['usertype']){
	case 0:{
		$data['status'] = "Wrong Login Credentials, Please Try Again";
		echo json_encode($data);
		break;
	}
	case 1:{
		session_start();
		header('Location: http://medaid.azurewebsites.net/');
		break;
	}
	case 2:{
		session_start();
		header('Location: http://medaid.azurewebsites.net/donation_center/dashboard_dc.php');
		break;
	}
	case 3:{
		session_start();
		header('Location: http://medaid.azurewebsites.net/red_cross/dashboard_rc.php');
		break;
	}
}
echo json_encode($data);

?>