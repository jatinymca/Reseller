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


  if (isset($_GET["templatename"]))       {$templatename=$_GET["templatename"];}
  elseif (isset($_POST["templatename"]))  {$templatename=$_POST["templatename"];} 
  if (isset($_GET["credittype"]))       {$credittype=$_GET["credittype"];}
  elseif (isset($_POST["credittype"]))  {$credittype=$_POST["credittype"];} 
  if (isset($_GET["senderid"]))       {$senderid=$_GET["senderid"];}
  elseif (isset($_POST["senderid"]))  {$senderid=$_POST["senderid"];}
  if (isset($_GET["language_radio"]))       {$language_radio=$_GET["language_radio"];}
  elseif (isset($_POST["language_radio"]))  {$language_radio=$_POST["language_radio"];} 
  if (isset($_GET["language"]))       {$language=$_GET["language"];}
  elseif (isset($_POST["language"]))  {$language=$_POST["language"];} 
  if (isset($_GET["dlttemplate"]))       {$dlttemplate=$_GET["dlttemplate"];}
  elseif (isset($_POST["dlttemplate"]))  {$dlttemplate=$_POST["dlttemplate"];}
  if (isset($_GET["templatesms"]))       {$templatesms=$_GET["templatesms"];}
  elseif (isset($_POST["templatesms"]))  {$templatesms=$_POST["templatesms"];} 
  if (isset($_GET["telemarketingid"]))       {$telemarketingid=$_GET["telemarketingid"];}
  elseif (isset($_POST["telemarketingid"]))  {$telemarketingid=$_POST["telemarketingid"];} 
  if (isset($_GET["entityid"]))       {$entityid=$_GET["entityid"];}
  elseif (isset($_POST["entityid"]))  {$entityid=$_POST["entityid"];} 
  if (isset($_GET["contact_id"]))       {$contact_id=$_GET["contact_id"];}
  elseif (isset($_POST["contact_id"]))  {$contact_id=$_POST["contact_id"];}

  if (isset($_GET["SMSTemplateAction_id"]))       {$SMSTemplateAction_id=$_GET["SMSTemplateAction_id"];}
  elseif (isset($_POST["SMSTemplateAction_id"]))  {$SMSTemplateAction_id=$_POST["SMSTemplateAction_id"];}
  if (isset($_GET["approvalremarks"]))       {$approvalremarks=$_GET["approvalremarks"];}
  elseif (isset($_POST["approvalremarks"]))  {$approvalremarks=$_POST["approvalremarks"];}




if($action=='add_sms_template'){

	
			$sql = "SELECT * FROM `sms_template` where templatename='$templatename'";
			$res = mysqli_query($conn, $sql);
		 	$rowscount = mysqli_num_rows($res);
			if($rowscount==0){

				$row = mysqli_fetch_array($res);

        if($language_radio=="0")
        {
          $language= "English";
        }

				$sql = "INSERT INTO sms_template (`templatename`,`credittype`,`senderid`, `dlttemplate`,`language`,`templatesms`,`telemarketingid`,`entityid`,`status`,`request_datetime`,`username`) VALUES ('$templatename','$credittype','$senderid','$dlttemplate','$language','$templatesms','$telemarketingid','$entityid','Process','$now','$login_id')";

					if(mysqli_query($conn, $sql))
					{
				
						$response   = "200";
						$output = array("Response"=>$response,"message"=>"Template request add successfully");
					}
					else{
						$data       = "Error !";
						$response   = "400";
						$output = array("Response"=>$response,"message"=>$data);
					}

			}else{
				$data       = "Template Name already Exist!";
				$response   = "400";
				$output = array("Response"=>$response,"message"=>$data);
			}
 

}




if($action=='SMSTemplateAction_form'){
  
      $sql = "SELECT * FROM `sms_template` where id='$SMSTemplateAction_id'";
      $res = mysqli_query($conn, $sql);
      $rowscount = mysqli_num_rows($res);
      if($rowscount>0){

        if($status=='Pending'){
          $sql = "UPDATE sms_template SET `status`='$status' WHERE id='$SMSTemplateAction_id'";
        }
        elseif ($status=='Approve') {
          $sql = "UPDATE sms_template SET `status`='$status',`approvalremarks`='$approvalremarks',`approve_datetime`='$now' WHERE id='$SMSTemplateAction_id'";
        }
        elseif ($status=='Reject') {
          $sql = "UPDATE sms_template SET `status`='$status',`approvalremarks`='$approvalremarks',`reject_datetime`='$now' WHERE id='$SMSTemplateAction_id'";
        }


          if(mysqli_query($conn, $sql))
          {
        
            $response   = "200";
            $output = array("Response"=>$response,"message"=>"SMS template status updated successfully");
          }
          else{
            $data       = "Error !";
            $response   = "400";
            $output = array("Response"=>$response,"message"=>$data);
          }

      }
      else{
        $data       = "Error!";
        $response   = "400";
        $output = array("Response"=>$response,"message"=>$data);
      }
 

}



echo json_encode($output);

?>