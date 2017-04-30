<?php
$serverName = "medaid.database.windows.net";
$connectionOptions = array(
    "Database" => "medaid",
    "Uid" => "medaid",
    "PWD" => "Test1234"
);
//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

if($conn)
	echo "Connection Successfull<br>";
else
	echo "Connection Not Successfull<br>"
?>