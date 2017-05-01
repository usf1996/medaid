<?php
include 'connect.php';

$data = array();

$email = $_POST['email'];
$password = $_POST['password'];

$tsql= "SELECT * FROM (
		SELECT email, pass, usertype FROM citizen
		UNION
		SELECT email, pass, usertype FROM donationcenter
		UNION
		SELECT email, pass, usertype FROM redcross) AS loginres WHERE email = '$email' AND pass = '$password'";
$getResults= sqlsrv_query($conn, $tsql);

if ($getResults == FALSE)
    echo (sqlsrv_errors());
else{
	if(!sqlsrv_has_rows($getResults)){
		$data['usertype'] = 0;
	}else{
		while ($row = sqlsrv_fetch_array($getResults)) {
			if($email == $row['email'] && $password == $row['pass']){
				switch($row['usertype']){
					case "citizen":{
						$data['usertype'] = 1;
						$data['fname'] = $row['fname'];
						$data['lname'] = $row['lname'];
						$data['username'] = $row['username'];
						$data['email'] = $row['email'];
						$data['gender'] = $row['gender'];
						$data['dob'] = $row['dob'];
						$data['phonenum'] = $row['phonenum'];
						$data['bloodtype'] = $row['bloodtype'];
						break;
					}
					case "donation center":{
						$data['usertype'] = 2;
						$data['dcentername'] = $row['dcentername'];
						$data['email'] = $row['email'];
						$data['addr'] = $row['addr'];
						$data['phonenum'] = $row['phonenum'];
						$data['long'] = $row['long'];
						$data['lat'] = $row['lat'];
						break;
					}
					case "red cross":{
						$data['usertype'] = 3;
						$data['redcrossname'] = $row['redcrossname'];
						$data['email'] = $row['email'];
						$data['addr'] = $row['addr'];
						$data['phonenum'] = $row['phonenum'];
						$data['long'] = $row['long'];
						$data['lat'] = $row['lat'];
						break;
					}
				}
			}
		}
	}	
}

sqlsrv_free_stmt($getResults);

session_start();
$_SESSION['loginData'] = $data;
echo json_encode($data);

?>