<html>
<head>
<?php

$serverName = "medaid.database.windows.net";
$connectionOptions = array(
    "Database" => "medaid",
    "Uid" => "medaid",
    "PWD" => "Test1234"
);
//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);
?>
</head>

<body>
<h1>PHP connect to Azure</h1>
 
<?php

$serverName = "medaid.database.windows.net";
$connectionOptions = array(
    "Database" => "medaid",
    "Uid" => "medaid",
    "PWD" => "Test1234"
);
//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

$tsql= "SELECT * FROM test";
$getResults= sqlsrv_query($conn, $tsql);
echo ("Reading data from table dbo.test" . PHP_EOL . "<br>");

if ($getResults == FALSE)
    echo (sqlsrv_errors());
while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
    echo ($row['id'] . PHP_EOL . "<br>");
}

sqlsrv_free_stmt($getResults);

?>
 
</body>
</html>
