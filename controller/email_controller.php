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

    if (isset($_GET["list_id"]))       {$list_id=$_GET["list_id"];}
  elseif (isset($_POST["list_id"]))  {$list_id=$_POST["list_id"];}
  
    if (isset($_GET["list_name"]))       {$list_name=$_GET["list_name"];}
  elseif (isset($_POST["list_name"]))  {$list_name=$_POST["list_name"];}
    if (isset($_GET["list_descreption"]))       {$list_descreption=$_GET["list_descreption"];}
  elseif (isset($_POST["list_descreption"]))  {$list_descreption=$_POST["list_descreption"];}

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


    if (isset($_GET["campaign_name"]))       {$campaign_name=$_GET["campaign_name"];}
  elseif (isset($_POST["campaign_name"]))  {$campaign_name=$_POST["campaign_name"];}
    if (isset($_GET["sms_text_content"]))       {$sms_text_content=$_GET["sms_text_content"];}
  elseif (isset($_POST["sms_text_content"]))  {$sms_text_content=$_POST["sms_text_content"];}
      if (isset($_GET["schedule_radio_type"]))       {$schedule_radio_type=$_GET["schedule_radio_type"];}
  elseif (isset($_POST["schedule_radio_type"]))  {$schedule_radio_type=$_POST["schedule_radio_type"];}
      if (isset($_GET["scheduledate"]))       {$scheduledate=$_GET["scheduledate"];}
  elseif (isset($_POST["scheduledate"]))  {$scheduledate=$_POST["scheduledate"];}
  if (isset($_GET["descr"]))       {$descr=$_GET["descr"];}
  elseif (isset($_POST["descr"]))  {$descr=$_POST["descr"];}
  if (isset($_GET["templatename"]))       {$templatename=$_GET["templatename"];}
  elseif (isset($_POST["templatename"]))  {$templatename=$_POST["templatename"];}
  if (isset($_GET["templatetext"]))       {$templatetext=$_GET["templatetext"];}
  elseif (isset($_POST["templatetext"]))  {$templatetext=$_POST["templatetext"];}
   if (isset($_GET["email_campaign_id"]))       {$email_campaign_id=$_GET["email_campaign_id"];}
  elseif (isset($_POST["email_campaign_id"]))  {$email_campaign_id=$_POST["email_campaign_id"];}
    if (isset($_GET["template_id"]))       {$template_id=$_GET["template_id"];}
  elseif (isset($_POST["template_id"]))  {$template_id=$_POST["template_id"];}
  if (isset($_GET["email_sender_id"]))       {$email_sender_id=$_GET["email_sender_id"];}
  elseif (isset($_POST["email_sender_id"]))  {$email_sender_id=$_POST["email_sender_id"];}
 if (isset($_GET["test_mail_email_address"]))       {$test_mail_email_address=$_GET["test_mail_email_address"];}
  elseif (isset($_POST["test_mail_email_address"]))  {$test_mail_email_address=$_POST["test_mail_email_address"];}


if($action=='add_email_list'){
  $list_name=strtoupper($list_name);
	$sql = "SELECT * FROM `email_list` where list_name='$list_name'";
	$res = mysqli_query($conn, $sql);
 	$rowscount = mysqli_num_rows($res);
	if($rowscount==0){
		$row = mysqli_fetch_array($res);
		$table_name='email_list';
		$dataArray = array();
		$dataArray['email_campaign_id'] = $email_campaign_id;
		$dataArray['list_name'] = strtoupper($list_name);
		$dataArray['list_descreption'] = $list_descreption;
		$dataArray['active'] = $active;
		$dataArray['created_date'] = $now;
		$dataArray['username'] = $login_id;
		 
		insert_data($table_name,$dataArray,$conn);
		//Alok
		$last_id = mysqli_insert_id($conn);
		$dataArray = array();
		$table_name = 'vertage_survey';
		$dataArray['list_id'] = $last_id;
		$dataArray['list_name'] = $list_name;
		$dataArray['create_date'] = $now;
		insert_data($table_name,$dataArray,$conn);
		//Alok
		$response   = "200";
		$output = array("Response"=>$response,"message"=>"Email list Add successfully");
	}
	else{
		$data       = "Email list already Exist!";
		$response   = "400";
		$output = array("Response"=>$response,"message"=>$data);
	}

}


if($action=='email_list_delete'){

	$sql = "DELETE FROM `email_list` WHERE  list_id='$list_id'";
	$res = mysqli_query($conn, $sql);
 	 
	if($res){
		  
		$response   = "200";
		$output = array("Response"=>$response,"message"=>"Email list delete successfully");
	}else{
		$data       = "Error !";
		$response   = "400";
		$output = array("Response"=>$response,"message"=>$data);
	}
 


}


