<?php
include connect.php;

$tsql= "UPDATE SalesLT.Product SET ListPrice =? WHERE Name = ?";

$params = array(50,"BrandNewProduct");
$getResults= sqlsrv_query($conn, $tsql, $params);

if ($getResults == FALSE)
    echo print_r(sqlsrv_errors(), true);
else{
    $rowsAffected = sqlsrv_rows_affected($getResults);
    echo ($rowsAffected. " row(s) updated" . PHP_EOL);
    sqlsrv_free_stmt($getResults);
}
?>