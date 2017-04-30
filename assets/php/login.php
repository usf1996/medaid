<?php
include connect.php;

$tsql= "SELECT * FROM users";
$getResults= sqlsrv_query($conn, $tsql);
echo ("Reading data from table dbo.users" . PHP_EOL . "<br>");

if ($getResults == FALSE)
    echo (sqlsrv_errors());
while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
    echo ($row['username'] . PHP_EOL . "<br>");
}

sqlsrv_free_stmt($getResults);

?>