if($action=='modify_email_list'){
	$sql = "SELECT * FROM `email_list` where list_id='$list_id'";
	$res = mysqli_query($conn, $sql);
 	$rowscount = mysqli_num_rows($res);
	if($rowscount){

		$sql = "UPDATE email_list SET `list_descreption`='$list_descreption',`active`='$active' WHERE list_id='$list_id'";

			if(mysqli_query($conn, $sql)){
					$response   = "200";
					$output = array("Response"=>$response,"message"=>"Email list modify successfully");
				}
				else{
					$response   = "400";
					$output = array("Response"=>$response,"message"=>"Error!");
				}

		
	}
	else{
		$data       = "Something wrong!";
		$response   = "400";
		$output = array("Response"=>$response,"message"=>$data);
	}
 


}




if($action=='create_email_form'){
  $campaign_name=strtoupper($campaign_name);
	$sql = "SELECT * FROM `email_campaign` where campaign_name='$campaign_name'";
	$res = mysqli_query($conn, $sql);
 	$rowscount = mysqli_num_rows($res);
	if($rowscount==0){
		$row = mysqli_fetch_array($res);
		$table_name='email_campaign';
		$dataArray = array();
		$dataArray['campaign_name'] = strtoupper($campaign_name);
		$dataArray['created_date'] = $now;
		$dataArray['username'] = $login_id;
		 
		insert_data($table_name,$dataArray,$conn);
		
		$response   = "200";
		$output = array("Response"=>$response,"message"=>"Campaign Add successfully");
	}
	else{
		$data       = "Campaign name already Exist!";
		$response   = "400";
		$output = array("Response"=>$response,"message"=>$data);
	}
 


}




if($action=='add_email_template'){
  $templatename=strtoupper($templatename);
	$sql = "SELECT * FROM `email_template` where templatename='$templatename'";
	$res = mysqli_query($conn, $sql);
 	$rowscount = mysqli_num_rows($res);
	if($rowscount==0){

		$sql = "INSERT INTO email_template (`templatename`,`templatetext`,`created_date`,`username`) VALUES ('$templatename','$templatetext','$now','$login_id')";
				if(mysqli_query($conn, $sql)){
					$data       = "Template added successfully";
					$response   = "200";
					$output = array("Response"=>$response,"message"=>$data);
				}else{
					$data       = "Something Wrong!";
					$response   = "400";
					$output = array("Response"=>$response,"message"=>$data);
				}
	
	}
	else{
		$data       = "Template name already Exist!";
		$response   = "400";
		$output = array("Response"=>$response,"message"=>$data);
	}
 


}



if($action=='send_email_form'){
 
	/*$sql = "SELECT * FROM `email_information` where list_name='$list_name'";
	$res = mysqli_query($conn, $sql);
 	$rowscount = mysqli_num_rows($res);*/

 	$total_list_id = implode(',', $list_id);

 	if($schedule_radio_type==0){
 		$scheduledate = $now24hrs;
 	}

	if($campaign_id!='' &&  $total_list_id!='' &&  $template_id!='' &&  $schedule_radio_type!='' )
	{
		
		$sql = "INSERT INTO email_information (`email_sender_id`,`campaign_id`,`list_id`,`template_id`,`schedule`,`schedule_date`,`dscr`,`created_date`,`username`) VALUES ('$email_sender_id','$campaign_id','$total_list_id','$template_id','$schedule_radio_type','$scheduledate','$descr','$now','$login_id')";

			if(mysqli_query($conn, $sql)){
				$data       = "Email send request add successfully";
				$response   = "200";
				$output = array("Response"=>$response,"message"=>$data);
			}else{
				$data       = "Something Wrong!";
				$response   = "400";
				$output = array("Response"=>$response,"message"=>$data);
			}
 
	}
	else{
		$data       = "Kindly fill/select all mandatory fields.";
		$response   = "400";
		$output = array("Response"=>$response,"message"=>$data);
	}

}





if($action=='send_test_mail_form'){


	if($campaign_id!='' &&  $email_sender_id!='' &&  $template_id!='' && $test_mail_email_address!='' )
	{

		$sql = "INSERT INTO test_email_information (`email_address`,`email_sender_id`,`campaign_id`,`template_id`,`created_date`,`username`) VALUES ('$test_mail_email_address','$email_sender_id','$campaign_id','$template_id','$now','$login_id')";

			if(mysqli_query($conn, $sql)){
				$data       = "Test email send successfully";
				$response   = "200";
				$output = array("Response"=>$response,"message"=>$data);
			}else{
				$data       = "Something Wrong!";
				$response   = "400";
				$output = array("Response"=>$response,"message"=>$data);
			}
 
	}
	else{
		$data       = "Kindly fill/select all mandatory fields.";
		$response   = "400";
		$output = array("Response"=>$response,"message"=>$data);
	}

}



echo json_encode($output);
?>