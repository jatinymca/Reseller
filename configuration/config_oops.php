<?php
date_default_timezone_set('asia/calcutta');
$now = date('Y-m-d H:i:s');
$today = date('Y-m-d');

$dbHost     = 'localhost';
$dbUsername = 'root';
$dbPassword = 'vssoft@123';
$dbName     = 'vertage';

//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

?>