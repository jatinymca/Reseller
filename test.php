<?php

require('configuration/c_config.php');
 $action=$_GET['action'];
 
// ${action}, ${CALLERID(dnid)},${callanstime},${cli},${did},${callansepoch},${uniqueid}
$now=date('Y-m-d H:i:s');
$epoch=time();
//$action = $argv[1];
 
$agivars = array();
 while (!feof(STDIN)) {
     $agivar = trim(fgets(STDIN));
     if ($agivar === '') {
         break;
     }
     $agivar = explode(':', $agivar);
     $agivars[$agivar[0]] = trim($agivar[1]);
 }
 extract($agivars);
 


echo $action;

 if($action=='incoming'){
 

$Query="INSERT INTO `live_inbound`(`uniqueid`,  `caller_id`, `extension`, `customer_phone`, `start_time`,`start_epoch`) VALUES ('$agi_uniqueid', '$agi_callerid','$agi_dnid','$agi_callerid','$now','$epoch')";
echo $Query."\n";
$result = mysqli_query($conn,$Query);
$Query="INSERT INTO `inbound_log`(`uniqueid`,  `caller_id`, `extension`, `customer_phone`, `start_time`,`start_epoch`) VALUES ('$agi_uniqueid', '$agi_callerid','$agi_dnid','$agi_callerid','$now','$epoch')";
echo $Query."\n";
$result = mysqli_query($conn,$Query);



$query =  "SELECT IVR_flow,unique_id FROM `inbound_dids` WHERE extension='$agi_dnid'   LIMIT 1";
echo $query;
echo "\n";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
$IVR_id = $row['unique_id'];

$query =  "SELECT node_name,node FROM `flow_chart_ivr` WHERE ivr_id='$IVR_id' and node_name!='start_call' order by id  LIMIT 1";
echo $query;
echo "\n";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
$node_name = $row['node_name'];
$node_id = $row['node'];

echo "SET VARIABLE IVR_flow " .$node_name."\n";
echo "SET VARIABLE IVR_id " .$IVR_id."\n";
echo "SET VARIABLE Node_id " .$node_id."\n";
 
  $action=$node_name;
}

#####################Second Level ##################

if($action=='ivr_menu_hangup'){
//${action},${prompt},${IVR_id},${Node_id}
//ivr_menu_hangup,3,636a5bfaebffd,2;


$prompt = $argv[2];
$IVR_id = $argv[3];
$node_id = $argv[4];
		echo $Query =  "SELECT * FROM `vertage_ivr_menu` WHERE ivr_id='$IVR_id' and NODE_id='$node_id' order by id  LIMIT 1";
 		$result = mysqli_query($conn,$Query);
		$row = mysqli_fetch_array($result);
		echo $prompt_option=$row['allowed_input'];
		$prompt_option_array=explode(',',$prompt_option);
		if(!empty($prompt)){
			if(in_array($prompt[0], $prompt_option_array)){
		           $add_extra_node=2;
		           $final_node=$prompt[0]+$add_extra_node;
			      $output_node="output_node_$final_node";
		     	 //worng input 
				}else{

		     	 $output_node='output_node_1';
		     	 //worng input 
			}
		 }else{

		 	$output_node='output_node_2';
		 	 // No Input
		 }

	 
		$Query =  "SELECT $output_node FROM `flow_chart_ivr` WHERE ivr_id='$IVR_id' and node='$node_id' order by id LIMIT 1";
		$result = mysqli_query($conn,$Query);
		echo $Query."\n";
		$row = mysqli_fetch_array($result);
		$node_id=$row[0];

		  $query =  "SELECT node_name,ivr_id,node FROM `flow_chart_ivr` WHERE ivr_id='$IVR_id' and node='$node_id' order by id LIMIT 1";
		$result = mysqli_query($conn,$query);
		echo $query."\n";
		$row = mysqli_fetch_array($result);
		echo $count_num=mysqli_num_rows($result);
	  
 
 
}




#########################end level ###############



if($action=='play_audio'){
 
$Query =  "SELECT * FROM `vertage_play_audio` WHERE ivr_id='$IVR_id' and NODE_id='$node_id' order by id  LIMIT 1";
echo $Query."\n";
$result = mysqli_query($conn,$Query);
$row = mysqli_fetch_array($result);
$play_audio_file = $row['audio'];
 

echo "SET VARIABLE play_audio_file " .$play_audio_file."\n";
 
}

