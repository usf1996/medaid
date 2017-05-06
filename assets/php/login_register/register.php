<?php
include 'connect.php';

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$username = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];
$phonenum = $_POST['phonenum'];
$gender = $_POST['selectg'];
$dob = $_POST['bday'];
$bloodtype = $_POST['selectbt'];

$tsql= "insert into citizen(fname, lname, username, email, pass, gender, dob, phonenum, bloodtype, usertype)
		values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		
$params = array($fname, $lname, $username, $email, $pass, $gender, $dob, $phonenum, $bloodtype, "citizen");
$getResults= sqlsrv_query($conn, $tsql, $params);

if ($getResults == FALSE)
    echo print_r(sqlsrv_errors(), true);
else{
    sqlsrv_free_stmt($getResults);
	header("Location: http://medaid.azurewebsites.net/");
}

?>