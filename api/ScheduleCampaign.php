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

if (isset($_GET["login_id"]))       {$login_id=$_GET["login_id"];}
elseif (isset($_POST["login_id"]))  {$login_id=$_POST["login_id"];}
if (isset($_GET["action"]))       {$action=$_GET["action"];}
elseif (isset($_POST["action"]))  {$action=$_POST["action"];}
if (isset($_GET["token"]))       {$token=$_GET["token"];}
elseif (isset($_POST["token"]))  {$token=$_POST["token"];}
if (isset($_GET["campaign_id"]))       {$campaign_id=$_GET["campaign_id"];}
elseif (isset($_POST["campaign_id"]))  {$campaign_id=$_POST["campaign_id"];}
if (isset($_GET["ukey"]))       {$ukey=$_GET["ukey"];}
elseif (isset($_POST["ukey"]))  {$ukey=$_POST["ukey"];}
if (isset($_GET["producttype"]))       {$producttype=$_GET["producttype"];}
elseif (isset($_POST["producttype"]))  {$producttype=$_POST["producttype"];}
if (isset($_GET["credittype"]))       {$credittype=$_GET["credittype"];}
elseif (isset($_POST["credittype"]))  {$credittype=$_POST["credittype"];}
if (isset($_GET["isschd"]))       {$isschd=$_GET["isschd"];}
elseif (isset($_POST["isschd"]))  {$isschd=$_POST["isschd"];}
if (isset($_GET["schddate"]))       {$schddate=$_GET["schddate"];}
elseif (isset($_POST["schddate"]))  {$schddate=$_POST["schddate"];}
   



  $query="SELECT id From users where api_key!='' and api_key='$ukey'";
  $res = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($res);
  $count = mysqli_num_rows($res);

  if($count>0){
      
      $q="SELECT schedule_radio_type, scheduledate From vertage_sms_campaign where sms_campgn_id ='$campaign_id'";
      $res = mysqli_query($conn, $q);
      $counts = mysqli_num_rows($res);

        if($counts>0)
          { 
            if($isschd=='0'){
                $schddate = $now;
            }
              
            $sql="UPDATE vertage_sms_campaign set schedule_radio_type='$isschd' , scheduledate='$schddate' where sms_campgn_id ='$campaign_id'";  

            if(mysqli_query($conn, $sql)){

                $result = array(
                      "status" => 'success',
                      "value" => 'Campaign Modify Successfully'
                   );
            }
            else{

                $result = array(
                      "status" => 'Something error',
                      "value" => 'Unable to update'
                   );
            }

          }
          else
          {
              $result = array(
                  "status" => 'Error',
                  "value" => 'No data available.'
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
