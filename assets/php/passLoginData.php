<?php
include 'connect.php';

$data = array();

$usertype = $_POST['usertype'];


		$id = $_POST['dcenterid'];
		$tsql= "SELECT * FROM donationcenter WHERE dcenterid = 1";
		
		$getResults= sqlsrv_query($conn, $tsql);

		if ($getResults == FALSE)
			echo (sqlsrv_errors());
		else{
			while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
				$data['dcenterid'] = $row['dcenterid'];
				$data['dcentername'] = $row['dcentername'];
				$data['email'] = $row['email'];
				$data['addr'] = $row['addr'];
				$data['phonenum'] = $row['phonenum'];
				$data['long'] = $row['long'];
				$data['lat'] = $row['lat'];
			}
		}
		


sqlsrv_free_stmt($getResults);
echo json_encode($data);

?>