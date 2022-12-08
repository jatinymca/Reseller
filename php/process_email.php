<?php
 
require('../configuration/c_config.php');
//require('../configuration/function.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';


$login_id= $_SESSION['act_user']['login_id'];

if (isset($_GET["action"]))       {$action=$_GET["action"];}
elseif (isset($_POST["action"]))  {$action=$_POST["action"];}

if (isset($_GET["mail_address"]))					{$mail_address=$_GET["mail_address"];}
elseif (isset($_POST["mail_address"]))		{$mail_address=$_POST["mail_address"];}
if (isset($_GET["customer_name"]))					{$customer_name=$_GET["customer_name"];}
elseif (isset($_POST["customer_name"]))		{$customer_name=$_POST["customer_name"];}
if (isset($_GET["template_id"]))					{$template_id=$_GET["template_id"];}
elseif (isset($_POST["template_id"]))		{$template_id=$_POST["template_id"];}
if (isset($_GET["meeting_time"]))					{$meeting_time=$_GET["meeting_time"];}
elseif (isset($_POST["meeting_time"]))		{$meeting_time=$_POST["meeting_time"];}

if (isset($_GET["template"]))					{$template=$_GET["template"];}
elseif (isset($_POST["template"]))		{$template=$_POST["template"];}


if (isset($_GET["user_id"]))					{$user_id=$_GET["user_id"];}
elseif (isset($_POST["user_id"]))		{$user_id=$_POST["user_id"];}
if (isset($_GET["username"]))					{$username=$_GET["username"];}
elseif (isset($_POST["username"]))		{$username=$_POST["username"];}



