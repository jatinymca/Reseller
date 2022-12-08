<?php
 require('../configuration/c_config.php');
 require('../php/dynamic_sql_command.php');
 require('../configuration/function.php');

  if (isset($_GET["action"]))       {$action=$_GET["action"];}
  elseif (isset($_POST["action"]))  {$action=$_POST["action"];}
  if (isset($_GET["campaign_id"]))       {$campaign_id=$_GET["campaign_id"];}
  elseif (isset($_POST["campaign_id"]))  {$campaign_id=$_POST["campaign_id"];}
   if (isset($_GET["campaign_description"]))       {$campaign_description=$_GET["campaign_description"];}
  elseif (isset($_POST["campaign_description"]))  {$campaign_description=$_POST["campaign_description"];}
    if (isset($_GET["status"]))       {$status=$_GET["status"];}
  elseif (isset($_POST["status"]))  {$status=$_POST["status"];}
   if (isset($_GET["plain_text"]))       {$plain_text=$_GET["plain_text"];}
  elseif (isset($_POST["plain_text"]))  {$plain_text=$_POST["plain_text"];}
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


    if (isset($_GET["record_file_enable_four"]))       {$record_file_enable_four=$_GET["record_file_enable_four"];}
  elseif (isset($_POST["record_file_enable_four"]))  {$record_file_enable_four=$_POST["record_file_enable_four"];} 
   if (isset($_GET["play_file_name_four"]))       {$play_file_name_four=$_GET["play_file_name_four"];}
  elseif (isset($_POST["play_file_name_four"]))  {$play_file_name_four=$_POST["play_file_name_four"];}

    if (isset($_GET["record_file_enable_five"]))       {$record_file_enable_five=$_GET["record_file_enable_five"];}
  elseif (isset($_POST["record_file_enable_five"]))  {$record_file_enable_five=$_POST["record_file_enable_five"];} 
   if (isset($_GET["play_file_name_five"]))       {$play_file_name_five=$_GET["play_file_name_five"];}
  elseif (isset($_POST["play_file_name_five"]))  {$play_file_name_five=$_POST["play_file_name_five"];}

   if (isset($_GET["record_file_enable_six"]))       {$record_file_enable_six=$_GET["record_file_enable_six"];}
  elseif (isset($_POST["record_file_enable_six"]))  {$record_file_enable_six=$_POST["record_file_enable_six"];} 
   if (isset($_GET["play_file_name_six"]))       {$play_file_name_six=$_GET["play_file_name_six"];}
  elseif (isset($_POST["play_file_name_six"]))  {$play_file_name_six=$_POST["play_file_name_six"];}

     if (isset($_GET["attempts"]))       {$attempts=$_GET["attempts"];}
  elseif (isset($_POST["attempts"]))  {$attempts=$_POST["attempts"];} 
   if (isset($_GET["disposition"]))       {$disposition=$_GET["disposition"];}
  elseif (isset($_POST["disposition"]))  {$disposition=$_POST["disposition"];}

    if (isset($_GET["text_to_speech"]))       {$text_to_speech=$_GET["text_to_speech"];}
  elseif (isset($_POST["text_to_speech"]))  {$text_to_speech=$_POST["text_to_speech"];} 

 

if($action=='AddCampaign'){

   $campaign_id=$campaign_id;
	 $sql = "SELECT * FROM `vertage_campaign` where campaign_id='$campaign_id'";
	$res = mysqli_query($conn, $sql);
 	$rowscount = mysqli_num_rows($res);
	if($rowscount==0){
		$row = mysqli_fetch_array($res);
		$table_name='vertage_campaign';
		$dataArray = array();
		$dataArray['campaign_id'] =$campaign_id;
		$dataArray['campaign_description'] = $campaign_description;
		$dataArray['status'] = $status;; 
		$dataArray['username'] =   $login_id;
		 
		insert_data($table_name,$dataArray,$conn);
		$response   = "200";
		$output = array("Response"=>$response,"message"=>"Campaign Add successfully");
	}else{
		$data       = "Cmpaign already !";
		$response   = "400";
		$output = array("Response"=>$response,"message"=>$data);
	}
 


}

if($action=='obd_Reschedule'){

   $campaign_id=$campaign_id;
      $disposition=implode( ", ", $disposition);

	 $sql = "SELECT * FROM `obd_Reschedule` where campaign_id='$campaign_id'";
	$res = mysqli_query($conn, $sql);
 	$rowscount = mysqli_num_rows($res);
	if($rowscount==0){
		$row = mysqli_fetch_array($res);
		$table_name='obd_Reschedule';
		$dataArray = array();
		$dataArray['campaign_id'] =$campaign_id;
		$dataArray['attempts'] = $attempts;
		$dataArray['disposition'] = $disposition;; 
		$dataArray['username'] =   $login_id;
		 
		insert_data($table_name,$dataArray,$conn);
		$response   = "200";
		$output = array("Response"=>$response,"message"=>"Campaign Add successfully");
	}else{
		$data       = "Cmpaign already !";
		$response   = "400";
		$output = array("Response"=>$response,"message"=>$data);
	}
 
 

}


