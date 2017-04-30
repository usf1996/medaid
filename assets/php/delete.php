<?php
include connect.php;

$tsql= "DELETE FROM SalesLT.Product WHERE Name = ?";

$params = array("BrandNewProduct");
$getResults= sqlsrv_query($conn, $tsql, $params);

if ($getResults == FALSE)
    echo print_r(sqlsrv_errors(), true);
else{
    $rowsAffected = sqlsrv_rows_affected($getResults);
    echo ($rowsAffected. " row(s) deleted" . PHP_EOL);
    sqlsrv_free_stmt($getResults);
}