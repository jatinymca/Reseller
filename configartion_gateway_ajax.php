<?php
require('configuration/c_config.php');

if (isset($_GET["action"]))       {$action=$_GET["action"];}
elseif (isset($_POST["action"]))  {$action=$_POST["action"];}
if (isset($_GET["pilot_number"]))       {$pilot_number=$_GET["pilot_number"];}
elseif (isset($_POST["pilot_number"]))    {$pilot_number=$_POST["pilot_number"];}
if (isset($_GET["did_start"]))       {$did_start=$_GET["did_start"];}
elseif (isset($_POST["did_start"]))    {$did_start=$_POST["did_start"];}
if (isset($_GET["did_end"]))       {$did_end=$_GET["did_end"];}
elseif (isset($_POST["did_end"]))    {$did_end=$_POST["did_end"];}
if (isset($_GET["group_id"]))       {$group_id=$_GET["group_id"];}
elseif (isset($_POST["group_id"]))  {$group_id=$_POST["group_id"];}
if (isset($_GET["dialable_channel"]))       {$dialable_channel=$_GET["dialable_channel"];}
elseif (isset($_POST["dialable_channel"]))    {$dialable_channel=$_POST["dialable_channel"];}
if (isset($_GET["trunk_type"]))       {$trunk_type=$_GET["trunk_type"];}
elseif (isset($_POST["trunk_type"]))    {$trunk_type=$_POST["trunk_type"];}
if (isset($_GET["SIP_no"]))       {$SIP_no=$_GET["SIP_no"];}
elseif (isset($_POST["SIP_no"]))    {$SIP_no=$_POST["SIP_no"];}
if (isset($_GET["gateway_ip"]))       {$gateway_ip=$_GET["gateway_ip"];}
elseif (isset($_POST["gateway_ip"]))    {$gateway_ip=$_POST["gateway_ip"];} 
if (isset($_GET["prefix"]))       {$prefix=$_GET["prefix"];}
elseif (isset($_POST["prefix"]))    {$prefix=$_POST["prefix"];} 
if (isset($_GET["channel_number"]))       {$channel_number=$_GET["channel_number"];}
elseif (isset($_POST["channel_number"]))    {$channel_number=$_POST["channel_number"];} 
if (isset($_GET["campaign_id"]))       {$campaign_id=$_GET["campaign_id"];}
elseif (isset($_POST["campaign_id"]))    {$campaign_id=$_POST["campaign_id"];}  
if (isset($_GET["gateway_id"]))       {$gateway_id=$_GET["gateway_id"];}
elseif (isset($_POST["gateway_id"]))    {$gateway_id=$_POST["gateway_id"];}  
if (isset($_GET["ip_address"]))       {$ip_address=$_GET["ip_address"];}
elseif (isset($_POST["ip_address"]))    {$ip_address=$_POST["ip_address"];} 


$stmtf="SELECT * FROM `vertage_groups` WHERE group_id='$group_id'";
$rsltf=mysqli_query($conn,$stmtf);
$row=mysqli_fetch_array($rsltf);
$group_name=$row['group_name'];

$stmtf="SELECT * FROM `vertage_trunk_carrier_groups` WHERE group_id='$group_id'";
$rsltf=mysqli_query($conn,$stmtf);
$row=mysqli_fetch_array($rsltf);
$carrier_id=$row['carrier_id'];
$carrier_name=$row['carrier_name'];

if($action=='add_PRI_Card'){

 $stmtf="SELECT * FROM `vertage_GSM_GATEWAY` WHERE pilot_number='$pilot_number'";
 $rsltf=mysqli_query($conn,$stmtf);

 $rows_to_printf = mysqli_num_rows($rsltf);
 if($rows_to_printf==0){

    $smtp1="INSERT INTO `vertage_GSM_GATEWAY`(`group_id`, `group_name`, `pilot_number`,`carrier_name`,`carrier_type`, `did_start`, `did_end`, `dialable_channel`, `create_date`) VALUES ('$group_id','$group_name','$pilot_number','$carrier_name','$carrier_type','$did_start','$did_end','$dialable_channel','$now')";

  $rsltf=mysqli_query($conn,$smtp1);
  $insert_id=mysqli_insert_id($conn);
  for ($i=$did_start; $i <=$did_end ; $i++) { 
   $smtp="INSERT INTO `vertage_GSM_GATEWAY_channels`(`gateway_id`, `pilot_number`, `dids`, `create_date`, `status`,`dialable_channel`) VALUES ('$insert_id','$pilot_number','$i','$now','IDLE','$dialable_channel')";
   $rsltf=mysqli_query($conn,$smtp);  

 } 

} 
  $result = array(
    "message" => 'successfully',
    "response_code" => '200',
    "heading" => 'update status',
    "text" => 'update status',
    "icon" => 'error'
  );
    echo json_encode($result);
}

