<?php

require('../configuration/c_config.php');
require('../configuration/function.php');
require('../php/dynamic_sql_command.php');

 
$username=$_SESSION['act_user']['login_id'];

if (isset($_GET["action"]))       {$action=$_GET["action"];}
elseif (isset($_POST["action"]))  {$action=$_POST["action"];}
if (isset($_GET["status"]))       {$status=$_GET["status"];}
elseif (isset($_POST["status"]))  {$status=$_POST["status"];}
if (isset($_GET["user_type"]))       {$user_type=$_GET["user_type"];}
elseif (isset($_POST["user_type"]))  {$user_type=$_POST["user_type"];}
if (isset($_GET["login_id"]))       {$login_id_1=$_GET["login_id"];}
elseif (isset($_POST["login_id"]))  {$login_id_1=$_POST["login_id"];}
if (isset($_GET["username"]))       {$username=$_GET["username"];}
elseif (isset($_POST["username"]))  {$username=$_POST["username"];}
if (isset($_GET["password"]))       {$password=$_GET["password"];}
elseif (isset($_POST["password"]))  {$password=$_POST["password"];}
if (isset($_GET["conf_pass"]))       {$conf_pass=$_GET["conf_pass"];}
elseif (isset($_POST["conf_pass"]))  {$conf_pass=$_POST["conf_pass"];}
if (isset($_GET["api_pass"]))       {$api_pass=$_GET["api_pass"];}
elseif (isset($_POST["api_pass"]))  {$api_pass=$_POST["api_pass"];}
if (isset($_GET["acc_mgr_name"]))       {$acc_mgr_name=$_GET["acc_mgr_name"];}
elseif (isset($_POST["acc_mgr_name"]))  {$acc_mgr_name=$_POST["acc_mgr_name"];}
if (isset($_GET["bill_plan_type"]))       {$bill_plan_type=$_GET["bill_plan_type"];}
elseif (isset($_POST["bill_plan_type"]))  {$bill_plan_type=$_POST["bill_plan_type"];}
if (isset($_GET["first_name"]))       {$first_name=$_GET["first_name"];}
elseif (isset($_POST["first_name"]))  {$first_name=$_POST["first_name"];}
if (isset($_GET["last_name"]))       {$last_name=$_GET["last_name"];}
elseif (isset($_POST["last_name"]))  {$last_name=$_POST["last_name"];}
if (isset($_GET["mobile_no"]))       {$mobile_no=$_GET["mobile_no"];}
elseif (isset($_POST["mobile_no"]))  {$mobile_no=$_POST["mobile_no"];}
if (isset($_GET["email"]))       {$email=$_GET["email"];}
elseif (isset($_POST["email"]))  {$email=$_POST["email"];}
if (isset($_GET["company_name"]))       {$company_name=$_GET["company_name"];}
elseif (isset($_POST["company_name"]))  {$company_name=$_POST["company_name"];}
if (isset($_GET["enable_api"]))       {$enable_api=$_GET["enable_api"];}
elseif (isset($_POST["enable_api"]))  {$enable_api=$_POST["enable_api"];}
if (isset($_GET["acc_mgr_email"]))       {$acc_mgr_email=$_GET["acc_mgr_email"];}
elseif (isset($_POST["acc_mgr_email"]))  {$acc_mgr_email=$_POST["acc_mgr_email"];}
if (isset($_GET["lockunlock"]))       {$lockunlock=$_GET["lockunlock"];}
elseif (isset($_POST["lockunlock"]))  {$lockunlock=$_POST["lockunlock"];}
if (isset($_GET["valid_from"]))       {$valid_from=$_GET["valid_from"];}
elseif (isset($_POST["valid_from"]))  {$valid_from=$_POST["valid_from"];}
if (isset($_GET["valid_till"]))       {$valid_till=$_GET["valid_till"];}
elseif (isset($_POST["valid_till"]))  {$valid_till=$_POST["valid_till"];}
if (isset($_GET["address"]))       {$address=$_GET["address"];}
elseif (isset($_POST["address"]))  {$address=$_POST["address"];}
if (isset($_GET["description"]))       {$description=$_GET["description"];}
elseif (isset($_POST["description"]))  {$description=$_POST["description"];}
if (isset($_GET["acc_mgr_phone"]))       {$acc_mgr_phone=$_GET["acc_mgr_phone"];}
elseif (isset($_POST["acc_mgr_phone"]))  {$acc_mgr_phone=$_POST["acc_mgr_phone"];}
if (isset($_GET["telemarketing_id"]))       {$telemarketing_id=$_GET["telemarketing_id"];}
elseif (isset($_POST["telemarketing_id"]))  {$telemarketing_id=$_POST["telemarketing_id"];}
if (isset($_GET["entity_id"]))       {$entity_id=$_GET["entity_id"];}
elseif (isset($_POST["entity_id"]))  {$entity_id=$_POST["entity_id"];}
if (isset($_GET["edit_image_name"]))       {$edit_image_name=$_GET["edit_image_name"];}
elseif (isset($_POST["edit_image_name"]))  {$edit_image_name=$_POST["edit_image_name"];}
if (isset($_GET["edit_id"]))       {$edit_id=$_GET["edit_id"];}
elseif (isset($_POST["edit_id"]))  {$edit_id=$_POST["edit_id"];}
if (isset($_GET["delete_id"]))       {$delete_id=$_GET["delete_id"];}
elseif (isset($_POST["delete_id"]))  {$delete_id=$_POST["delete_id"];}


