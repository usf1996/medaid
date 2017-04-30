<?php
include 'connect.php';

$email = $_POST['email'];
$password = $_POST['password'];

$tsql= "SELECT * FROM users WHERE email = '$email' AND pass = '$password'";
$getResults= sqlsrv_query($conn, $tsql);
echo ("Reading data from table dbo.users" . PHP_EOL . "<br>");

if ($getResults == FALSE)
    echo (sqlsrv_errors());
while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
    echo ($row['fname'] . PHP_EOL . $row['lname']);
}

sqlsrv_free_stmt($getResults);

?>