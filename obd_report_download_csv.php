<?php 
include('configuration/c_config.php');
include('configuration/logs.php');

if (isset($_GET["report_name"]))					{$report_name=$_GET["report_name"];}
elseif (isset($_POST["report_name"]))		{   $report_name=$_POST["report_name"];}

if (isset($_GET["request_fromdatetime"]))					{$request_fromdatetime=$_GET["request_fromdatetime"];}
elseif (isset($_POST["request_fromdatetime"]))		{   $request_fromdatetime=$_POST["request_fromdatetime"];}

if (isset($_GET["request_todatetime"]))					{$request_todatetime=$_GET["request_todatetime"];}
elseif (isset($_POST["request_todatetime"]))		{   $request_todatetime=$_POST["request_todatetime"];}

 




// SHOW FIELDS FROM DEFAULT TABLE VICIDIAL LIST
   $stmt="SELECT * FROM `vertage_log` WHERE campaign_id='$report_name' and call_date>='$request_fromdatetime 00:00:00' and call_date<= '$request_todatetime 23:59:59' "; 
$rslt=mysqli_query($conn,$stmt); 

while ($row=mysqli_fetch_array($rslt)){
	$campaign_id           =   $row['campaign_id'];
	$lead_id           =   $row['lead_id'];
	$call_date             =   $row['call_date'];
	$phone_number          =   $row['phone_number'];
	$security_phase        =   $row['security_phase']; 
	$start_epoch        =   $row['start_epoch']; 
	$end_epoch        =   $row['end_epoch']; 
	$status      		   =   $row['status']; 
	$total_length		= $end_epoch-$start_epoch; 
	$export[]=array('campaign_id'=>$campaign_id,'lead_id'=>$lead_id,'call_date'=>$call_date,'phone_number'=>$phone_number,'total_length'=>$total_length,'security_phase'=>$security_phase,'status'=>$status);  
} 


 

 // output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Report_'.$report_name.'.csv');
//create a file pointer connected to the output stream
$output = fopen('php://output', 'w'); 

$Array=array('campaign_id','lead_id','call_date','phone_number','total_length','security_phase','status');
fputcsv($output,$Array);
                                    
                                     foreach($export as $data){
                                                        fputcsv($output, $data);
                                                          }

 

fclose($output);
?>