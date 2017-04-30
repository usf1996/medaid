<?php
include connect.php;

$tsql= "SELECT TOP 20 pc.Name as CategoryName, p.name as ProductName
     FROM [SalesLT].[ProductCategory] pc
     JOIN [SalesLT].[Product] p
     ON pc.productcategoryid = p.productcategoryid";
	 
$getResults= sqlsrv_query($conn, $tsql);

if ($getResults == FALSE)
    echo (sqlsrv_errors());

while ($row = sqlsrv_fetch_array($getResults)) {
    echo ($row['id'] . PHP_EOL);
}
sqlsrv_free_stmt($getResults);
?>