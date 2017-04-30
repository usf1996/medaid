<?php
include connect.php;

$tsql= "SELECT email, pass FROM users WHERE email = ? AND pass = ?";

$params = array($_POST['email'], $_POST['password']);	 
$getResults= sqlsrv_query($conn, $tsql, $params);

if ($getResults == FALSE)
    echo (sqlsrv_errors());

while ($row = sqlsrv_fetch_array($getResults)) {
    echo ($row['id'] . PHP_EOL);
}
sqlsrv_free_stmt($getResults);
?>