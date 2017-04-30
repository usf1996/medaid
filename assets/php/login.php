<?php
include 'connect.php';

$email = $_POST['email'];
$password = $_POST['password'];

$tsql= "SELECT * FROM users WHERE email = '$email' AND pass = '$password'";
$getResults= sqlsrv_query($conn, $tsql);

if ($getResults == FALSE)
    echo (sqlsrv_errors());
else{
	if(sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC) == 0){
		$usertype = 0;
		echo 0;
	}else{
		while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
			if($email == $row['fname'] && $password == $row['pass']){
				switch($row['usertype']){
					case "citizen":{
						$usertype = 1;
						echo 1;
						break;
					}
					case "donation center":{
						$usertype = 2;
						echo 2;
						break;
					}
					case "red cross":{
						$usertype = 3;
						echo 3;
						break;
					}
				}
			}
		}
	}
}

sqlsrv_free_stmt($getResults);

?>