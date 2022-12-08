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
if (isset($_GET["ukey"]))       {$ukey=$_GET["ukey"];}
elseif (isset($_POST["ukey"]))  {$ukey=$_POST["ukey"];}
if (isset($_GET["producttype"]))       {$producttype=$_GET["producttype"];}
elseif (isset($_POST["producttype"]))  {$producttype=$_POST["producttype"];}
if (isset($_GET["credittype"]))       {$credittype=$_GET["credittype"];}
elseif (isset($_POST["credittype"]))  {$credittype=$_POST["credittype"];}
if (isset($_GET["ref_no"]))       {$ref_no=$_GET["ref_no"];}
elseif (isset($_POST["ref_no"]))  {$ref_no=$_POST["ref_no"];}   




  $query="SELECT id,login_id From users where api_key!='' and api_key='$ukey'";
  $res = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($res);
  
  $login_id =$row['login_id'];

  $count = mysqli_num_rows($res);

  if($count>0){
          
        $q="SELECT sms_status_code From vertage_sms_campaign where ref_no='$ref_no'";
        $qres = mysqli_query($conn, $q);
        $qrow = mysqli_fetch_array($qres);
        $counts = mysqli_num_rows($qres);

        if($counts>0)
          { 
              if($qrow['sms_status_code']=="202"){
                  $value= 'Delivered';
              }
              else{
                  $value= 'Under Process';
              }

              $result = array(
                    "status" => 'success',
                    "value" => $value
                 );
          }
          else
          {
              $result = array(
                  "status" => 'Error',
                  "value" => 'Invalid Reference number.'
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
