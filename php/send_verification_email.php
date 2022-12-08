<?php
 
require('../configuration/c_config.php');
 require('../configuration/function.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
 
 if (isset($_GET["action"]))       {$action=$_GET["action"];}
elseif (isset($_POST["action"]))  {$action=$_POST["action"];}
if (isset($_GET["sender_email_address"]))       {$sender_email_address=$_GET["sender_email_address"];}
elseif (isset($_POST["sender_email_address"]))  {$sender_email_address=$_POST["sender_email_address"];}
 if (isset($_GET["token_url"]))       {$token_url=$_GET["token_url"];}
elseif (isset($_POST["token_url"]))  {$token_url=$_POST["token_url"];}

if($action=='send_verification_email'){
 
    $sql = "SELECT from_name FROM `email_sender_id` where from_email_address='$sender_email_address' limit 1";
    $res = mysqli_query($conn, $sql);
    $rowscount = mysqli_num_rows($res);

    	while($row=mysqli_fetch_array($res)){
    		$from_name = $row['from_name'];
     
		    $totalimg = count($_FILES["file"]["name"]);
		    $dataArray = array();
		    $finalArray = array();

           		$mail = new PHPMailer(true);
     
		        $mail->isSMTP();                                            
		        $mail->Host       = 'smtp.zoho.com';                    
		        $mail->SMTPAuth   = true; 
		        $mail->SMTPDebug = 0;  // debugging: 2 = errors and messages, 2 = messages only                                  
		      
		        $mail->Username   = 'dharmender.pal@vert-age.com';                     
		        $mail->Password   = 'sP704246@';                               
		        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
		        $mail->Port       = 465;    
		        $mail->SMTPSecure = 'ssl';                               

		        $mail->setFrom('dharmender.pal@vert-age.com', 'Dharmender Pal');
		        $mail->addAddress($sender_email_address, $from_name);  

		        $mail->isHTML(true);                              
		        $mail->Subject = "Confirmation Mail";
		        $mail->Body    = 'Welcome Dear,<br><br> We have sent a verification mail to you. Kindly click on the below button and confirm you email address. <br> <a href="'.$token_url.'">Verify Your Email Address</a>';
		        
		        if($mail->send()){

    					$result = array(
		                      "Response" => "200",
		                      "message" => "Message has been sent"
		                  );
						
		        }
		        else{ 

		        		$result = array(
		                      "Response" => "400",
		                      "message" => "Message has been not sent"
		                  );
		        }
		   
		}
		         
    } 

  
 

echo json_encode($result);

?>