if($action=='add_GSM_Gateway'){ 
  $stmtf="SELECT * FROM `vertage_GSM_GATEWAY` WHERE ip_address ='$ip_address'";
  $rsltf=mysqli_query($conn,$stmtf);
  $rows_to_printf = mysqli_num_rows($rsltf);
  if($rows_to_printf==0){

       $smtp1="INSERT INTO `vertage_GSM_GATEWAY`(`group_id`,`group_name`, `carrier_name`,`carrier_type`,`carrier_trunk`,  `dialable_channel`, `create_date`,`gateway_ip`) VALUES ('$group_id','$group_name','$carrier_name','$carrier_type','$SIP_no','$dialable_channel','$now','$ip_address')";
    $rsltf=mysqli_query($conn,$smtp1);
    $insert_id=mysqli_insert_id($conn);
    $did_start=101;
    $did_end=$did_start+$channel_number;
    for ($i=$did_start; $i <$did_end ; $i++) {  
             $smtp="INSERT INTO `vertage_GSM_GATEWAY_channels`(`gateway_id`, `gateway_port_prefix`, `create_date`, `status`,`dialable_channel`) VALUES ('$insert_id','$i','$now','IDLE','$dialable_channel')";
     $rsltf=mysqli_query($conn,$smtp);  
   }
   
 } 
   $result = array(
    "message" => 'successfully',
    "response_code" => '200',
    "heading" => 'update status',
    "text" => 'update status',
    "icon" => 'error'
  );
    echo json_encode($result);
}

if($action=='add_PRI_Gateway'){
  $stmtf="SELECT * FROM `vertage_GSM_GATEWAY` WHERE pilot_number='$pilot_number'";
  $rsltf=mysqli_query($conn,$stmtf);
  $rows_to_printf = mysqli_num_rows($rsltf);
  if($rows_to_printf==0){ 
     $smtp1="INSERT INTO `vertage_GSM_GATEWAY`(`group_id`, `group_name`, `carrier_name`,`carrier_type`, `pilot_number`, `did_start`, `did_end`, `dialable_channel`, `create_date`) VALUES ('$group_id','$group_name','$carrier_name','$carrier_type','$pilot_number','$did_start','$did_end','$dialable_channel','$now')";

    $rsltf=mysqli_query($conn,$smtp1);
    $insert_id=mysqli_insert_id($conn);
    for ($i=$did_start; $i <=$did_end ; $i++) { 

      $smtp="INSERT INTO `vertage_GSM_GATEWAY_channels`(`gateway_id`, `pilot_number`, `dids`, `create_date`, `status`,`dialable_channel`) VALUES ('$insert_id','$pilot_number','$i','$now','IDLE','$dialable_channel')";
      $rsltf=mysqli_query($conn,$smtp); 


    } 
  } 
    $result = array(
    "message" => 'successfully',
    "response_code" => '200',
    "heading" => 'update status',
    "text" => 'update status',
    "icon" => 'error'
  );
    echo json_encode($result);
}

  // delete chaneel
if($action=='delete_channel'){
 switch ($trunk_type) {
  // case 'PRI_Card':
 //  $table_name1='vertage_DAHDI';
  // $table_name2='vertage_DAHDI_channels';
  // break;
   case 'GSM_Gateway':
   $table_name1='vertage_GSM_GATEWAY';
   $table_name2='vertage_GSM_GATEWAY_channels';
 //  break;
 //  case 'PRI_Gateway':
 //  $table_name1='vertage_PRI_GATEWAY';
  // $table_name2='vertage_PRI_GATEWAY_channels';
   break;
   default:

   break;
 }



 $stmtf="DELETE FROM $table_name1 WHERE gt_id='$gateway_id'";
 $rsltf=mysqli_query($conn,$stmtf);
 $stmtf="DELETE FROM $table_name2 WHERE gateway_id='$gateway_id'";
 $rsltf=mysqli_query($conn,$stmtf);
 
 
}