if($action=='add_group'){
   $group_name=strtoupper($group_name);
	 $sql = "SELECT * FROM `vertage_groups` where group_name='$group_name'";
	$res = mysqli_query($conn, $sql);
 	$rowscount = mysqli_num_rows($res);
	if($rowscount==0){
		$row = mysqli_fetch_array($res);
		$table_name='vertage_groups';
		$dataArray = array();
		$dataArray['group_name'] = strtoupper($group_name);
		$dataArray['group_descreption'] = $group_descreption;
		$dataArray['active'] = $active;
		 
		insert_data($table_name,$dataArray,$conn);
		//Alok
		$last_id = mysqli_insert_id($conn);
		$dataArray = array();
		$table_name = 'vertage_survey';
		$dataArray['group_id'] = $last_id;
		$dataArray['group_name'] = $group_name;
		$dataArray['create_date'] = $now;
		insert_data($table_name,$dataArray,$conn);
		//Alok
		$response   = "200";
		$output = array("Response"=>$response,"message"=>"Group Add successfully");
	}else{
		$data       = "Group already !";
		$response   = "400";
		$output = array("Response"=>$response,"message"=>$data);
	}
 


}

if($action=='delete_group'){

   $group_name=strtoupper($group_name);
 	 $sql = "DELETE FROM `audio_store_details` WHERE  id='$group_id'";
	$res = mysqli_query($conn, $sql);
 	 
	if($res){
		  
		$response   = "200";
		$output = array("Response"=>$response,"message"=>"Sound Delete successfully");
	}else{
		$data       = "  NOT Deleted !";
		$response   = "400";
		$output = array("Response"=>$response,"message"=>$data);
	} 
}

if($action=='campaign_delete'){

   $group_name=strtoupper($group_name);
 	 $sql = "DELETE FROM `vertage_campaign` WHERE  id='$group_id'";
	$res = mysqli_query($conn, $sql);
 	 
	if($res){
		  
		$response   = "200";
		$output = array("Response"=>$response,"message"=>"Sound Delete successfully");
	}else{
		$data       = "  NOT Deleted !";
		$response   = "400";
		$output = array("Response"=>$response,"message"=>$data);
	} 
}

if($action=='reset_campaign'){

   $group_name=strtoupper($group_name);
 	 $sql = "DELETE FROM `vertage_hopper` WHERE  campaign_id='$group_id'";
	$res = mysqli_query($conn, $sql);
 	 
	if($res){
		  
		$response   = "200";
		$output = array("Response"=>$response,"message"=>"reset_campaign Delete successfully");
	}else{
		$data       = "  NOT Deleted !";
		$response   = "400";
		$output = array("Response"=>$response,"message"=>$data);
	} 
}


if($action=='modify_group_record'){
   	$sql = "SELECT * FROM `vertage_campaign` where campaign_id='$group_id'";
	$res = mysqli_query($conn, $sql);
    $rowscount = mysqli_num_rows($res);
 
	if($rowscount){
		$table_name='vertage_campaign';
		$dataArray = array();
		$dataArray['status'] = $active;  
		$dataArray['campaign_description'] = $group_descreption;
		$dataArray['plain_text'] = $plain_text;

		$dataArray['record_file_enable_one'] = $record_file_enable_one; 
		$dataArray['play_file_name_one'] = $play_file_name_one;

		$dataArray['record_file_enable_two'] = $record_file_enable_two; 
		$dataArray['play_file_name_two'] = $play_file_name_two;

		$dataArray['record_file_enable_three'] = $record_file_enable_three; 
		$dataArray['play_file_name_three'] = $play_file_name_three;
		
		$dataArray['record_file_enable_four'] = $record_file_enable_four; 
		$dataArray['play_file_name_four'] = $play_file_name_four;

		$dataArray['record_file_enable_five'] = $record_file_enable_five; 
		$dataArray['play_file_name_five'] = $play_file_name_five;

		$dataArray['record_file_enable_six'] = $record_file_enable_six; 
		$dataArray['play_file_name_six'] = $play_file_name_six;

		$dataArray['text_to_speech'] = special_characters($text_to_speech);

		update_data($table_name,$dataArray,$conn,"campaign_id",$group_id);
		 
		$data       = " Added Successfully  !";
		$response   = "200";
		$output = array("Response"=>$response,"message"=>"Group modify successfully");
		 
	}else{
		$data       = "Something wrong!";
		$response   = "400";
		$output = array("Response"=>$response,"message"=>$data);
	}
  

}
echo json_encode($output);
?>