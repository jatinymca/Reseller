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


  if (isset($_GET["firstname"]))       {$firstname=$_GET["firstname"];}
  elseif (isset($_POST["firstname"]))  {$firstname=$_POST["firstname"];} 
  if (isset($_GET["lastname"]))       {$lastname=$_GET["lastname"];}
  elseif (isset($_POST["lastname"]))  {$lastname=$_POST["lastname"];} 
  if (isset($_GET["mobile"]))       {$mobile=$_GET["mobile"];}
  elseif (isset($_POST["mobile"]))  {$mobile=$_POST["mobile"];} 
  if (isset($_GET["email"]))       {$email=$_GET["email"];}
  elseif (isset($_POST["email"]))  {$email=$_POST["email"];} 
  if (isset($_GET["overwritecontact"]))       {$overwritecontact=$_GET["overwritecontact"];}
  elseif (isset($_POST["overwritecontact"]))  {$overwritecontact=$_POST["overwritecontact"];} 
  if (isset($_GET["desc"]))       {$desc=$_GET["desc"];}
  elseif (isset($_POST["desc"]))  {$desc=$_POST["desc"];} 
  if (isset($_GET["contact_id"]))       {$contact_id=$_GET["contact_id"];}
  elseif (isset($_POST["contact_id"]))  {$contact_id=$_POST["contact_id"];}
    if (isset($_GET["list_id"]))       {$list_id=$_GET["list_id"];}
  elseif (isset($_POST["list_id"]))  {$list_id=$_POST["list_id"];}




if($action=='add_email_contact'){

	if(!empty($contact_id)){

			$sql = "SELECT * FROM `email_contact` where email='$email' and contact_id!='$contact_id'";
			$res = mysqli_query($conn, $sql);
		 	$rowscount = mysqli_num_rows($res);
			if($rowscount==0){

				$sql = "UPDATE email_contact SET `list_id`='$list_id',`firstname`='$firstname',`lastname`='$lastname',`email`='$email',`overwritecontact`='$overwritecontact',`desc`='$desc' WHERE contact_id='$contact_id' ";

					if(mysqli_query($conn, $sql))
					{
				
						$response   = "200";
						$output = array("Response"=>$response,"message"=>"Contact Modify successfully");
					}
					else{
						$data       = "Error !";
						$response   = "400";
						$output = array("Response"=>$response,"message"=>$data);
					}	

			}else{
				$data       = "Mobile Number already Exist!";
				$response   = "400";
				$output = array("Response"=>$response,"message"=>$data);
			}

	}
	else{

			$sql = "SELECT * FROM `email_contact` where mobile='$mobile'";
			$res = mysqli_query($conn, $sql);
		 	$rowscount = mysqli_num_rows($res);
			if($rowscount==0){

				$row = mysqli_fetch_array($res);

				$sql = "INSERT INTO email_contact (`list_id`,`firstname`,`lastname`,`email`,`overwritecontact`,`desc`,`created_date`,`username`) VALUES ('$list_id','$firstname','$lastname','$email','$overwritecontact','$desc','$now','$login_id')";

					if(mysqli_query($conn, $sql))
					{
				
						$response   = "200";
						$output = array("Response"=>$response,"message"=>"Contact Add successfully");
					}
					else{
						$data       = "Error !";
						$response   = "400";
						$output = array("Response"=>$response,"message"=>$data);
				}

			}else{
				$data       = "Mobile Number already Exist!";
				$response   = "400";
				$output = array("Response"=>$response,"message"=>$data);
			}
 
	}

}

if($action=='email_contact_delete'){

	$sql = "DELETE FROM `email_contact` WHERE contact_id='$contact_id'";
	$res = mysqli_query($conn, $sql);
 	 
	if($res){
		$response   = "200";
		$output = array("Response"=>$response,"message"=>"Contact Delete successfully");
	}else{
		$data       = "Error !";
		$response   = "400";
		$output = array("Response"=>$response,"message"=>$data);
	}
 


}


if($action=='modify_sms_phonebook_group'){
	$sql = "SELECT * FROM `vertage_survey` where group_id='$group_id'";
	$res = mysqli_query($conn, $sql);
 	$rowscount = mysqli_num_rows($res);
	if($rowscount){
		$table_name='vertage_survey';
		$dataArray = array();
		$dataArray['record_file_enable_one'] = $record_file_enable_one;
		$dataArray['play_time_start_one'] = (!empty($play_time_start_one))?date("Y-m-d h:i:s", strtotime($play_time_start_one)):"";
		$dataArray['play_time_end_one'] = (!empty($play_time_start_one))?date("Y-m-d h:i:s", strtotime($play_time_end_one)):"";
		$dataArray['play_file_name_one'] = $play_file_name_one;

		$dataArray['record_file_enable_two'] = $record_file_enable_two;
		$dataArray['play_time_start_two'] = (!empty($play_time_start_one))?date("Y-m-d h:i:s", strtotime($play_time_start_two)):"";
		$dataArray['play_time_end_two'] = (!empty($play_time_start_one))?date("Y-m-d h:i:s", strtotime($play_time_end_two)):"";
		$dataArray['play_file_name_two'] = $play_file_name_two;

		$dataArray['record_file_enable_three'] = $record_file_enable_three;
		$dataArray['play_time_start_three'] = (!empty($play_time_start_one))?date("Y-m-d h:i:s", strtotime($play_time_start_three)):"";
		$dataArray['play_time_end_three'] = (!empty($play_time_start_one))?date("Y-m-d h:i:s", strtotime($play_time_end_three)):"";
		$dataArray['play_file_name_three'] = $play_file_name_three;
		update_data($table_name,$dataArray,$conn,"group_id",$group_id);
		$dataArray = array();
		$table_name = 'vertage_sms_phonebook_groups';
		$dataArray['group_descreption'] = $group_descreption;
		$dataArray['active'] = $active;
		update_data($table_name,$_POST,$conn,"group_id",$group_id);
		$response   = "200";
		$output = array("Response"=>$response,"message"=>"Phonebook Group modify successfully");
	}else{
		$data       = "Something wrong!";
		$response   = "400";
		$output = array("Response"=>$response,"message"=>$data);
	}
 


}
echo json_encode($output);z
?>