<?php
session_start();  
require('../configuration/c_config.php');
require('../configuration/function.php');
require('../permission.php');

if (isset($_GET["campaign_id"]))             {$campaign_id=$_GET["campaign_id"];}
elseif (isset($_POST["campaign_id"]))       {$campaign_id=$_POST["campaign_id"];}
if (isset($_GET["Account_no"]))             {$Account_no=$_GET["Account_no"];}
elseif (isset($_POST["Account_no"]))       {$Account_no=$_POST["Account_no"];}
if (isset($_GET["customer_name"]))             {$customer_name=$_GET["customer_name"];}
elseif (isset($_POST["customer_name"]))       {$customer_name=$_POST["customer_name"];}
if (isset($_GET["Passport_no"]))             {$Passport_no=$_GET["Passport_no"];}
elseif (isset($_POST["Passport_no"]))       {$Passport_no=$_POST["Passport_no"];}
if (isset($_GET["Mobile"]))             {$Mobile=$_GET["Mobile"];}
elseif (isset($_POST["Mobile"]))       {$Mobile=$_POST["Mobile"];}

if (isset($_GET["action"]))             {$action=$_GET["action"];}
elseif (isset($_POST["action"]))       {$action=$_POST["action"];}

if (isset($_GET["Relationship_No"]))             {$Relationship_No=$_GET["Relationship_No"];}
elseif (isset($_POST["Relationship_No"]))       {$Relationship_No=$_POST["Relationship_No"];}

#################################################################################

if($action=="ivr_report"){
   $smtp="SELECT * FROM `vertage_closer_log` WHERE 1 $permission_username order by call_date desc ";
   $res=mysqli_query($conn,$smtp);
   $row_count=mysqli_num_rows($res);

   while($row = mysqli_fetch_array($res)){
      $sub_array = array();

      $end_time=$row[6];
      $start_time=$row[5];
      $length_in_min= $end_time -  $start_time ; 
      $length_in_min = sprintf('%02d:%02d:%02d', ($length_in_min/3600),($length_in_min/60%60), $length_in_min%60); 
      $call_time=date('D d M h:i:s',strtotime(".$row[4]."));

      $sub_array[]="<input type='checkbox'>"; 
      $sub_array[]=$row['customer_phone']; 
      $sub_array[]=$row[24]; 
      $sub_array[]=$call_time; 
      $sub_array[]=$length_in_min; 
      $sub_array[]=$row[3]; 
      $sub_array[]="NONE"; 
      $sub_array[]=$row[11]; 
      $sub_array[]=$row[8]; 
      $sub_array[]=$row[9]; 
      $sub_array[]="<a target='_blank' href='".$HTTP_ORIGIN.'/OBD_recording/'.$row['recording_folder'] .$row['recording_path']."'>Play Audio</a>"; 





      $data[] = $sub_array;
  }


  $output = array(
   "draw"    => 100,
   "recordsTotal"  => $row_count,
   "recordsFiltered" =>$row_count,
   "data"    => $data
);
}



if($action=="missed_call_report"){ 

    $extension= $_POST["extension"]; 
   $start_time= date('Y-m-d',strtotime($_POST["start_time"]));
   $end_time=   date('Y-m-d',strtotime($_POST["end_time"])); 
  $smtp="SELECT customer_phone,extension,start_time,start_epoch,end_epoch FROM `inbound_log` WHERE extension='$extension' AND start_time>='$start_time 00:00:00' AND start_time<='$end_time 23:59:59'  $permission_username   order by start_time desc ";
   $res=mysqli_query($conn,$smtp);
   $row_count=mysqli_num_rows($res);

   while($row = mysqli_fetch_array($res)){
       $sub_array = array();

        
       $start_time=$row[2];
       $start_epoch=$row[3];
       $end_epoch=$row[4];
       $length_in_min= $end_epoch -  $start_epoch ; 
       $length_in_min = sprintf('%02d:%02d:%02d', ($length_in_min/3600),($length_in_min/60%60), $length_in_min%60); 
       $call_time=date('D d M h:i:s',strtotime($start_time));
       $end_time=date('D d M h:i:s',$end_epoch);
 
       $sub_array[]=$row[0]; 
       $sub_array[]=$row[1]; 
       $sub_array[]=$call_time; 
       $sub_array[]=$end_time; 
       $sub_array[]=$length_in_min; 
        
        
       $data[] = $sub_array;
   }


   $output = array(
       "draw"    => 100,
       "recordsTotal"  => $row_count,
       "recordsFiltered" =>$row_count,
       "data"    => $data
   );
}


if($action=="obd_voice"){
   $smtp="SELECT count(*) as total, list_id,username,pulse,campaign_id,audio_name,recording_length, sum(amount) as amount,COUNT(CASE WHEN status ='NEW' then 1 ELSE NULL END) as 'Not_Call',COUNT(CASE WHEN status ='NOANSWER' then 1 ELSE NULL END) as 'NOANSWER',COUNT(CASE WHEN status ='ANSWER' then 1 ELSE NULL END) as 'ANSWER',entry_date  FROM `vertage_list`  $permission_username  group by list_id  ";
   $res=mysqli_query($conn,$smtp);
   $row_count=mysqli_num_rows($res);


   $data = array();
   while($row = mysqli_fetch_array($res)){  
       $sub_array = array(); 
       $pulse=$row['pulse'];
       $total=$row['total'];
       $audio_name=$row['audio_name'];
       $recording_length=$row['recording_length'];
       $pulse=$row['pulse'];
       $pulse=$row['pulse'];
       $amount=$row['amount'];
       $entry_date=$row['entry_date']; 
       $Not_Call=$row['Not_Call'];
       $NOANSWER=$row['NOANSWER'];
       $ANSWER=$row['ANSWER'];
       if($Not_Call>$total){
        $call_status="<span class='process'>Process..</span>";
    }else{
        $call_status="<span class='completed'>Completed</span>";
    }
    $dial_number=$total-$Not_Call;

    $sub_array[]=$row['campaign_id']; 
    $sub_array[]=$row['list_id']; 
    $sub_array[]=$row['username']; 
    $sub_array[]="<p>$audio_name</p><p>Duration: $recording_length Sec</p>"; 
    $sub_array[]=''; 
    $sub_array[]=''; 
    $sub_array[]= "<p>Credit: ".$pulse." </p><p> Total Contact : $total</p><p> Total Ammount: $amount</p>"; 
    $sub_array[]= $entry_date; 
    $sub_array[]=  $call_status ; 
    $sub_array[]=$dial_number; 
    $sub_array[]= $ANSWER; 
    $sub_array[]= $NOANSWER; 
    $sub_array[]= 0; 
    $sub_array[]= 0; 
    $sub_array[]= 0; 
    $sub_array[]= 0; 
    $sub_array[]= 0; 
    $data[] = $sub_array;
}


$output = array(
   "draw"    => 100,
   "recordsTotal"  => $row_count,
   "recordsFiltered" =>$row_count,
   "data"    => $data
);
}

echo json_encode($output);
?>
