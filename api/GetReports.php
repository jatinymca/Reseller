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
   


$filetoken="1";

if($token==$filetoken){

    $query="SELECT api_key From users where login_id='$login_id'";
    $res = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($res);

    if($row['api_key']==$ukey){
      
      if($credittype==1){
          $allocate_unit=  'sms_promo_allocate_unit';
      }
      else if($credittype==2){
          $allocate_unit=  'sms_trans_allocate_unit';
      }
  
      $q="SELECT ".$allocate_unit." From users where login_id='$login_id'";
      $result = mysqli_query($conn, $q);

        if(mysqli_query($conn, $q))
            { 
              $rows = mysqli_fetch_array(mysqli_query($conn, $q));

                $result = array(
                      "status" => 'success',
                      "Balance" => $rows[0]
                   );
            }
            else
            {
                $result = array(
                    "status" => 'Error',
                    "value" => 'Unable to get.'
                 );
            }

      }
      else{

        $result = array(
                      "status" => 'failure',
                      "value" => 'ukey is not Valid'
                 );
      }
 
  
}


echo json_encode($result);
