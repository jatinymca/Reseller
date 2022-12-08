<?php

 require('../configuration/c_config.php');
 require('../configuration/function.php');
 require('../php/dynamic_sql_command.php');

  if (isset($_GET["action"]))       {$action=$_GET["action"];}
  elseif (isset($_POST["action"]))  {$action=$_POST["action"];}
  if (isset($_GET["campaign_id"]))       {$campaign_id=$_GET["campaign_id"];}
  elseif (isset($_POST["campaign_id"]))  {$campaign_id=$_POST["campaign_id"];}
   if (isset($_GET["campaign_description"]))       {$campaign_description=$_GET["campaign_description"];}
  elseif (isset($_POST["campaign_description"]))  {$campaign_description=$_POST["campaign_description"];}
    if (isset($_GET["status"]))       {$status=$_GET["status"];}
  elseif (isset($_POST["status"]))  {$status=$_POST["status"];}
    if (isset($_GET["group_name"]))       {$group_name=$_GET["group_name"];}
  elseif (isset($_POST["group_name"]))  {$group_name=$_POST["group_name"];}
    if (isset($_GET["group_descreption"]))       {$group_descreption=$_GET["group_descreption"];}
  elseif (isset($_POST["group_descreption"]))  {$group_descreption=$_POST["group_descreption"];}
    if (isset($_GET["active"]))       {$active=$_GET["active"];}
  elseif (isset($_POST["active"]))  {$active=$_POST["active"];}
    if (isset($_GET["group_id"]))       {$group_id=$_GET["group_id"];}
  elseif (isset($_POST["group_id"]))  {$group_id=$_POST["group_id"];}

  if (isset($_GET["record_file_enable_one"]))       {$record_file_enable_one=$_GET["record_file_enable_one"];}
  elseif (isset($_POST["record_file_enable_one"]))  {$record_file_enable_one=$_POST["record_file_enable_one"];}
    if (isset($_GET["play_time_start_one"]))       {$play_time_start_one=$_GET["play_time_start_one"];}
  elseif (isset($_POST["play_time_start_one"]))  {$play_time_start_one=$_POST["play_time_start_one"];}
    if (isset($_GET["play_time_end_one"]))       {$play_time_end_one=$_GET["play_time_end_one"];}
  elseif (isset($_POST["play_time_end_one"]))  {$play_time_end_one=$_POST["play_time_end_one"];}
    if (isset($_GET["play_file_name_one"]))       {$play_file_name_one=$_GET["play_file_name_one"];}
  elseif (isset($_POST["play_file_name_one"]))  {$play_file_name_one=$_POST["play_file_name_one"];}

    if (isset($_GET["record_file_enable_two"]))       {$record_file_enable_two=$_GET["record_file_enable_two"];}
  elseif (isset($_POST["record_file_enable_two"]))  {$record_file_enable_two=$_POST["record_file_enable_two"];}
    if (isset($_GET["play_time_start_two"]))       {$play_time_start_two=$_GET["play_time_start_two"];}
  elseif (isset($_POST["play_time_start_two"]))  {$play_time_start_two=$_POST["play_time_start_two"];}
  if (isset($_GET["play_time_end_two"]))       {$play_time_end_two=$_GET["play_time_end_two"];}
  elseif (isset($_POST["play_time_end_two"]))  {$play_time_end_two=$_POST["play_time_end_two"];}
   if (isset($_GET["play_file_name_two"]))       {$play_file_name_two=$_GET["play_file_name_two"];}
  elseif (isset($_POST["play_file_name_two"]))  {$play_file_name_two=$_POST["play_file_name_two"];}

   if (isset($_GET["record_file_enable_three"]))       {$record_file_enable_three=$_GET["record_file_enable_three"];}
  elseif (isset($_POST["record_file_enable_three"]))  {$record_file_enable_three=$_POST["record_file_enable_three"];}
   if (isset($_GET["play_time_start_three"]))       {$play_time_start_three=$_GET["play_time_start_three"];}
  elseif (isset($_POST["play_time_start_three"]))  {$play_time_start_three=$_POST["play_time_start_three"];}
   if (isset($_GET["play_time_end_three"]))       {$play_time_end_three=$_GET["play_time_end_three"];}
  elseif (isset($_POST["play_time_end_three"]))  {$play_time_end_three=$_POST["play_time_end_three"];} 
 if (isset($_GET["play_file_name_one"]))       {$play_file_name_one=$_GET["play_file_name_one"];}
  elseif (isset($_POST["play_file_name_one"]))  {$play_file_name_one=$_POST["play_file_name_one"];} 
   if (isset($_GET["play_file_name_three"]))       {$play_file_name_three=$_GET["play_file_name_three"];}
  elseif (isset($_POST["play_file_name_three"]))  {$play_file_name_three=$_POST["play_file_name_three"];} 
     if (isset($_GET["record_file_enable_two"]))       {$record_file_enable_two=$_GET["record_file_enable_two"];}
  elseif (isset($_POST["record_file_enable_two"]))  {$record_file_enable_two=$_POST["record_file_enable_two"];} 

  if (isset($_GET["from_name"]))       {$from_name=$_GET["from_name"];}
  elseif (isset($_POST["from_name"]))  {$from_name=$_POST["from_name"];} 
  if (isset($_GET["from_email_address"]))       {$from_email_address=$_GET["from_email_address"];}
  elseif (isset($_POST["from_email_address"]))  {$from_email_address=$_POST["from_email_address"];} 
  if (isset($_GET["sender_id"]))       {$sender_id=$_GET["sender_id"];}
  elseif (isset($_POST["sender_id"]))  {$sender_id=$_POST["sender_id"];} 



  $URLPath = explode('/',  "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
  $serverhost = $URLPath[0];
  $foldername = $URLPath[1];
  $pagename = $URLPath[2];
  $pagetoken = $URLPath[3];
  $email_verifying = $URLPath[4];
  


if($action=='add_email_sender_id'){

	$token = substr(md5(mt_rand()), 0, 9);

 
 	$sql = "SELECT * FROM `email_sender_id` where from_email_address='$from_email_address'";
	$res = mysqli_query($conn, $sql);
 	$rowscount = mysqli_num_rows($res);
	if($rowscount==0){
		$row = mysqli_fetch_array($res);
		$table_name='email_sender_id';
		$dataArray = array();
		$dataArray['token_id'] = $token;
		$dataArray['from_name'] = strtoupper($from_name);
		$dataArray['from_email_address'] = $from_email_address;
		$dataArray['created_date'] = $now;
		$dataArray['username'] = $login_id;
		 
		insert_data($table_name,$dataArray,$conn);	

		$response   = "200";
		$output = array("Response"=>$response,"message"=>"Sender ID Add successfully","sender_email_address"=>$from_email_address,"token_url"=>"http://".$serverhost."/".$foldername."/email_verification_api.php/".$token."/email_verifying");
	}
	else{
		$data       = "Email address already exist!";
		$response   = "400";
		$output = array("Response"=>$response,"message"=>$data);
	}
 


}

if($action=='email_sender_id_delete'){

 	$sql = "DELETE FROM `email_sender_id` WHERE id='$sender_id'";
	$res = mysqli_query($conn, $sql);
 	 
	if($res){
		  
		$response   = "200";
		$output = array("Response"=>$response,"message"=>"Sender ID Delete successfully");
	}
	else{
		$data       = "Error !";
		$response   = "400";
		$output = array("Response"=>$response,"message"=>$data);
	}
 


}


if($action=='modify_email_sender_id'){

	$sql = "SELECT * FROM `email_sender_id` where from_email_address='$from_email_address' and id!='$sender_id'";
	$res = mysqli_query($conn, $sql);
 	$rowscount = mysqli_num_rows($res);
	if($rowscount=='0'){
		
		$dataArray = array();
		$table_name = 'email_sender_id';
		$dataArray = array();
		$dataArray['from_name'] = strtoupper($from_name);
		$dataArray['from_email_address'] = $from_email_address;

		update_data($table_name,$_POST,$conn,"id",$sender_id);
		$response   = "200";
		$output = array("Response"=>$response,"message"=>"Sender ID modify successfully");
	}
	else{
		$data       = "Email address already exist!";
		$response   = "400";
		$output = array("Response"=>$response,"message"=>$data);
	}
 


}
echo json_encode($output);

?>