if (isset($_GET["user_edit_id"]))       {$user_edit_id=$_GET["user_edit_id"];}
elseif (isset($_POST["user_edit_id"]))  {$user_edit_id=$_POST["user_edit_id"];}
if (isset($_GET["ivr_custom"]))       {$ivr_custom=$_GET["ivr_custom"];}
elseif (isset($_POST["ivr_custom"]))  {$ivr_custom=$_POST["ivr_custom"];}
if (isset($_GET["ivr_promo"]))       {$ivr_promo=$_GET["ivr_promo"];}
elseif (isset($_POST["ivr_promo"]))  {$ivr_promo=$_POST["ivr_promo"];}
if (isset($_GET["ivr_promo_pulse"]))       {$ivr_promo_pulse=$_GET["ivr_promo_pulse"];}
elseif (isset($_POST["ivr_promo_pulse"]))  {$ivr_promo_pulse=$_POST["ivr_promo_pulse"];}
if (isset($_GET["ivr_promo_rupees"]))       {$ivr_promo_rupees=$_GET["ivr_promo_rupees"];}
elseif (isset($_POST["ivr_promo_rupees"]))  {$ivr_promo_rupees=$_POST["ivr_promo_rupees"];}
if (isset($_GET["ivr_promo_delivery"]))       {$ivr_promo_delivery=$_GET["ivr_promo_delivery"];}
elseif (isset($_POST["ivr_promo_delivery"]))  {$ivr_promo_delivery=$_POST["ivr_promo_delivery"];}
if (isset($_GET["ivr_promo_allocate_unit"]))       {$ivr_promo_allocate_unit=$_GET["ivr_promo_allocate_unit"];}
elseif (isset($_POST["ivr_promo_allocate_unit"]))  {$ivr_promo_allocate_unit=$_POST["ivr_promo_allocate_unit"];}
if (isset($_GET["ivr_trans"]))       {$ivr_trans=$_GET["ivr_trans"];}
elseif (isset($_POST["ivr_trans"]))  {$ivr_trans=$_POST["ivr_trans"];}
if (isset($_GET["ivr_trans_pulse"]))       {$ivr_trans_pulse=$_GET["ivr_trans_pulse"];}
elseif (isset($_POST["ivr_trans_pulse"]))  {$ivr_trans_pulse=$_POST["ivr_trans_pulse"];}
if (isset($_GET["ivr_trans_rupees"]))       {$ivr_trans_rupees=$_GET["ivr_trans_rupees"];}
elseif (isset($_POST["ivr_trans_rupees"]))  {$ivr_trans_rupees=$_POST["ivr_trans_rupees"];}
if (isset($_GET["ivr_trans_delivery"]))       {$ivr_trans_delivery=$_GET["ivr_trans_delivery"];}
elseif (isset($_POST["ivr_trans_delivery"]))  {$ivr_trans_delivery=$_POST["ivr_trans_delivery"];}
if (isset($_GET["ivr_trans_allocate_unit"]))       {$ivr_trans_allocate_unit=$_GET["ivr_trans_allocate_unit"];}
elseif (isset($_POST["ivr_trans_allocate_unit"]))  {$ivr_trans_allocate_unit=$_POST["ivr_trans_allocate_unit"];}
if (isset($_GET["ivr_valid_from"]))       {$ivr_valid_from=$_GET["ivr_valid_from"];}
elseif (isset($_POST["ivr_valid_from"]))  {$ivr_valid_from=$_POST["ivr_valid_from"];}
if (isset($_GET["ivr_valid_till"]))       {$ivr_valid_till=$_GET["ivr_valid_till"];}
elseif (isset($_POST["ivr_valid_till"]))  {$ivr_valid_till=$_POST["ivr_valid_till"];}

