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
echo ("Reading data from table" . PHP_EOL);

if($getResults){
	echo "<br>Successfull Query to Azure DB";
}else{
	echo "<br>Query Error to Azure DB";
}

sqlsrv_free_stmt($getResults);

?>
 
</body>
</html>
