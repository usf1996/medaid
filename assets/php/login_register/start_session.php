<?php

session_start();

$usertype = $_POST['usertype'];

switch($usertype){
	case 1:{
		header('Location: http://medaid.azurewebsites.net/');
		break;
	}
	case 2:{
		$_SESSION['dcenterid'] = $_POST['dcenterid'];
		$_SESSION['dcentername'] = $_POST['dcentername'];
		$_SESSION['email'] = $_POST['email'];
		header('Location: http://medaid.azurewebsites.net/donation_center/dashboard_dc.php');
		break;
	}
	case 3:{
		header('Location: http://medaid.azurewebsites.net/red_cross/dashboard_rc.php');
		break;
	}
}

?>