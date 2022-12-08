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

    if (isset($_GET["upload_radio"]))       {$upload_radio=$_GET["upload_radio"];}
  elseif (isset($_POST["upload_radio"]))  {$upload_radio=$_POST["upload_radio"];}
    if (isset($_GET["numbers"]))       {$numbers=$_GET["numbers"];}
  elseif (isset($_POST["numbers"]))  {$numbers=$_POST["numbers"];}
    if (isset($_GET["language_radio"]))       {$language_radio=$_GET["language_radio"];}
  elseif (isset($_POST["language_radio"]))  {$language_radio=$_POST["language_radio"];}
   if (isset($_GET["language"]))       {$language=$_GET["language"];}
  elseif (isset($_POST["language"]))  {$language=$_POST["language"];}
    if (isset($_GET["campaign_type_radio"]))       {$campaign_type_radio=$_GET["campaign_type_radio"];}
  elseif (isset($_POST["campaign_type_radio"]))  {$campaign_type_radio=$_POST["campaign_type_radio"];}
    if (isset($_GET["campaign_name"]))       {$campaign_name=$_GET["campaign_name"];}
  elseif (isset($_POST["campaign_name"]))  {$campaign_name=$_POST["campaign_name"];}
    if (isset($_GET["senderid"]))       {$senderid=$_GET["senderid"];}
  elseif (isset($_POST["senderid"]))  {$senderid=$_POST["senderid"];}
    if (isset($_GET["sms_template"]))       {$sms_template=$_GET["sms_template"];}
  elseif (isset($_POST["sms_template"]))  {$sms_template=$_POST["sms_template"];}
    if (isset($_GET["sms_text_content"]))       {$sms_text_content=$_GET["sms_text_content"];}
  elseif (isset($_POST["sms_text_content"]))  {$sms_text_content=$_POST["sms_text_content"];}
    if (isset($_GET["remove_duplicate"]))       {$remove_duplicate=$_GET["remove_duplicate"];}
  elseif (isset($_POST["remove_duplicate"]))  {$remove_duplicate=$_POST["remove_duplicate"];}
    if (isset($_GET["schedule_radio_type"]))       {$schedule_radio_type=$_GET["schedule_radio_type"];}
  elseif (isset($_POST["schedule_radio_type"]))  {$schedule_radio_type=$_POST["schedule_radio_type"];}
    if (isset($_GET["scheduledate"]))       {$scheduledate=$_GET["scheduledate"];}
  elseif (isset($_POST["scheduledate"]))  {$scheduledate=$_POST["scheduledate"];}  
  if (isset($_GET["descr"]))       {$descr=$_GET["descr"];}
  elseif (isset($_POST["descr"]))  {$descr=$_POST["descr"];}  
 if (isset($_GET["contact_number_list"]))       {$contact_number_list=$_GET["contact_number_list"];}
  elseif (isset($_POST["contact_number_list"]))  {$contact_number_list=$_POST["contact_number_list"];}  


if($action=='Create_SMS_Campaign'){

    if($upload_radio=="3")
      {
        $numbers='1';
      }


      $sqlref="SELECT ref_no FROM `vertage_sms_campaign` ORDER BY `ref_no` DESC LIMIT 1";
      $resref = mysqli_query($conn, $sqlref);
      $rowref = mysqli_fetch_array($resref);

      if($rowref['ref_no']!=''){
              $ref_number = $rowref['ref_no']+1;
      }else{
          $ref_number = '10000000000'; 
      }



    if($numbers!='' && $campaign_name!='' && $senderid!='' && $sms_template!='' && $sms_text_content!='' )  {
    	  
        if($language_radio=="0")
          {
            $language= "English";
          }

          if($schedule_radio_type=="0")
          {
            $scheduledate= $now;
          }


          if($upload_radio=="3")
          {
            $list_id = $contact_number_list;

            $q="SELECT mobile FROM `sms_contact` where group_id='$list_id' AND username='$login_id'";
            $res2 = mysqli_query($conn, $q);

            while($row=mysqli_fetch_array($res2)){

                  $numbers = $row['mobile'];

                  $sql ="INSERT INTO vertage_sms_campaign (`numbers`,`upload_radio`,`language`,`campaign_type_radio`,`campaign_name`,`senderid`,`sms_template`,`sms_text_content`,`remove_duplicate`,`schedule_radio_type`,`scheduledate`,`descr`,`created_date`,`status`,`ref_no`,`username`,`sms_status_code`) SELECT mobile, '$upload_radio' ,'$language','$campaign_type_radio','$campaign_name','$senderid','$sms_template','$sms_text_content','$remove_duplicate','$schedule_radio_type','$scheduledate','$descr','$now','Y','$ref_number','$login_id','102' FROM sms_contact WHERE group_id='$list_id' AND username='$login_id'";

              }
          
          }
          else{


    	     $sql = "INSERT INTO vertage_sms_campaign (`upload_radio`,`numbers`,`language`,`campaign_type_radio`,`campaign_name`,`senderid`,`sms_template`,`sms_text_content`,`remove_duplicate`,`schedule_radio_type`,`scheduledate`,`descr`,`created_date`,`status`,`ref_no`,`username`,`sms_status_code`) VALUES ('$upload_radio','$numbers','$language','$campaign_type_radio','$campaign_name','$senderid','$sms_template','$sms_text_content','$remove_duplicate','$schedule_radio_type','$scheduledate','$descr','$now','Y','$ref_number','$login_id','102')";
          }


    			if(mysqli_query($conn, $sql))
    			{
    				$data       = "SMS Campaign added successfully";
    				$response   = "200";
    			}
    			else
    			{
    				$data       = "Something Wrong!";
    				$response   = "400";
    			}
		
    }
    else
        {
          $data       = "Kindly fill/select all mandatory fields!";
          $response   = "400";
        }

	$output	= array("Response"=>$response,"message"=>$data);

}


echo json_encode($output);

?>