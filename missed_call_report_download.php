 <?php 
 include('configuration/c_config.php');
 include('configuration/function.php');
 include('permission.php');

 if (isset($_GET["extension"]))					{$extension=$_GET["extension"];}
 elseif (isset($_POST["extension"]))		{   $extension=$_POST["extension"];}

 if (isset($_GET["start_time"]))					{$start_time=$_GET["start_time"];}
 elseif (isset($_POST["start_time"]))		{   $start_time=$_POST["start_time"];}

 if (isset($_GET["end_time"]))					{$end_time=$_GET["end_time"];}
 elseif (isset($_POST["end_time"]))		{   $end_time=$_POST["end_time"];} 

// SHOW FIELDS FROM DEFAULT TABLE VICIDIAL LIST 
  $start_time=date('Y-m-d',strtotime($start_time));
 	$end_time=date('Y-m-d',strtotime($end_time));

 $smtp="SELECT customer_phone,extension,start_time,start_epoch,end_epoch FROM `inbound_log` WHERE extension='$extension' AND start_time>='$start_time 00:00:00' AND start_time<='$end_time 23:59:59'  $permission_username   order by start_time desc ";
 $rslt=mysqli_query($conn,$smtp);


 while ($row=mysqli_fetch_array($rslt)){

 	$start_time=$row[2];
 	$start_epoch=$row[3];
 	$end_epoch=$row[4];
 	$length_in_min= $end_epoch -  $start_epoch ; 
 	$length_in_min = sprintf('%02d:%02d:%02d', ($length_in_min/3600),($length_in_min/60%60), $length_in_min%60); 
 	$start_time=date('D d M h:i:s',strtotime($start_time));
 	$end_time=date('D d M h:i:s',strtotime($end_epoch));

 	$customer_phone      =   $row[0]; 
 	$extension           =   $row[1];
 	$call_date           =   $start_time;
 	$End_date            =   $end_time; 
 	$Duration            =   $length_in_min;

 	$export[]=array('customer_phone'=>$customer_phone,'extension'=>$extension,'call_date'=>$call_date,'End_date'=>$End_date,'Duration'=>$Duration);  
 } 


 

 // output headers so that the file is downloaded rather than displayed
 header('Content-Type: text/csv; charset=utf-8');
 header('Content-Disposition: attachment; filename=Report_'.$report_name.'.csv');
//create a file pointer connected to the output stream
 $output = fopen('php://output', 'w'); 

 $Array=array('customer_phone','extension','call date','End date','Duration');
 fputcsv($output,$Array);

 foreach($export as $data){
 	fputcsv($output, $data);
 }

 

 fclose($output);
?>