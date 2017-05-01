<?php

$data = array();

session_start();
$data = $_SESSION['loginData'];

echo json_encode($data);

?>