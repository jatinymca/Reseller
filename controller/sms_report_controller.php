<?php

require('../configuration/c_config.php');
require('../configuration/function.php');
require('../php/dynamic_sql_command.php');

if (isset($_GET["action"]))       {$action=$_GET["action"];}
elseif (isset($_POST["action"]))  {$action=$_POST["action"];}
if (isset($_GET["report_name"]))       {$report_name=$_GET["report_name"];}
elseif (isset($_POST["report_name"]))  {$report_name=$_POST["report_name"];}
if (isset($_GET["show_deliverd_status"]))       {$show_deliverd_status=$_GET["show_deliverd_status"];}
elseif (isset($_POST["show_deliverd_status"]))  {$show_deliverd_status=$_POST["show_deliverd_status"];}
if (isset($_GET["login_id"]))       {$login_id_1=$_GET["login_id"];}
elseif (isset($_POST["login_id"]))  {$login_id_1=$_POST["login_id"];}
if (isset($_GET["campaign_name"]))       {$campaign_name=$_GET["campaign_name"];}
elseif (isset($_POST["campaign_name"]))  {$campaign_name=$_POST["campaign_name"];}
if (isset($_GET["request_fromdatetime"]))       {$request_fromdatetime=$_GET["request_fromdatetime"];}
elseif (isset($_POST["request_fromdatetime"]))  {$request_fromdatetime=$_POST["request_fromdatetime"];}
if (isset($_GET["request_todatetime"]))       {$request_todatetime=$_GET["request_todatetime"];}
elseif (isset($_POST["request_todatetime"]))  {$request_todatetime=$_POST["request_todatetime"];}
  

if($action=='generate_report_form'){

 	$sqld = mysqli_query($conn, "SELECT report_request_id FROM `sms_reports` ORDER BY `report_request_id` DESC");
	$rowdata = mysqli_fetch_array($sqld);
	$rowcount = mysqli_num_rows($sqld); 
	$last_request_id = $rowdata['report_request_id'];

	if(empty($last_request_id) || $last_request_id=="0")
	{
		$report_request_id = "1";

		$sql = "INSERT INTO sms_reports (`report_request_id`,`request_datetime`,`request_fromdatetime`,`request_todatetime`,`campaign_name`,`report_name`,`user_id`) VALUES ('$report_request_id','$now','$request_fromdatetime','$request_todatetime','$campaign_name','$report_name','$login_id')";

				if(mysqli_query($conn, $sql)){
					$data   = "Report request added successfully";
					$response   = "200";
				}
				else{
					$data       = "Something Wrong!";
					$response   = "400";
				}
	}
	else if($last_request_id>0)
	{
		$last_request_id = $last_request_id+1;

		$sql = "INSERT INTO sms_reports (`report_request_id`,`request_datetime`,`request_fromdatetime`,`request_todatetime`,`campaign_name`,`report_name`,`user_id`) VALUES ('$last_request_id','$now','$request_fromdatetime','$request_todatetime','$campaign_name','$report_name','$login_id')";

				if(mysqli_query($conn, $sql)){
					$data   = "Report request added successfully";
					$response   = "200";
				}
				else{
					$data       = "Something Wrong!";
					$response   = "400";
				}
	}

	
	$output	= array("Response"=>$response,"message"=>$data);
} 






echo json_encode($output);

?>





