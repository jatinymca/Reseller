<?php
 
require('configuration/c_config.php');
require('configuration/function.php');

   $URLPath = explode('/',  "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
   $serverhost = $URLPath[0];
   $foldername = $URLPath[1];
   $pagename = $URLPath[2];
   $pagetoken = $URLPath[3];
   $email_verifying = $URLPath[4];
   

   if($email_verifying=='email_verifying'){
 
      $sql = "SELECT id FROM `email_sender_id` where token_id='$pagetoken' limit 1";
      $res = mysqli_query($conn, $sql);
      $data = mysqli_fetch_array($res);
      $rowscount = mysqli_num_rows($res);
      if($rowscount>'0'){
         
         $confirmation_id = $data['id'];

         $sql = "UPDATE email_sender_id SET `status`='1' WHERE id='$confirmation_id'";

               if(mysqli_query($conn, $sql)){

                  header("location:http://".$serverhost."/".$foldername."/email_thankyou.php");

                  $data       = "Email address verified successfully";
                  $response   = "200";
               }
               else{
                  $data       = "Something Wrong!";
                  $response   = "400";
               }
      }
      
               
    } 

/*   $output = array("Response"=>$response,"message"=>$data); 
  
echo json_encode($output);*/
 


?>
