<?php
include 'connect.php';

$data = array();

$email = $_POST['email'];
$password = $_POST['password'];

$tsql= "SELECT * FROM (
		SELECT userid AS id, email, pass, usertype FROM citizen
		UNION
		SELECT dcenterid AS id, dcentername, email, pass, usertype FROM donationcenter
		UNION
		SELECT redcrossid AS id, redcrossname, email, pass, usertype FROM redcross) AS loginres WHERE email = '$email' AND pass = '$password'";
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
					$data['dcentername'] = $row['dcentername'];
					$data['email'] = $row['email'];
					break;
				}
				case "red cross":{
					$data['usertype'] = 3;
					$data['redcrossid'] = $row['id'];
					$data['redcrossname'] = $row['redcrossname'];
					$data['email'] = $row['email'];
					break;
				}
			}
		}
	}	
}

sqlsrv_free_stmt($getResults);
echo json_encode($data);

?>