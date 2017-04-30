<?php
include 'assets\php\connect.php';

$email = $_POST['email'];
$password = $_POST['password'];

$tsql= "SELECT * FROM citizen WHERE email = '$email' AND pass = '$password'";
$getResults= sqlsrv_query($conn, $tsql);

if ($getResults == FALSE)
    echo (sqlsrv_errors());
else{
	if(!sqlsrv_has_rows($getResults)){
		$usertype = 0;
	}else{
		while ($row = sqlsrv_fetch_array($getResults)) {
			if($email == $row['email'] && $password == $row['pass']){
				switch($row['usertype']){
					case "citizen":{
						$usertype = 1;
						break;
					}
					case "donation center":{
						$usertype = 2;
						break;
					}
					case "red cross":{
						$usertype = 3;
						break;
					}
				}
			}
		}
	}	
}

sqlsrv_free_stmt($getResults);

switch($usertype){
	case 0:{
		header('Location: http://medaid.azurewebsites.net/');
		break;
	}
	case 1:{
		header('Location: http://medaid.azurewebsites.net/');
		break;
	}
	case 2:{
		header('Location: http://medaid.azurewebsites.net/donation_center/dashboard_dc.html');
		break;
	}
	case 3:{
		header('Location: http://medaid.azurewebsites.net/red_cross/dashboard_rc.html');
		break;
	}
}

?>