if (isset($_GET["obd_custom"]))       {$obd_custom=$_GET["obd_custom"];}
elseif (isset($_POST["obd_custom"]))  {$obd_custom=$_POST["obd_custom"];}
if (isset($_GET["obd_promo"]))       {$obd_promo=$_GET["obd_promo"];}
elseif (isset($_POST["obd_promo"]))  {$obd_promo=$_POST["obd_promo"];}
if (isset($_GET["obd_promo_pulse"]))       {$obd_promo_pulse=$_GET["obd_promo_pulse"];}
elseif (isset($_POST["obd_promo_pulse"]))  {$obd_promo_pulse=$_POST["obd_promo_pulse"];}
if (isset($_GET["obd_promo_rupees"]))       {$obd_promo_rupees=$_GET["obd_promo_rupees"];}
elseif (isset($_POST["obd_promo_rupees"]))  {$obd_promo_rupees=$_POST["obd_promo_rupees"];}
if (isset($_GET["obd_promo_delivery"]))       {$obd_promo_delivery=$_GET["obd_promo_delivery"];}
elseif (isset($_POST["obd_promo_delivery"]))  {$obd_promo_delivery=$_POST["obd_promo_delivery"];}
if (isset($_GET["obd_promo_allocate_unit"]))       {$obd_promo_allocate_unit=$_GET["obd_promo_allocate_unit"];}
elseif (isset($_POST["obd_promo_allocate_unit"]))  {$obd_promo_allocate_unit=$_POST["obd_promo_allocate_unit"];}
if (isset($_GET["obd_trans"]))       {$obd_trans=$_GET["obd_trans"];}
elseif (isset($_POST["obd_trans"]))  {$obd_trans=$_POST["obd_trans"];}
if (isset($_GET["obd_trans_pulse"]))       {$obd_trans_pulse=$_GET["obd_trans_pulse"];}
elseif (isset($_POST["obd_trans_pulse"]))  {$obd_trans_pulse=$_POST["obd_trans_pulse"];}
if (isset($_GET["obd_trans_rupees"]))       {$obd_trans_rupees=$_GET["obd_trans_rupees"];}
elseif (isset($_POST["obd_trans_rupees"]))  {$obd_trans_rupees=$_POST["obd_trans_rupees"];}
if (isset($_GET["obd_trans_delivery"]))       {$obd_trans_delivery=$_GET["obd_trans_delivery"];}
elseif (isset($_POST["obd_trans_delivery"]))  {$obd_trans_delivery=$_POST["obd_trans_delivery"];}
if (isset($_GET["obd_trans_allocate_unit"]))       {$obd_trans_allocate_unit=$_GET["obd_trans_allocate_unit"];}
elseif (isset($_POST["obd_trans_allocate_unit"]))  {$obd_trans_allocate_unit=$_POST["obd_trans_allocate_unit"];}
if (isset($_GET["obd_valid_from"]))       {$obd_valid_from=$_GET["obd_valid_from"];}
elseif (isset($_POST["obd_valid_from"]))  {$obd_valid_from=$_POST["obd_valid_from"];}
if (isset($_GET["obd_valid_till"]))       {$obd_valid_till=$_GET["obd_valid_till"];}
elseif (isset($_POST["obd_valid_till"]))  {$obd_valid_till=$_POST["obd_valid_till"];}

