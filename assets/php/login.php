<?php
include connect.php;

$tsql= "SELECT email, pass FROM users WHERE email = '$_POST['email']' AND pass = '$_POST['password']'";

$getResults= sqlsrv_query($conn, $tsql);

if ($getResults == FALSE)
    echo (sqlsrv_errors());

while ($row = sqlsrv_fetch_array($getResults)) {
    echo ($row['email'] . PHP_EOL);
}
sqlsrv_free_stmt($getResults);
?>