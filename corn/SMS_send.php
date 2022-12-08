<?php 
 #!/usr/bin/php

$localhost='localhost';
   $username='root';
   $password='xspl#!#!@123';
   $db_name='vertage';
   $conn=mysqli_connect($localhost,$username,$password,$db_name);

$now=date('Y-m-d h:i:s');
      $sms_query = "SELECT * FROM `vertage_sms_campaign` where scheduledate<='$now'  and sms_status_code NOT IN('202')  limit 1 ";
    $sms_res = mysqli_query($conn, $sms_query);
    $sms_rows=mysqli_fetch_array($sms_res);
    $sms_count=mysqli_num_rows($sms_res);
    $sms_campgn_id=$sms_rows['sms_campgn_id'];
    $phone_number = $sms_rows['numbers'];
    $campaign_name = $sms_rows['campaign_name'];
    $senderid = $sms_rows['senderid'];
    $sms_text_content = $sms_rows['sms_text_content'];
    $schedule_now_later = $sms_rows['schedule_radio_type'];
    $scheduledate = $sms_rows['scheduledate'];

     

 
if($sms_count>0){
$port_id=0;
$i=1;
 
  	$json_string_data = '{"text":"'.$sms_text_content.'","param":[{"number":"'.$phone_number.'","text_param":"new","user_id":"'.$i.'"}],"port":['.$port_id.']}';
		//$gateway_ip = "122.161.195.61";
		$username="admin";
		$password="xspl@123";
		$ch = curl_init('http://192.168.1.211/api/send_sms');
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json_string_data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		  'Content-Type: application/json',
		  'version: 1.0.2',
		  'Content-Length: ' . strlen($json_string_data))
		);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
		   $result = curl_exec($ch);
	 
		curl_close($ch);
		$response_array = json_decode($result, TRUE);
		$status_code=$response_array['error_code'];

 $sms_query= "UPDATE `vertage_sms_campaign` SET sms_status_code='$status_code' where sms_campgn_id='$sms_campgn_id'";
  $sms_res = mysqli_query($conn, $sms_query);
}

?>