if (isset($_GET["call_custom"]))       {$call_custom=$_GET["call_custom"];}
elseif (isset($_POST["call_custom"]))  {$call_custom=$_POST["call_custom"];}
if (isset($_GET["call_promo"]))       {$call_promo=$_GET["call_promo"];}
elseif (isset($_POST["call_promo"]))  {$call_promo=$_POST["call_promo"];}
if (isset($_GET["call_promo_pulse"]))       {$call_promo_pulse=$_GET["call_promo_pulse"];}
elseif (isset($_POST["call_promo_pulse"]))  {$call_promo_pulse=$_POST["call_promo_pulse"];}
if (isset($_GET["call_promo_rupees"]))       {$call_promo_rupees=$_GET["call_promo_rupees"];}
elseif (isset($_POST["call_promo_rupees"]))  {$call_promo_rupees=$_POST["call_promo_rupees"];}
if (isset($_GET["call_promo_delivery"]))       {$call_promo_delivery=$_GET["call_promo_delivery"];}
elseif (isset($_POST["call_promo_delivery"]))  {$call_promo_delivery=$_POST["call_promo_delivery"];}
if (isset($_GET["call_promo_allocate_unit"]))       {$call_promo_allocate_unit=$_GET["call_promo_allocate_unit"];}
elseif (isset($_POST["call_promo_allocate_unit"]))  {$call_promo_allocate_unit=$_POST["call_promo_allocate_unit"];}
if (isset($_GET["call_trans"]))       {$call_trans=$_GET["call_trans"];}
elseif (isset($_POST["call_trans"]))  {$call_trans=$_POST["call_trans"];}
if (isset($_GET["call_trans_pulse"]))       {$call_trans_pulse=$_GET["call_trans_pulse"];}
elseif (isset($_POST["call_trans_pulse"]))  {$call_trans_pulse=$_POST["call_trans_pulse"];}
if (isset($_GET["call_trans_rupees"]))       {$call_trans_rupees=$_GET["call_trans_rupees"];}
elseif (isset($_POST["call_trans_rupees"]))  {$call_trans_rupees=$_POST["call_trans_rupees"];}
if (isset($_GET["call_trans_delivery"]))       {$call_trans_delivery=$_GET["call_trans_delivery"];}
elseif (isset($_POST["call_trans_delivery"]))  {$call_trans_delivery=$_POST["call_trans_delivery"];}
if (isset($_GET["call_trans_allocate_unit"]))       {$call_trans_allocate_unit=$_GET["call_trans_allocate_unit"];}
elseif (isset($_POST["call_trans_allocate_unit"]))  {$call_trans_allocate_unit=$_POST["call_trans_allocate_unit"];}
if (isset($_GET["call_valid_from"]))       {$call_valid_from=$_GET["call_valid_from"];}
elseif (isset($_POST["call_valid_from"]))  {$call_valid_from=$_POST["call_valid_from"];}
if (isset($_GET["call_valid_till"]))       {$call_valid_till=$_GET["call_valid_till"];}
elseif (isset($_POST["call_valid_till"]))  {$call_valid_till=$_POST["call_valid_till"];}

