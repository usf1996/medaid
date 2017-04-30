<html>
<head>
</head>
<body>
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
	echo "Connection Successfull";
else
	echo "Connection Not Successfull"

$email = $_POST['email'];
$password  = $_POST['password'];
echo "$email" . " $password";

$tsql= "SELECT email, pass FROM users WHERE email = '$email' AND pass = '$password'";

$getResults= sqlsrv_query($conn, $tsql);

if ($getResults == FALSE)
    echo "nayyak";

while ($row = sqlsrv_fetch_array($getResults)) {
    echo "sex";
}
sqlsrv_free_stmt($getResults);
?>

</body>
</html>