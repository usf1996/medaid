<?php
include 'connect.php';

$email = $_POST['email'];
$password = $_POST['password'];

$tsql= "SELECT * FROM users WHERE email = '$email' AND pass = '$password'";
$getResults= sqlsrv_query($conn, $tsql);

if ($getResults == FALSE)
    echo (sqlsrv_errors());
else{
	while ($row = sqlsrv_fetch_array($getResults)) {
		if($email == $row['email'] && $password == $row['pass']){
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
				default:{
					echo "no usertype";
				}
			}
		}
	}
	
}

sqlsrv_free_stmt($getResults);

?>