if($action=='PRI_Card_html'){
  $html='<table class="display table datatable-example">';
  $html.='<thead>'; 
 // if($trunk_type=='GSM_Gateway'){ 
     $table_name='vertage_GSM_GATEWAY'; 
   //  $html.='<tr><th scope="col">#</th><th>Carrier Type</th><th>Pilot Number</th> <th>Group id</th> <th>   DID Start</th><th>  DID End</th><th> Channel Name</th><th> Action</th></tr>'; 
 // }elseif($trunk_type=='GSM_Gateway'){
   // $table_name='vertage_GSM_GATEWAY';
 //   $html.='<tr><th scope="col">#</th><th>carrier_name</th><th>carrier_trunk</th> <th>Group id</th>  <th> Channel Name</th><th> Action</th></tr>';
//  }elseif($trunk_type=='GSM_Gateway') {
  //  $table_name=' vertage_GSM_GATEWAY';
    $html.='<tr><th scope="col">#</th><th>Carrier Type</th><th>Carrier Trunk</th> <th>Pilot Number</th> <th>Group id</th> <th>   DID Start</th><th>  DID End</th><th> Channel Name</th><th> Action</th></tr>';  
  //}
  $html.='</thead>';
  $html.='<tbody>';
   $stmtf="SELECT * FROM vertage_GSM_GATEWAY WHERE 1 order by gt_id";  
  $rsltf=mysqli_query($conn,$stmtf);
  $i=1;
  while($row=mysqli_fetch_array($rsltf)){
     $getwayid=$row['gt_id'];
    //if($trunk_type=='PRI_Card'){ 
   //  $html.='<tr><th>'.$i.'</th><th>'.$row["carrier_type"].'</th><th>'.$row["pilot_number"].'</th> <th>'.$row["group_id"].'</th> <th>'.$row["did_start"].'</th> <th>'.$row["did_end"].'</th> <th>'.$row["dialable_channel"].'</th><th>  <a href="" class=" btn btn-xs"><i class="fa fa-trash-o" onclick="delete_channel(\'PRI_Card\',\''.$getwayid.'\')"></i></a> <a href="#!" class="btn btn-xs" onclick="get_all_channel(\'PRI_Card\',\''.$getwayid.'\')"><i class="fa fa-eye"></i></a>  </th></tr>';
 //  }elseif($trunk_type=='GSM_Gateway'){
   //  $html.='<tr><th>'.$i.'</th><th>'.$row["carrier_name"].'</th><th>'.$row["carrier_trunk"].'</th>  <th>'.$row["group_id"].'</th>  <th>'.$row["dialable_channel"].'</th><th>  <a href="#!" class="btn btn-xs"><i class="fa fa-trash-o" onclick="delete_channel(\'GSM_Gateway\',\''.$getwayid.'\')"></i></a>  <a href="#!" class="btn btn-xs" onclick="get_all_channel(\'GSM_Gateway\',\''.$getwayid.'\')"><i class="fa fa-eye"></i></a>  </th></tr>';

  // }elseif($trunk_type=='GSM_Gateway'){
     $html.='<tr><th>'.$i.'</th><th>'.$row["carrier_type"].'</th><th>'.$row["carrier_trunk"].'</th><th>'.$row["pilot_number"].'</th> <th>'.$row["group_id"].'</th> <th>'.$row["did_start"].'</th> <th>'.$row["did_end"].'</th> <th>'.$row["dialable_channel"].'</th><th>   <a href="#!" onclick="delete_channel(\'GSM_Gateway\',\''.$getwayid.'\')" class="btn btn-xs"><i class="fa fa-trash-o"></i></a>  <a href="#!" onclick="get_all_channel(\'GSM_Gateway\',\''.$getwayid.'\')" class="btn btn-xs"><i class="fa fa-eye"></i></a>   </th></tr>';


   //}
   $i++;}
   $html.='</tbody>';
   echo $html.='</table>';
 }

 if($action=='get_all_channel'){
  $html='<table class="display table datatable-example">';
  $html.='<thead>'; 
  //if($trunk_type=='PRI_Card'){ 
  //  $table_name='vertage_DAHDI_channels';
  //  $html.='<tr><th scope="col">#</th><th>Gateway Id</th><th>Pilot Number</th><th>DID Number</th><th>Status</th> </tr>'; 
 // }elseif($trunk_type=='GSM_Gateway'){
    $table_name='vertage_GSM_GATEWAY_channels';
  //  $html.='<tr><th scope="col">#</th><th>Gateway Id</th><th>Port Number</th> <th>Status</th> </tr>'; 
 // }elseif($trunk_type=='PRI_Gateway') {
  //  $table_name=' vertage_PRI_GATEWAY_channels';
    $html.='<tr><th scope="col">#</th><th>Gateway Id</th><th>Pilot Number</th><th>DID Number</th><th>Status</th> </tr>'; 
 // }
  $html.='</thead>';
  $html.='<tbody>';
   $stmtf="SELECT * FROM $table_name WHERE gateway_id='$gateway_id'";
  $rsltf=mysqli_query($conn,$stmtf);
  $i=1;
  while($row=mysqli_fetch_array($rsltf)){
  //  if($trunk_type=='PRI_Card'){ 

   //  $html.='<tr><th>'.$i.'</th><th>'.$row["gt_id"].'</th><th>'.$row["pilot_number"].'</th> <th>'.$row["dids"].'</th> <th>'.$row["status"].'</th></tr>';

  // }elseif($trunk_type=='GSM_Gateway'){
  //   $html.='<tr><th>'.$i.'</th><th>'.$row["gt_id"].'</th>  <th>'.$row["gateway_port_prefix"].'</th> <th>'.$row["status"].'</th></tr>';

  // }elseif($trunk_type=='PRI_Gateway'){
     $html.='<tr><th>'.$i.'</th><th>'.$row["gateway_id"].'</th><th>'.$row["pilot_number"].'</th> <th>'.$row["dids"].'</th> <th>'.$row["status"].'</th></tr>';


  // }
   $i++;}
   $html.='</tbody>';
   echo $html.='</table>';
 }





?>