if (isset($_GET["email_custom"]))       {$email_custom=$_GET["email_custom"];}
elseif (isset($_POST["email_custom"]))  {$email_custom=$_POST["email_custom"];}
if (isset($_GET["email_promo"]))       {$email_promo=$_GET["email_promo"];}
elseif (isset($_POST["email_promo"]))  {$email_promo=$_POST["email_promo"];}
if (isset($_GET["email_promo_pulse"]))       {$email_promo_pulse=$_GET["email_promo_pulse"];}
elseif (isset($_POST["email_promo_pulse"]))  {$email_promo_pulse=$_POST["email_promo_pulse"];}
if (isset($_GET["email_promo_rupees"]))       {$email_promo_rupees=$_GET["email_promo_rupees"];}
elseif (isset($_POST["email_promo_rupees"]))  {$email_promo_rupees=$_POST["email_promo_rupees"];}
if (isset($_GET["email_promo_delivery"]))       {$email_promo_delivery=$_GET["email_promo_delivery"];}
elseif (isset($_POST["email_promo_delivery"]))  {$email_promo_delivery=$_POST["email_promo_delivery"];}
if (isset($_GET["email_promo_allocate_unit"]))       {$email_promo_allocate_unit=$_GET["email_promo_allocate_unit"];}
elseif (isset($_POST["email_promo_allocate_unit"]))  {$email_promo_allocate_unit=$_POST["email_promo_allocate_unit"];}
if (isset($_GET["email_trans"]))       {$email_trans=$_GET["email_trans"];}
elseif (isset($_POST["email_trans"]))  {$email_trans=$_POST["email_trans"];}
if (isset($_GET["email_trans_pulse"]))       {$email_trans_pulse=$_GET["email_trans_pulse"];}
elseif (isset($_POST["email_trans_pulse"]))  {$email_trans_pulse=$_POST["email_trans_pulse"];}
if (isset($_GET["email_trans_rupees"]))       {$email_trans_rupees=$_GET["email_trans_rupees"];}
elseif (isset($_POST["email_trans_rupees"]))  {$email_trans_rupees=$_POST["email_trans_rupees"];}
if (isset($_GET["email_trans_delivery"]))       {$email_trans_delivery=$_GET["email_trans_delivery"];}
elseif (isset($_POST["email_trans_delivery"]))  {$email_trans_delivery=$_POST["email_trans_delivery"];}
if (isset($_GET["email_trans_allocate_unit"]))       {$email_trans_allocate_unit=$_GET["email_trans_allocate_unit"];}
elseif (isset($_POST["email_trans_allocate_unit"]))  {$email_trans_allocate_unit=$_POST["email_trans_allocate_unit"];}
if (isset($_GET["email_valid_from"]))       {$email_valid_from=$_GET["email_valid_from"];}
elseif (isset($_POST["email_valid_from"]))  {$email_valid_from=$_POST["email_valid_from"];}
if (isset($_GET["email_valid_till"]))       {$email_valid_till=$_GET["email_valid_till"];}
elseif (isset($_POST["email_valid_till"]))  {$email_valid_till=$_POST["email_valid_till"];}

if (isset($_GET["sms_custom"]))       {$sms_custom=$_GET["sms_custom"];}
elseif (isset($_POST["sms_custom"]))  {$sms_custom=$_POST["sms_custom"];}
if (isset($_GET["sms_promo"]))       {$sms_promo=$_GET["sms_promo"];}
elseif (isset($_POST["sms_promo"]))  {$sms_promo=$_POST["sms_promo"];}
if (isset($_GET["sms_promo_pulse"]))       {$sms_promo_pulse=$_GET["sms_promo_pulse"];}
elseif (isset($_POST["sms_promo_pulse"]))  {$sms_promo_pulse=$_POST["sms_promo_pulse"];}
if (isset($_GET["sms_promo_rupees"]))       {$sms_promo_rupees=$_GET["sms_promo_rupees"];}
elseif (isset($_POST["sms_promo_rupees"]))  {$sms_promo_rupees=$_POST["sms_promo_rupees"];}
if (isset($_GET["sms_promo_delivery"]))       {$sms_promo_delivery=$_GET["sms_promo_delivery"];}
elseif (isset($_POST["sms_promo_delivery"]))  {$sms_promo_delivery=$_POST["sms_promo_delivery"];}
if (isset($_GET["sms_promo_allocate_unit"]))       {$sms_promo_allocate_unit=$_GET["sms_promo_allocate_unit"];}
elseif (isset($_POST["sms_promo_allocate_unit"]))  {$sms_promo_allocate_unit=$_POST["sms_promo_allocate_unit"];}
if (isset($_GET["sms_trans"]))       {$sms_trans=$_GET["sms_trans"];}
elseif (isset($_POST["sms_trans"]))  {$sms_trans=$_POST["sms_trans"];}
if (isset($_GET["sms_trans_pulse"]))       {$sms_trans_pulse=$_GET["sms_trans_pulse"];}
elseif (isset($_POST["sms_trans_pulse"]))  {$sms_trans_pulse=$_POST["sms_trans_pulse"];}
if (isset($_GET["sms_trans_rupees"]))       {$sms_trans_rupees=$_GET["sms_trans_rupees"];}
elseif (isset($_POST["sms_trans_rupees"]))  {$sms_trans_rupees=$_POST["sms_trans_rupees"];}
if (isset($_GET["sms_trans_delivery"]))       {$sms_trans_delivery=$_GET["sms_trans_delivery"];}
elseif (isset($_POST["sms_trans_delivery"]))  {$sms_trans_delivery=$_POST["sms_trans_delivery"];}
if (isset($_GET["sms_trans_allocate_unit"]))       {$sms_trans_allocate_unit=$_GET["sms_trans_allocate_unit"];}
elseif (isset($_POST["sms_trans_allocate_unit"]))  {$sms_trans_allocate_unit=$_POST["sms_trans_allocate_unit"];}
if (isset($_GET["sms_valid_from"]))       {$sms_valid_from=$_GET["sms_valid_from"];}
elseif (isset($_POST["sms_valid_from"]))  {$sms_valid_from=$_POST["sms_valid_from"];}
if (isset($_GET["sms_valid_till"]))       {$sms_valid_till=$_GET["sms_valid_till"];}
elseif (isset($_POST["sms_valid_till"]))  {$sms_valid_till=$_POST["sms_valid_till"];}

