<?php
include 'connect.php';

$data = array();

$drivedata = array();
$drivetable = array();

$reqdata = array();
$reqtable = array();

$usertype = $_POST['usertype'];

switch($usertype){
	case 1:{
		$id = $_POST['userid'];
		$tsql= "SELECT * FROM citizen WHERE userid = '$id'";
		
		$getResults= sqlsrv_query($conn, $tsql);

		if ($getResults == FALSE)
			echo (sqlsrv_errors());
		else{
			while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
				$data['userid'] = $row['userid'];
				$data['gender'] = $row['gender'];
				$data['dob'] = $row['dob'];
				$data['phonenum'] = $row['phonenum'];
				$data['bloodtype'] = $row['bloodtype'];
				$data['fname'] = $row['fname'];
				$data['lname'] = $row['lname'];
				$data['username'] = $row['username'];
				$data['email'] = $row['email'];
			}
		}
		break;
	}
	case 2:{
		$id = $_POST['dcenterid'];
		$tsql= "SELECT blooddrive.drivename, blooddrive.driveloc, CONVERT(VARCHAR(11), blooddrive.sdate, 106) AS sdate, CONVERT(VARCHAR(11), blooddrive.edate, 106) AS edate
				FROM donationcenter join blooddrive 
				ON blooddrive.dcenterid = donationcenter.dcenterid 
					AND blooddrive.dcenterid = '$id'
					AND donationcenter.dcenterid = '$id'";
		
		$getResults= sqlsrv_query($conn, $tsql);

		if ($getResults == FALSE)
			echo (sqlsrv_errors());
		else{
			while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
				$drivedata['drivename'] = $row['drivename'];
				$drivedata['driveloc'] = $row['driveloc'];
				$drivedata['sdate'] = $row['sdate'];
				$drivedata['edate'] = $row['edate'];
				array_push($drivetable, $drivedata);
			}
			$data['drivedata'] = $drivetable;
		}
		
		$tsql= "SELECT bloodreq.bloodtype, bloodreq.hospital
				FROM donationcenter join bloodreq
					ON bloodreq.dcenterid = donationcenter.dcenterid 
						AND bloodreq.dcenterid = '$id'
						AND donationcenter.dcenterid = '$id'";
		
		$getResults= sqlsrv_query($conn, $tsql);

		if ($getResults == FALSE)
			echo (sqlsrv_errors());
		else{
			while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
				$reqdata['bloodtype'] = $row['bloodtype'];
				$reqdata['hospital'] = $row['hospital'];
				array_push($reqtable, $reqdata);
			}
			$data['reqdata'] = $reqtable;
		}
		
		break;
	}
	case 3:{
		$id = $_POST['redcrossid'];
		$tsql= "SELECT * FROM redcross WHERE redcrossid = '$id'";
		
		$getResults= sqlsrv_query($conn, $tsql);

		if ($getResults == FALSE)
			echo (sqlsrv_errors());
		else{
			while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
				$data['redcrossid'] = $row['redcrossid'];
				$data['redcrossname'] = $row['redcrossname'];
				$data['email'] = $row['email'];
				$data['addr'] = $row['addr'];
				$data['phonenum'] = $row['phonenum'];
				$data['long'] = $row['long'];
				$data['lat'] = $row['lat'];
			}
		}
		break;
	}
}

sqlsrv_free_stmt($getResults);
echo json_encode($data);

?>