if($action=='Get_input'){
 
$Query =  "SELECT * FROM `vertage_getinput` WHERE ivr_id='$IVR_id' and NODE_id='$node_id' order by id  LIMIT 1";
echo $Query."\n";
$result = mysqli_query($conn,$Query);
$row = mysqli_fetch_array($result);
$play_audio_file = $row['audio'];
echo "SET VARIABLE play_audio_file " .$play_audio_file."\n";
 
}

if($action=='Set_Time'){
 
$Query =  "SELECT * FROM `vertage_getinput` WHERE ivr_id='$IVR_id' and NODE_id='$node_id' order by id  LIMIT 1";
echo $Query."\n";
$result = mysqli_query($conn,$Query);
$row = mysqli_fetch_array($result);
$play_audio_file = $row['audio'];
echo "SET VARIABLE play_audio_file " .$play_audio_file."\n";
 
}





if($action=='ivr_menu'){
///${action},${uniqueid},${prompt}
 
$prompt = $argv[2];

 
$result = mysqli_query($conn,$Query);
$Query="UPDATE `inbound_log` SET  comment_a='$prompt[0]' WHERE uniqueid='$agi_uniqueid'";
echo $Query."\n";
$result = mysqli_query($conn,$Query);
$Query =  "SELECT * FROM `vertage_ivr_menu` WHERE ivr_id='$IVR_id' and NODE_id='$node_id' order by id  LIMIT 1";
echo $Query."\n";
$result = mysqli_query($conn,$Query);
$row = mysqli_fetch_array($result);
$play_audio_file = $row['audio'];
echo "SET VARIABLE play_audio_file " .$play_audio_file."\n";
 
}


if($action=='call_forwarding'){
///${action},${uniqueid},${prompt}
$Set_file_path="/var/spool/asterisk/monitor/vertageOBD/";
$set_dir=$Set_file_path.date('Y-m-d').'/';
$recording_path=date('Ymd').date('his').'_'.$agi_uniqueid.'_'.$agi_calleridname.'.wav';

 
$Query="INSERT INTO `vertage_closer_log`(`call_date`, `start_epoch`, `status`, `phone_number`, `user`,`uniqueid`,`customer_phone`,`recording_path`) VALUES ('$now','$epoch','INCALL','7001','','$agi_uniqueid','$agi_calleridname','$recording_path')";
echo $Query."\n";
$result = mysqli_query($conn,$Query);
echo "SET VARIABLE recording_path " .$set_dir.$recording_path."\n";

 
}


###################################################################################
################## Node Hangup ################################


if($action=='get_input_cmpt'){
 
$Query="UPDATE `inbound_log` SET  comment_a='$prompt[0]' WHERE uniqueid='$agi_uniqueid'";
echo $Query."\n";
$result = mysqli_query($conn,$Query);


}


if($action=='incomin_hangup'){
//${action},${uniqueid},${endepoch},${digit},${IVR_id},${Node_id},${MONITOR_FILENAME}
$dialstatus = $argv[2];
 
$Query="DELETE FROM `live_inbound` WHERE uniqueid='$agi_uniqueid'";
echo $Query."\n";
$result = mysqli_query($conn,$Query);
$Query="UPDATE `inbound_log` SET  end_epoch='$epoch' WHERE uniqueid='$agi_uniqueid'";
echo $Query."\n";
$result = mysqli_query($conn,$Query);

$Query="UPDATE `vertage_closer_log` SET  status='$dialstatus', end_epoch='$epoch'  WHERE uniqueid='$agi_uniqueid'   and status='INCALL'";
echo $Query."\n";
$result = mysqli_query($conn,$Query);

}




if($action=='call_forwarding_hangup'){
//${action},${digit},${IVR_id},${Node_id},${MONITOR_FILENAME},${status}
 
$recording_path = $argv[5];
$status = $argv[6];
 
$Query="UPDATE `vertage_closer_log` SET  status='$status',end_epoch='$epoch', recording_path='$recording_path'   WHERE uniqueid='$agi_uniqueid'  ";
echo $Query."\n";
$result = mysqli_query($conn,$Query);


 
}



?>

 