if (isset($_GET["bill_plan_type"]))       {$bill_plan_type=$_GET["bill_plan_type"];}
elseif (isset($_POST["bill_plan_type"]))  {$bill_plan_type=$_POST["bill_plan_type"];}
if (isset($_GET["sms_bill_plan_type"]))       {$sms_bill_plan_type=$_GET["sms_bill_plan_type"];}
elseif (isset($_POST["sms_bill_plan_type"]))  {$sms_bill_plan_type=$_POST["sms_bill_plan_type"];}
if (isset($_GET["email_bill_plan_type"]))       {$email_bill_plan_type=$_GET["email_bill_plan_type"];}
elseif (isset($_POST["email_bill_plan_type"]))  {$email_bill_plan_type=$_POST["email_bill_plan_type"];}
 

 if (isset($_GET["report_type"]))       {$report_type=$_GET["report_type"];}
elseif (isset($_POST["report_type"]))  {$report_type=$_POST["report_type"];}
if (isset($_GET["Campaign_type"]))       {$Campaign_type=$_GET["Campaign_type"];}
elseif (isset($_POST["Campaign_type"]))  {$Campaign_type=$_POST["Campaign_type"];}
if (isset($_GET["s_date"]))       {$s_date=$_GET["s_date"];}
elseif (isset($_POST["s_date"]))  {$s_date=$_POST["s_date"];}
if (isset($_GET["e_date"]))       {$e_date=$_GET["e_date"];}
elseif (isset($_POST["e_date"]))  {$e_date=$_POST["e_date"];} 

if (isset($_GET["plan_id"]))       {$plan_id=$_GET["plan_id"];}
elseif (isset($_POST["plan_id"]))  {$plan_id=$_POST["plan_id"];}

if (isset($_GET["caller_id"]))       {$caller_id=$_GET["caller_id"];}
elseif (isset($_POST["caller_id"]))  {$caller_id=$_POST["caller_id"];}

$api_key = substr(md5(mt_rand()), 0, 25);

