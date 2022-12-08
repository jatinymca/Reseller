<?php 
include('configuration/c_config.php');
include('configuration/logs.php');
if (isset($_GET["campaign_id"]))					{$campaign_id=$_GET["campaign_id"];}
elseif (isset($_POST["campaign_id"]))		{   $campaign_id=$_POST["campaign_id"];}
 // output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=File_Format.csv');

//create a file pointer connected to the output stream
$output = fopen('php://output', 'w'); 
 
 
$field3=array('phone_number','Customer_name','A1','A2','A3','D1','D2','D3');
 

 
 fputcsv($output, $field3);
 

?>