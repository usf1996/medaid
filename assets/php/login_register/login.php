<?php
include 'connect.php';

$data = array();

$email = $_POST['email'];
$password = $_POST['password'];

$tsql= "SELECT * FROM (
		SELECT userid, email, pass, usertype FROM citizen
		UNION
		SELECT dcenterid, email, pass, usertype FROM donationcenter
		UNION
		SELECT redcrossid, email, pass, usertype FROM redcross) AS loginres WHERE email = '$email' AND pass = '$password'";
$getResults= sqlsrv_query($conn, $tsql);

if ($getResults == FALSE)
    echo (sqlsrv_errors());
else{
	if(!sqlsrv_has_rows($getResults)){
		$data['usertype'] = 0;
	}else{
		while ($row = sqlsrv_fetch_array($getResults)) {
			switch($row['usertype']){
				case "citizen":{
					$data['usertype'] = 1;
					$data['userid'] = $row['userid'];
					break;
				}
				case "donation center":{
					$data['usertype'] = 2;
					$data['dcenterid'] = $row['dcenterid'];
					echo json_encode($data);
					break;
				}
				case "red cross":{
					$data['usertype'] = 3;
					$data['redcrossid'] = $row['redcrossid'];
					break;
				}
			}
		}
	}	
}

sqlsrv_free_stmt($getResults);

//session_start();
//$_SESSION['loginData'] = $data;
echo json_encode($data);

?>