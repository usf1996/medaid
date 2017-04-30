<?php
include 'connect.php';

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$username = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$phonenum = $_POST['phonenum'];
$gender = $_POST['selectg'];
$dob = $_POST['bday'];
$bloodtype = $_POST['selectbt'];

$tsql= "insert into citizen(fname, lname, username, email, pass, gender, dob, phonenum, blooftype, usertype)
		values(?, ?, ?, ?, ?, ?, ?, ?, ?, 'citizen')";

$params = array($fname, $lname, $username, $email, $pass, $gender, $dob, $phonenum, $bloodtype);
$getResults= sqlsrv_query($conn, $tsql, $params);

if ($getResults == FALSE)
    echo print_r(sqlsrv_errors(), true);
else{
    $rowsAffected = sqlsrv_rows_affected($getResults);
    echo ($rowsAffected. " row(s) inserted" . PHP_EOL);
    sqlsrv_free_stmt($getResults);
}

?>