if($action=='add_user'){
	if(!empty($login_id_1) and !empty($username) and !empty($mobile_no) and !empty($email) and !empty($user_type) and !empty($first_name)){
		if(!empty($valid_from)){
			$valid_from = date("Y-m-d", strtotime($valid_from));
		}
		if(!empty($valid_till)){
			$valid_till = date("Y-m-d", strtotime($valid_till));
		}
		$uploadStatus = 1; 
		$uploadedFile = '';
		if(!empty($_FILES["upload_img"]["name"])){
			$uploadDir = '../upload/'; 
			$fileName = time()."_".basename($_FILES["upload_img"]["name"]);
			$targetFilePath = $uploadDir.$fileName;
			$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
			$allowTypes = array('jpg', 'png', 'jpeg','jfif'); 
			if(in_array($fileType, $allowTypes)){ 

 				if(move_uploaded_file($_FILES["upload_img"]["tmp_name"], $targetFilePath)){ 
					
	                $uploadedFile = $fileName;
					
					if($edit_image_name){
						unlink($uploadDir.$edit_image_name);
					}
	            }
	            else{ 
	                $uploadStatus = 0;
		 			$data         = "Sorry, there was an error uploading your file";
					$response     = "400";
	            } 
			}
			else{ 
	            $uploadStatus = 0; 
	            $data         = "Sorry, only JPG, JPEG,jfif, & PNG files are allowed to upload";
		 		$response     = "400";
	        } 
		}
		else{
			$uploadedFile = $edit_image_name;
		}

		if($uploadStatus == 1){ 
			if(empty($edit_id)){
				$sql = mysqli_query($conn, "SELECT * FROM `users` where login_id='$login_id_1'");
				$rowcount = mysqli_num_rows($sql);
			}else{
				$rowcount = 0;
			}
			if($rowcount==0){
				if(empty($edit_id)){
					$sql = mysqli_query($conn, "SELECT * FROM `users` where username='$username'");
					$rowcount = mysqli_num_rows($sql);
				}else{
					$rowcount = 0;
				}
				if($rowcount==0){
					if(!empty($edit_id)){
						$sql = "UPDATE users SET `first_name`='$first_name',`last_name`='$last_name',`mobile_no`='$mobile_no',`email`='$email',`company_name`='$company_name',`status`='$status',`api_pass`='$api_pass',`acc_mgr_name`='$acc_mgr_name',`bill_plan_type`='$bill_plan_type',`first_name`='$first_name',`last_name`='$last_name',`mobile_no`='$mobile_no',`email`='$email',`company_name`='$company_name',`enable_api`='$enable_api',`acc_mgr_email`='$acc_mgr_email',`status`='$status',`valid_from`='$valid_from',`valid_till`='$valid_till',`address`='$address',`description`='$description',`acc_mgr_phone`='$acc_mgr_phone',`telemarketing_id`='$telemarketing_id',`entity_id`='$entity_id',`upload_img`='$uploadedFile',`lockunlock`='$lockunlock',`modify_date`='$now' WHERE unique_login_id='$edit_id'";
						if(mysqli_query($conn, $sql)){
							$data       = "User updated successfully";
							$response   = "200";
						}else{
							$data       = "Something Wrong!";
							$response   = "400";
						}
					}
					else{
						
						if(!empty($password) and !empty($conf_pass)){
							if($password==$conf_pass){
								$unique_login_id=uniqid();
								$sql = "INSERT INTO users (`unique_login_id`,`login_id`,`username`,`password`,`api_key`,`user_type`,`api_pass`,`acc_mgr_name`,`bill_plan_type`,`first_name`,`last_name`,`mobile_no`,`email`,`company_name`,`enable_api`,`acc_mgr_email`,`status`,`valid_from`,`valid_till`,`address`,`description`,`acc_mgr_phone`,`telemarketing_id`,`entity_id`,`upload_img`,`lockunlock`,`create_date`,`user_id`) VALUES ('$unique_login_id','$login_id_1','$username','$password','$api_key','$user_type','$api_pass','$acc_mgr_name','$bill_plan_type','$first_name','$last_name','$mobile_no','$email','$company_name','$enable_api','$acc_mgr_email','$status','$valid_from','$valid_till','$address','$description','$acc_mgr_phone','$telemarketing_id','$entity_id','$uploadedFile','$lockunlock','$now','$login_id')";
								if(mysqli_query($conn, $sql)){
									$data       = "User added successfully";
									$response   = "200";
								}else{
									$data       = "Something Wrong!";
									$response   = "400";
								}
							}else{
								$data       = "Password and confirm password does not match!";
								$response   = "400";
							}
						}else{
							$data       = "Password and confirm password does not match!";
							$response   = "400";
						}
					}
				}else{
					$data       = "Username already exists!";
					$response   = "400";
				}
			}else{
				$data       = "Login id already exists!";
				$response   = "400";
			}
		}
	}else{
		$data       = "Please fill mandatory fields!";
		$response   = "400";
	}
	$output	= array("Response"=>$response,"message"=>$data);
}

