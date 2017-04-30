<?php

$serverName = "medaid.database.windows.net";
$connectionOptions = array(
    "Database" => "medaid",
    "Uid" => "medaid",
    "PWD" => "Test1234"
);
//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

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