$URLPath = explode('/',  "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
$serverhost = $URLPath[0];
$foldername = $URLPath[1];
$pagename = $URLPath[2];
$pagetoken = $URLPath[3];
$email_verifying = $URLPath[4];

$totalimg = count($_FILES["file"]["name"]);
$dataArray = array();
$finalArray = array();




if($action=='meeting_fix'){

        	$client_email_address = $mail_address;
       		$template_subject = 'Meeting Fix';
       		$mailsendername = 'Anthum For Future';
       		$client_name = $customer_name;

       		$mail = new PHPMailer(true);
 			
 			$mail->isSMTP();                                            
	        $mail->Host       = 'smtp.zoho.in';           
	        $mail->SMTPAuth   = true; 
	        $mail->SMTPDebug = 2;  // debugging: 2 = errors and messages, 2 = messages only                                  
	      
	        //$mail->Username   = 'anthumforfuture@zohomail.in';                     
	        //$mail->Password   = 'rohit@6342';
		
		$mail->Username   = 'xcapitalindia@zohomail.in';                     
	        $mail->Password   = 'rohit6342';                               
	        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
	        $mail->Port       = 465;    
	        $mail->SMTPSecure = 'ssl';                               

	        $mail->setFrom("xcapitalindia@zohomail.in", $mailsendername);
	        $mail->addAddress($client_email_address, $client_name); 


	        $mail->isHTML(true);                              
	        $mail->Subject = $template_subject;
	        $mail->Body    = $template;
	        
	        if($mail->send()){

	        	$email_log_sql = "INSERT INTO email_log (`email_contact_id`,`email_address`,`sent_datetime`,`status`,`mail_status`,`mail_type`,`username`) VALUES('','$client_email_address','$now','Mail has been sent','Delivered','Meeting','API')";
	        	if(mysqli_query($conn, $email_log_sql)){

    					$result = array(
		                      "Response" => "200",
		                      "message" => "Mail has been sent"
		                  );

    					$response = array(
		                      "Response" => "200",
		                      "message" => "Mail has been sent"
		                  );
						 
					}
					else{

						$result = array(
		                      "Response" => "400",
		                      "message" => "Something Wrong!"
		                  );

						$response = array(
		                      "Response" => "400",
		                      "message" => "Something Wrong!"
		                  );
						 
					}
	        } 
}


if($action=='send_unschedule_email'){

	$test_mail_query="SELECT testemail.id as email_contact_id, testemail.email_address as client_email_address,emailtemp.templatetext as template_body,emailtemp.templatename as template_subject, emailsender.from_name as mailsendername, emailsender.from_email_address as mailsenderemail FROM `test_email_information` as testemail  inner join email_template as emailtemp on emailtemp.id=testemail.template_id inner join email_campaign as emailcamp on emailcamp.id=testemail.campaign_id inner join email_sender_id as emailsender on emailsender.id=testemail.email_sender_id where testemail.username='$login_id' order by testemail.id DESC limit 1 " ;
    $test_mail_query_res = mysqli_query($conn, $test_mail_query);

    while($test_rows=mysqli_fetch_array($test_mail_query_res)){

        	$email_contact_id = $test_rows['email_contact_id'];
       		$client_email_address = $test_rows['client_email_address'];
       		$template_body = $test_rows['template_body'];
       		$template_subject = $test_rows['template_subject'];
       		$mailsendername = $test_rows['mailsendername'];
       		$mailsenderemail = $test_rows['mailsenderemail'];
       		$client_name = "Dear Sir/Ma'am";


       		$mail = new PHPMailer(true);
 
	        $mail->isSMTP();                                            
	        $mail->Host       = 'smtp.zoho.in';           
	        $mail->SMTPAuth   = true; 
	        $mail->SMTPDebug = 2;  // debugging: 2 = errors and messages, 2 = messages only                                  
	      
	        $mail->Username   = 'xcapitalindia@zohomail.in';                     
	        $mail->Password   = 'rohit6342';                               
	        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
	        $mail->Port       = 465;    
	        $mail->SMTPSecure = 'ssl';                               

	        $mail->setFrom("xcapitalindia@zohomail.in", $mailsendername);
	        $mail->addAddress($client_email_address, $client_name);  


	        $mail->isHTML(true);                              
	        $mail->Subject = $template_subject;
	        $mail->Body    = $template_body;
	        
	        if($mail->send()){

	        	$email_log_sql = "INSERT INTO email_log (`email_contact_id`,`email_address`,`sent_datetime`,`status`,`mail_status`,`mail_type`,`username`) VALUES('$email_contact_id','$client_email_address','$now','Mail has been sent','Delivered','test','$login_id')";
	        	if(mysqli_query($conn, $email_log_sql)){

	        					$result = array(
				                      "Response" => "200",
				                      "message" => "Mail has been sent"
				                  );
								 
							}
							else{

								$result = array(
				                      "Response" => "400",
				                      "message" => "Something Wrong!"
				                  );
								 
							}

	        }
	        else{

	        	$email_log_sql = "INSERT INTO email_log (`email_contact_id`,`email_address`,`sent_datetime`,`status`,`mail_status`,`mail_type`,`username`) VALUES('$email_contact_id','$client_email_address','$now','Mail has been not sent','Failed','test','$login_id')";
	        	if(mysqli_query($conn, $email_log_sql)){

	        					$result = array(
				                      "Response" => "200",
				                      "message" => "Mail has been not sent"
				                  );
								 
							}
							else{

								$result = array(
				                      "Response" => "400",
				                      "message" => "Something Wrong!"
				                  );
								 
							}
	        }


        }


}



if($action=='send_schedule_email'){
 
     $list_q="SELECT * FROM `email_information` where email_sender_id!=''  and schedule_date!='' and schedule_date<'$now24hrs' and mail_status='pending' and username='$login_id'";
    $list_result = mysqli_query($conn,$list_q);

 
    while($list_rows=mysqli_fetch_array($list_result)){
 
        	$email_inform_table_id = $list_rows['id'];
        	$email_sender_id = $list_rows['email_sender_id'];
        	$campaign_id = $list_rows['campaign_id'];
        	$list_id = $list_rows['list_id'];
        	$template_id = $list_rows['template_id'];

        	$explode_list_id =  explode(',', $list_id);
        	$implode_list_id =  implode("','", $explode_list_id);

 
        	//$sqla ="UPDATE email_information set mail_status='complete' where id='$email_inform_table_id'";
		    //mysqli_query($conn, $sqla);

      	   $mail_query="SELECT emailcontact.list_id, emailcontact.contact_id as email_contact_id, emailcontact.email as client_email_address,emailcontact.firstname as client_first_name,emailcontact.lastname as client_last_name,emailcontact.username as username,emailtemp.templatetext as template_body,emailtemp.templatename as template_subject, emailsender.from_name as mailsendername, emailsender.from_email_address as mailsenderemail FROM `email_contact` as emailcontact  inner join email_template as emailtemp on emailtemp.id='$template_id' inner join email_campaign as emailcamp on emailcamp.id='$campaign_id' inner join email_sender_id as emailsender on emailsender.id='$email_sender_id' where emailcontact.list_id in ('$implode_list_id') and emailcontact.mail_status='pending' group by emailcontact.contact_id limit 100 " ;
        $mail_query_res = mysqli_query($conn,$mail_query);
          $mail_Quecount= mysqli_num_rows($mail_query_res);
        if($mail_Quecount==0){

        	  $smtp="UPDATE `email_information` SET  `mail_status`='DONE' WHERE id='$email_inform_table_id'";
        	$list_result = mysqli_query($conn,$smtp);
        	die;
        }
 
    		while($mail_rows=mysqli_fetch_array($mail_query_res)){
           		$email_contact_id = $mail_rows['email_contact_id'];
           		$client_email_address = $mail_rows['client_email_address'];
           		$client_first_name = $mail_rows['client_first_name'];
           		$client_last_name = $mail_rows['client_last_name'];
           		$client_username = $mail_rows['username'];
            	$template_body = $mail_rows['template_body'];
           		$template_subject = $mail_rows['template_subject'];
           		$mailsendername = $mail_rows['mailsendername'];
           		$mailsenderemail = $mail_rows['mailsenderemail'];

           		$mail = new PHPMailer(true);
     
		        $mail->isSMTP();                                            
		        $mail->Host       = 'smtp.zoho.in';                  
		        $mail->SMTPAuth   = true; 
		        $mail->SMTPDebug = 2;  // debugging: 2 = errors and messages, 2 = messages only                                  
		      
		        $mail->Username   = 'xcapitalindia@zohomail.in';                   
		        $mail->Password   = 'rohit6342';                               
		        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
		        $mail->Port       = 465;    
		        $mail->SMTPSecure = 'ssl';                               

		        $mail->setFrom("xcapitalindia@zohomail.in", $mailsendername);
		        $mail->addAddress($client_email_address, $client_first_name.'-'.$client_last_name);  

		        
		        $mail->isHTML(true);                              
		        $mail->Subject = $template_subject;
		        $mail->Body    = $template_body;
		        
		        if($mail->send()){

		        	$email_log_sql = "INSERT INTO email_log (`email_contact_id`,`email_address`,`sent_datetime`,`status`,`mail_status`,`mail_type`,`username`) VALUES('$email_contact_id','$client_email_address','$now','Mail has been sent','Delivered','real','$client_username')";

		        	$sql ="UPDATE email_contact set mail_status='complete' where contact_id='$email_contact_id'";
		        	mysqli_query($conn, $sql);

		        	if(mysqli_query($conn, $email_log_sql)){

        					$result = array(
			                      "Response" => "200",
			                      "message" => "Mail has been sent"
			                  );
							 
						}
						else{

							$result = array(
			                      "Response" => "400",
			                      "message" => "Something Wrong!"
			                  );
						}
		        }
		        else{

		        	$sqli ="UPDATE email_contact set mail_status='failed' where contact_id='$email_contact_id'";
		        	mysqli_query($conn, $sqli);

		        	$email_log_sql = "INSERT INTO email_log (`email_contact_id`,`email_address`,`sent_datetime`,`status`,`mail_status`,`mail_type`,`username`) VALUES('$email_contact_id','$client_email_address','$now','Mail has been not sent','Failed','real','$client_username')";
		        	if(mysqli_query($conn, $email_log_sql)){

		        					$result = array(
					                      "Response" => "200",
					                      "message" => "Mail has been not sent"
					                  );
								}
								else{
									$result = array(
					                      "Response" => "400",
					                      "message" => "Something Wrong!"
					                  );
								}
		        }
		        /*$result = array(
		                      "Response" => "200",
		                      "message" => "Message has been sent"
		                  );*/
       		}


    } 

  

}

echo json_encode($result);

?>