if($action=="delete_user"){
	if(!empty($delete_id)){
		$sql = "DELETE FROM users WHERE id='$delete_id'";
		if(mysqli_query($conn, $sql)){
			$data       = "User deleted successfully";
			$response   = "200";
		}else{
			$data       = "Something Wrong!";
			$response   = "400";
		}
	}else{
		$data       = "Something Wrong!";
		$response   = "400";
	}
	$output	= array("Response"=>$response,"message"=>$data);
}

if($action=="delete_billplan"){
	if(!empty($delete_id)){
		  $sql = "DELETE FROM vertage_voice_plan_list WHERE id='$delete_id'"; 
		if(mysqli_query($conn, $sql)){
			$data       = "User deleted successfully";
			$response   = "200";
		}else{
			$data       = "Something Wrong!";
			$response   = "400";
		}
	}else{
		$data       = "Something Wrong!";
		$response   = "400";
	}
	$output	= array("Response"=>$response,"message"=>$data);
} 

if($action=="delete_credits"){
	if(!empty($delete_id)){
		echo  $sql = "DELETE FROM vertage_voice_credit WHERE id='$delete_id'";  
		if(mysqli_query($conn, $sql)){
			$data       = "Credit deleted successfully";
			$response   = "200";
		}else{
			$data       = "Something Wrong!";
			$response   = "400";
		}
	}else{
		$data       = "Something Wrong!";
		$response   = "400";
	}
	$output	= array("Response"=>$response,"message"=>$data);
}
#jatin
if($action=="obd_report"){ 
	      $invoice_id=rand(000000,999999);
	      $s_date=date('Y-m-d',strtotime($s_date));
	      $e_date=date('Y-m-d',strtotime($e_date));
	          $sql="INSERT INTO `obd_report_generate`(`invoice_id`,`report_type`, `Campaign_id`, `Start_Date`, `End_Date`,`username`) VALUES ('$invoice_id','$report_type','$Campaign_type','$s_date','$e_date','$username')";  
			  $sqld = mysqli_query($conn,$sql);
			if($sqld){
				$data       = " Inserted successfully";
				$response   = "200";
			}else{
				$data       = "Something Wrong!";
				$response   = "400";
		    }
		    $output	= array("Response"=>$response,"message"=>$data);
		}

if($action=='updateOnBoarding_form'){

						$SQl="SELECT username FROM users WHERE unique_login_id='$user_edit_id'";
                    	$res=mysqli_query($conn, $SQl);
                    	$row=mysqli_fetch_assoc($res);
                    	$username=$row['username'];
                         $userupdate = "UPDATE `users` SET  `caller_id`='' WHERE username='$username'";
                    	  mysqli_query($conn, $userupdate);
                    	  
                    	 $userupdate = "UPDATE `inbound_dids` SET  `username`='' WHERE username='$username'";
                    	  mysqli_query($conn, $userupdate); 


                    foreach ($caller_id as $key => $value) { 
                    	
                            $userupdate = "UPDATE `inbound_dids` SET  `username`='$username' WHERE extension='$value'";
                    	    mysqli_query($conn, $userupdate);
                    	 
                    }
  		$caller_id=implode('|',$caller_id);
        $userupdate = "UPDATE users SET `ivr_enable`='$ivr_custom',`obd_enable`='$obd_custom',`sms_enable`='$sms_custom',`call_enable`='$call_custom',`email_enable`='$email_custom',`bill_plan_type`='$bill_plan_type',`sms_bill_plan_type`='$sms_bill_plan_type',`plan_id`='$plan_id',`modify_date`='$now',`caller_id`='$caller_id' WHERE unique_login_id='$user_edit_id'";





			if(mysqli_query($conn, $userupdate)){
					$userupdated       = "1";
				}
	 
		if($userupdated){
			$data   = "User updated successfully";
			$response   = "200";

		}
		else{
			$data       = "Something Wrong!";
			$response   = "400";
		}

	
	$output	= array("Response"=>$response,"message"=>$data);
} 



echo json_encode($output);

?>





