<?php


require('../configuration/c_config.php');
require('../php/dynamic_sql_command.php');

$Process_name=$_SESSION['act_user']['primary_process'];

$URLPath = explode('/',  "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
$serverhost = $URLPath[0];
$foldername = $URLPath[1];
$pagename = $URLPath[2];
$pagename = explode('.', $URLPath[3]);
$pageaction = $pagename[0];

$email_verifying = $URLPath[4];

if (isset($_GET["action"]))       {$action=$_GET["action"];}
elseif (isset($_POST["action"]))  {$action=$_POST["action"];}
if (isset($_GET["Process_name"]))       {$Process_name=$_GET["Process_name"];}
elseif (isset($_POST["Process_name"]))  {$Process_name=$_POST["Process_name"];}
if (isset($_GET["colume_name"]))       {$colume_name=$_GET["colume_name"];}
elseif (isset($_POST["colume_name"]))  {$colume_name=$_POST["colume_name"];} 
if (isset($_GET["Queue_key_result"]))       {$Queue_key_result=$_GET["Queue_key_result"];}
elseif (isset($_POST["Queue_key_result"]))  {$Queue_key_result=$_POST["Queue_key_result"];}  
if (isset($_GET["case_status"]))       {$case_status=$_GET["case_status"];}
elseif (isset($_POST["case_status"]))  {$case_status=$_POST["case_status"];}  
if (isset($_GET["status"]))       {$status=$_GET["status"];}
elseif (isset($_POST["status"]))  {$status=$_POST["status"];}  
if (isset($_GET["level_name"]))       {$level_name=$_GET["level_name"];}
elseif (isset($_POST["level_name"]))  {$level_name=$_POST["level_name"];}   
if (isset($_GET["data_tbl"]))       {$data_tbl=$_GET["data_tbl"];}
elseif (isset($_POST["data_tbl"]))  {$data_tbl=$_POST["data_tbl"];}   
if (isset($_GET["id"]))       {$id=$_GET["id"];}
elseif (isset($_POST["id"]))  {$id=$_POST["id"];}   
if (isset($_GET["campaign_name"]))       {$campaign_name=$_GET["campaign_name"];}
elseif (isset($_POST["campaign_name"]))  {$campaign_name=$_POST["campaign_name"];}
if (isset($_GET["token"]))       {$token=$_GET["token"];}
elseif (isset($_POST["token"]))  {$token=$_POST["token"];}
if (isset($_GET["msisdn"]))       {$msisdn=$_GET["msisdn"];}
elseif (isset($_POST["msisdn"]))  {$msisdn=$_POST["msisdn"];}
if (isset($_GET["language"]))       {$language=$_GET["language"];}
elseif (isset($_POST["language"]))  {$language=$_POST["language"];}
if (isset($_GET["credittype"]))       {$credittype=$_GET["credittype"];}
elseif (isset($_POST["credittype"]))  {$credittype=$_POST["credittype"];}
if (isset($_GET["senderid"]))       {$senderid=$_GET["senderid"];}
elseif (isset($_POST["senderid"]))  {$senderid=$_POST["senderid"];}
if (isset($_GET["templateid"]))       {$templateid=$_GET["templateid"];}
elseif (isset($_POST["templateid"]))  {$templateid=$_POST["templateid"];}
if (isset($_GET["message"]))       {$message=$_GET["message"];}
elseif (isset($_POST["message"]))  {$message=$_POST["message"];}
if (isset($_GET["ukey"]))       {$ukey=$_GET["ukey"];}
elseif (isset($_POST["ukey"]))  {$ukey=$_POST["ukey"];}
if (isset($_GET["isschd"]))       {$isschd=$_GET["isschd"];}
elseif (isset($_POST["isschd"]))  {$isschd=$_POST["isschd"];}
if (isset($_GET["schddate"]))       {$schddate=$_GET["schddate"];}
elseif (isset($_POST["schddate"]))  {$schddate=$_POST["schddate"];}
if (isset($_GET["dlttemplateid"]))       {$dlttemplateid=$_GET["dlttemplateid"];}
elseif (isset($_POST["dlttemplateid"]))  {$dlttemplateid=$_POST["dlttemplateid"];}
   


$success='A';
$upload_radio= '2';
$campaign_type_radio= '2';

  if($isschd=='0'){
      $schddate = $now;
  }

  $query="SELECT id,login_id From users where api_key!='' and api_key='$ukey'";
  $res = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($res);

  $login_id =$row['login_id'];

  $count = mysqli_num_rows($res);

  if($count>0){

        $sqlref="SELECT ref_no FROM `vertage_sms_campaign` ORDER BY `ref_no` DESC LIMIT 1";
        $resref = mysqli_query($conn, $sqlref);
        $rowref = mysqli_fetch_array($resref);

        if($rowref['ref_no']!=''){
            $ref_number = $rowref['ref_no']+1;
        }
        else{
            $ref_number = '10000000000'; 
        }

        $sql = "INSERT INTO vertage_sms_campaign (`upload_radio`,`numbers`,`language`,`campaign_type_radio`,`campaign_name`,`senderid`,`sms_template`,`sms_text_content`,`remove_duplicate`,`schedule_radio_type`,`scheduledate`,`descr`,`created_date`,`status`,`ref_no`,`username`,`sms_status_code`) VALUES ('$upload_radio','$msisdn','$language','$campaign_type_radio','$campaign_name','$senderid','$templateid','$message','$remove_duplicate','$isschd','$schddate','$descr','$now','Y','$ref_number','$login_id','102')";

          if(mysqli_query($conn, $sql))
              {
                  $last_id = mysqli_insert_id($conn);
                  
                  $result = array(
                        "status" => 'success',
                        "leadid" => $last_id,
                        "inserted" => '1',
                        "rejected" => '0',
                        "creditused" =>'3',
                         "refno" =>[ $msisdn=>$ref_number ]
                     );
              }
              else
              {
                  $result = array(
                      "status" => 'Error',
                      "value" => 'Unable to send.'
                   );
              }

      }
      else{

        $result = array(
                      "status" => 'failure',
                      "value" => 'User Key is not Valid'
                 );
      }
 
   
echo json_encode($result);
