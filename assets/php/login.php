<?php
include (connect.php);

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