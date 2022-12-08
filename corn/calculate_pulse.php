<?php
require('../configuration/c_config.php');
require('dynamic_sql_command.php');
$Process_name=$_SESSION['act_user']['primary_process'];
if (isset($_GET["action"]))       {$action=$_GET["action"];}
elseif (isset($_POST["action"]))  {$action=$_POST["action"];}
if (isset($_GET["invoice_id"]))       {$invoice_id=$_GET["invoice_id"];}
elseif (isset($_POST["invoice_id"]))  {$invoice_id=$_POST["invoice_id"];}
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





 
 


 $smtp1="SELECT * FROM `vertage_list` WHERE  status!='NEW' and plan_id='0'"; 
 $res1=mysqli_query($conn,$smtp1);
 $count=mysqli_num_rows($res1);
 if($count>0){
 while($row_list=mysqli_fetch_array($res1)){
 			 $user_name=$row_list['user'];
 			 $lead_id=$row_list['lead_id'];
 			   $duration=$row_list['recording_length'];
			  $smtp="SELECT * FROM `vertage_voice_plan_list` WHERE user_id='$user_name'"; 
			 $res=mysqli_query($conn,$smtp);
			 $row=mysqli_fetch_array($res);
			   $plan_id=$row['plan_id'];
			   			     $plan_pulse=$row['plan_pulse'];
			    			     $plan_rate=$row['plan_rate'];
			  			  $rupes_count_per=((($plan_rate/$plan_pulse)*$duration));
			 $rupes_count_per_round= round($rupes_count_per,3);
			 $pulse=ceil($duration/$plan_pulse);
			  $query="UPDATE `vertage_list` SET  `amount`='$rupes_count_per_round',`plan_id`='$plan_id',`reduce_refund`='Reduce',`pulse`='$pulse' WHERE lead_id='$lead_id'";
 			  mysqli_query($conn,$query);
 

 };
}





?>