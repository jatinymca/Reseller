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

// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=File_Format_'.$campaign_id.'.csv');

//create a file pointer connected to the output stream
$output = fopen('php://output', 'w'); 

$smtp="SELECT * FROM `obd_report_generate` WHERE invoice_id='$invoice_id'"; 
$res=mysqli_query($conn,$smtp);
$row=mysqli_fetch_array($res);
$campaign_id     =  $row['campaign_id'];
$Start_Date      =  $row['Start_Date'];
$End_Date        =  $row['End_Date'];

$smtp1="SELECT * FROM `vertage_list` WHERE  status!='NEW' and campaign_id='$campaign_id' and modify_date>='$Start_Date 00:00:00' and modify_date<='$End_Date 23:59:59' ";  
$res1=mysqli_query($conn,$smtp1);
$count=mysqli_num_rows($res1);

 
if($count>0){
	while($row_list=mysqli_fetch_array($res1)){
		$lead_id		=		$row_list['lead_id'];
		$entry_date		=		$row_list['entry_date'];
		$campaign_id	=		$row_list['campaign_id'];
		$status 		=		$row_list['status'];
		$user			=		$row_list['user'];
		$phone_number	=		$row_list['phone_number'];
		$plan_id		=		$row_list['plan_id'];
		$reduce_refund	=		$row_list['reduce_refund'];
		$amount			=		$row_list['amount']; 
		$pulse			=		$row_list['pulse']; 
		$TOTAL			=		$amount*$pulse;

	    $smtp2="SELECT * FROM `vertage_log` WHERE lead_id='$lead_id'";  
		$res2=mysqli_query($conn,$smtp2);
		$row2=mysqli_fetch_array($res2);
		$length_in_sec=$row2['length_in_sec'];


		$export[]=array('entry_date'=>$entry_date,'campaign_id'=>$campaign_id,'status'=>$status,'user'=>$user,'phone_number'=>$phone_number,'plan_id'=>$plan_id,'length_in_sec'=>$length_in_sec,'reduce_refund'=>$reduce_refund,'amount'=>$amount,'pulse'=>$pulse,'TOTAL'=>$TOTAL);  
	};
}

$Array=array('entry_date','campaign','status','user','phone_number','plan_id','length_in_sec','reduce_refund','amount','pulse','TOTAL');
fputcsv($output,$Array);

foreach($export as $data){
	fputcsv($output, $data);
} 

fclose($output);



?>