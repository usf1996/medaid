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
	echo '<script>console.log("Connection Successfull")</script>';
else
	echo '<script>console.log("Connection Not Successfull")</script>';
?>