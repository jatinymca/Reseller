<?php
require('../configuration/c_config.php');
require('dynamic_sql_command.php');
require('../configuration/function.php');

if (isset($_GET["action"]))       {$action=$_GET["action"];}
elseif (isset($_POST["action"]))  {$action=$_POST["action"];}
if (isset($_GET["ivr_id"]))       {$ivr_id=$_GET["ivr_id"];}
elseif (isset($_POST["ivr_id"]))  {$ivr_id=$_POST["ivr_id"];} 
if (isset($_GET["parent_id"]))       {$parent_id=$_GET["parent_id"];}
elseif (isset($_POST["parent_id"]))  {$parent_id=$_POST["parent_id"];} 
if (isset($_GET["selfId"]))       {$selfId=$_GET["selfId"];}
elseif (isset($_POST["selfId"]))  {$selfId=$_POST["selfId"];} 
if (isset($_GET["data_tbl"]))       {$data_tbl=$_GET["data_tbl"];}
elseif (isset($_POST["data_tbl"]))  {$data_tbl=$_POST["data_tbl"];}
if (isset($_GET["id"]))       {$id=$_GET["id"];}
elseif (isset($_POST["id"]))  {$id=$_POST["id"];} 
if (isset($_GET["campaign_id"]))       {$campaign_id=$_GET["campaign_id"];}
elseif (isset($_POST["campaign_id"]))  {$campaign_id=$_POST["campaign_id"];} 
if (isset($_GET["user_id"]))       {$user_id=$_GET["user_id"];}
elseif (isset($_POST["user_id"]))  {$user_id=$_POST["user_id"];}  
if (isset($_GET["group_id"]))       {$group_id=$_GET["group_id"];}
elseif (isset($_POST["group_id"]))  {$group_id=$_POST["group_id"];} 
if (isset($_GET["credit_request_id"]))       {$credit_request_id=$_GET["credit_request_id"];}
elseif (isset($_POST["credit_request_id"]))  {$credit_request_id=$_POST["credit_request_id"];} 

if (isset($_GET["request_name"]))       {$request_name=$_GET["request_name"];}
elseif (isset($_POST["request_name"]))  {$request_name=$_POST["request_name"];} 
if (isset($_GET["request_type"]))       {$request_type=$_GET["request_type"];}
elseif (isset($_POST["request_type"]))  {$request_type=$_POST["request_type"];}  
if (isset($_GET["group_name"]))       {$group_name=$_GET["group_name"];}
elseif (isset($_POST["group_name"]))  {$group_name=$_POST["group_name"];}  

if (isset($_GET["ivr_name"]))       {$ivr_name=$_GET["ivr_name"];}
elseif (isset($_POST["ivr_name"]))  {$ivr_name=$_POST["ivr_name"];}  
if (isset($_GET["extension"]))       {$extension=$_GET["extension"];}
elseif (isset($_POST["extension"]))  {$extension=$_POST["extension"];}  



$stmtf="SELECT * FROM `vertage_groups` WHERE group_id='$group_id'";
$rsltf=mysqli_query($conn,$stmtf);
$row=mysqli_fetch_array($rsltf);
$group_name=$row['group_name'];
$_POST['group_name']=$group_name;

if($action=='add_plan'){
  $plan_name=$_POST['plan_name'];
  $_POST['assign_date']=$now;
  $_POST['user_id']=$login_id;

  $smtp = "SELECT * FROM  vertage_voice_plan_list  WHERE  plan_id='$plan_id'";
  $res= mysqli_query($conn,$smtp);
  if(mysqli_num_rows($res)>0){
   $_sTableName = 'vertage_voice_plan_list';
   $_sMatchFld = 'plan_id';
   $_iRecId = $_POST['plan_id'];

   update_data($_sTableName, $_POST, $conn, $_sMatchFld, $_iRecId);   
   $result = array(
    "message" => 'successfully',
    "response_code" => '3001',
    "heading" => 'update status',
    "text" => 'update status',
    "icon" => 'error'
  );

 }else{


   insert_data('vertage_voice_plan_list',$_POST,$conn);
   $result = array(
    "message" => 'Successfully',
    "response_code" => '3001',
    "heading" => 'Case status Add to successfully',
    "text" => 'Assigned the ticket',
    "icon" => 'success'
  );

 }

}

if($action=='add_Credit_Request'){

  $_POST['username']=$_POST['login_id']; 
  $request_name=$_POST['request_name'];
  $request_type=$_POST['request_type'];
  $request_amount=$_POST['request_amount']; 
  $_POST['assign_date']=$now; 


  insert_data('credit_request',$_POST,$conn);
  $result = array(
    "message" => 'Successfully',
    "response" => '200',
    "heading" => '  Added successfully',
    "text" => 'Assigned  ',
    "icon" => 'success'
  ); 
}

if($action=='caller_id_post'){

  $_POST['username']=$_POST['login_id']; 
  $caller_id=$_POST['caller_id'];  
  $_POST['assign_date']=$now; 


  insert_data('voice_caller_id',$_POST,$conn);
  $result = array(
    "message" => 'Successfully',
    "response" => '200',
    "heading" => '  Added successfully',
    "text" => 'Assigned  ',
    "icon" => 'success'
  ); 
}

if($action=='obd_my_contact'){

   $username =$_POST['username']; 
  $_POST['status']= 'NEW'; 
  $_POST['list_id']= '998'; 
  $campaign_id=$_POST['campaign_id'];
  $phone_number=$_POST['phone_number']; 
  $_POST['entry_date']=$now; 


  insert_data('vertage_list',$_POST,$conn);
  $result = array(
    "message" => 'Successfully',
    "response_code" => '200',
    "heading" => '  Added successfully',
    "text" => 'Assigned  ',
    "icon" => 'success'
  ); 
}


if($action=='create_ivr'){

    $_POST['user']=$_POST['login_id']; 
    $_POST['unique_id']=uniqid();
    $ivr_name=$_POST['ivr_name'];
    $extension=$_POST['extension']; 

// $_POST['assign_date']=$now;  
  insert_data('inbound_dids',$_POST,$conn);
  $result = array(
    "message" => 'Successfully',
    "response" => '200',
    "heading" => ' ivr Added successfully',
    "text" => 'Assigned  ',
    "icon" => 'success'
  ); 
}
// ivr_menu
if($action=='ivr_menu'){ 

  $IVR_id=$_POST['IVR_id'];
  $NODE_id=$_POST['NODE_id']; 

  $ivr_menu_name=$_POST['ivr_menu_name'];
  $audio=$_POST['audio'];
  $allowed_input=$_POST['allowed_input']; 
  $input_timeout=$_POST['input_timeout']; 
  $text_speak=$_POST['text_speak']; 
  $language=$_POST['language']; 
  $gender=$_POST['gender']; 
  $Wait_second_prompt=$_POST['Wait_second_prompt']; 
  $event_callback=$_POST['event_callback']; 
  $event_callback_url=$_POST['event_callback_url']; 

  $stmtf="DELETE FROM `vertage_ivr_menu` WHERE  IVR_id='$IVR_id' and NODE_id='$NODE_id' "; 
  $rsltf=mysqli_query($conn,$stmtf);
  $stmtf="SELECT * FROM `vertage_ivr_menu` WHERE  IVR_id='$IVR_id' and NODE_id='$NODE_id' "; 
  $rsltf=mysqli_query($conn,$stmtf);
  $row=mysqli_num_rows($rsltf);
  if($row==0){ 
    insert_data('vertage_ivr_menu',$_POST,$conn);
    $result = array(
      "message" => 'IVR Added Successfully',
      "response" => '200',
      "heading" => ' IVR Added successfully',
      "text" => 'Assigned  ',
      "icon" => 'success'
    ); 
  }  
}
// get_input_ivr
if($action=='get_input_form'){ 

  $IVR_id=$_POST['IVR_id'];
  $NODE_id=$_POST['NODE_id'];

  $get_input_name=$_POST['get_input_name'];
  $audio=$_POST['audio']; 
  $input_timeout=$_POST['input_timeout']; 
  $text_speak=$_POST['text_speak']; 
  $language=$_POST['language']; 
  $gender=$_POST['gender']; 
  $Wait_second_prompt=$_POST['Wait_second_prompt']; 
  $event_callback=$_POST['event_callback']; 
  $event_callback_url=$_POST['event_callback_url']; 

  $stmtf="DELETE FROM `vertage_getinput` WHERE  IVR_id='$IVR_id' and NODE_id='$NODE_id' "; 
  $rsltf=mysqli_query($conn,$stmtf);
  $stmtf="SELECT * FROM `vertage_getinput` WHERE  IVR_id='$IVR_id' and NODE_id='$NODE_id' "; 
  $rsltf=mysqli_query($conn,$stmtf);
  $row=mysqli_num_rows($rsltf);
  if($row==0){ 
    insert_data('vertage_getinput',$_POST,$conn);
    $result = array(
      "message" => 'get_input Added successfully',
      "response" => '200',
      "heading" => ' get_input Added successfully',
      "text" => 'Assigned  ',
      "icon" => 'success'
    );
  } 
}

// set_ivr
if($action=='get_set_time'){ 

  $IVR_id=$_POST['IVR_id'];
  $NODE_id=$_POST['NODE_id'];

  $set_time_name=$_POST['set_time_name'];
  $monday=$_POST['monday']; 
  $mon_stime=$_POST['mon_stime']; 
  $mon_etime=$_POST['mon_etime'];

  $tuesday=$_POST['tuesday']; 
  $tue_stime=$_POST['tue_stime']; 
  $tue_etime=$_POST['tue_etime']; 

  $wednesday=$_POST['wednesday']; 
  $wed_stime=$_POST['wed_stime']; 
  $wed_etime=$_POST['wed_etime'];

  $thursday=$_POST['thursday']; 
  $thurs_stime=$_POST['thurs_stime']; 
  $thurs_etime=$_POST['thurs_etime']; 

  $friday=$_POST['friday']; 
  $fri_stime=$_POST['fri_stime']; 
  $fri_etime=$_POST['fri_etime']; 

  $saturday=$_POST['saturday'];  
  $sat_stime=$_POST['sat_stime'];  
  $sat_etime=$_POST['sat_etime'];  

  $sunday=$_POST['sunday'];  
  $sun_stime=$_POST['sun_stime'];  
  $sun_etime=$_POST['sun_etime'];  

  $stmtf="DELETE FROM `vertage_set_time` WHERE  IVR_id='$IVR_id' and NODE_id='$NODE_id' "; 
  $rsltf=mysqli_query($conn,$stmtf);
  $stmtf="SELECT * FROM `vertage_set_time` WHERE  IVR_id='$IVR_id' and NODE_id='$NODE_id' "; 
  $rsltf=mysqli_query($conn,$stmtf);
  $row=mysqli_num_rows($rsltf);
  if($row==0){  
    insert_data('vertage_set_time',$_POST,$conn);
    $result = array(
      "message" => 'set_time Added successfully',
      "response" => '200',
      "heading" => ' set_time Added successfully',
      "text" => 'Assigned  ',
      "icon" => 'success'
    );
  } 
}

if($action=='get_initial_call'){ 

  $IVR_id=$_POST['IVR_id'];
  $NODE_id=$_POST['NODE_id'];

  $initial_call=$_POST['initial_call'];
  $fromm=$_POST['fromm']; 
  $too=$_POST['too']; 
  $send_digits=$_POST['send_digits'];

  $ring_timeout=$_POST['ring_timeout']; 
  $event_callback=$_POST['event_callback']; 
  $event_callback_url=$_POST['event_callback_url']; 


  $stmtf="DELETE FROM `vertage_initial_call` WHERE  IVR_id='$IVR_id' and NODE_id='$NODE_id' "; 
  $rsltf=mysqli_query($conn,$stmtf);
  $stmtf="SELECT * FROM `vertage_initial_call` WHERE  IVR_id='$IVR_id' and NODE_id='$NODE_id' "; 
  $rsltf=mysqli_query($conn,$stmtf);
  $row=mysqli_num_rows($rsltf);
  if($row==0){  
    insert_data('vertage_initial_call',$_POST,$conn);
    $result = array(
      "message" => ' get_initial_call Added successfully',
      "response" => '200',
      "heading" => ' get_initial_call Added successfully',
      "text" => 'Assigned  ',
      "icon" => 'success'
    );
  } 
}

if($action=='get_call_forwarding'){ 

  $IVR_id=$_POST['IVR_id'];
  $NODE_id=$_POST['NODE_id'];

  $call_forwarding=$_POST['call_forwarding'];
  $fromm=$_POST['fromm']; 
  $Phone_number=$_POST['Phone_number']; 
  $send_digits=$_POST['send_digits']; 

  $ring_timeout_call=$_POST['ring_timeout_call']; 
  $forwarding_option=$_POST['forwarding_option']; 
  $alwy_dynamic_url=$_POST['alwy_dynamic_url']; 
  $ring_timeout_call=$_POST['ring_timeout_call']; 
  $event_callback=$_POST['event_callback']; 
  $event_callback_url=$_POST['event_callback_url'];  
  $Acd_call_forwarding=$_POST['Acd_call_forwarding'];  
      
 

  $stmtf="DELETE FROM `vertage_call_forwarding` WHERE  IVR_id='$IVR_id' and NODE_id='$NODE_id' "; 
  $rsltf=mysqli_query($conn,$stmtf);
  $stmtf="DELETE FROM `vertage_call_forwarding_phoneno` WHERE  IVR_id='$IVR_id' and NODE_id='$NODE_id' "; 
  $rsltf=mysqli_query($conn,$stmtf);

  $stmtf="SELECT * FROM `vertage_call_forwarding` WHERE  IVR_id='$IVR_id' and NODE_id='$NODE_id' "; 
  $rsltf=mysqli_query($conn,$stmtf);
  $row=mysqli_num_rows($rsltf);
 
  if($row==0){  
    insert_data('vertage_call_forwarding',$_POST,$conn);

     $phone_text=$_POST['phone_text'];  
       foreach ($phone_text as $key => $value) { 
          $priority=$_POST['priority'];   
        $priority=$priority[$key];
        $ins="INSERT INTO `vertage_call_forwarding_phoneno`(`IVR_id`, `NODE_id`, `phone_text`,`priority`) VALUES ('$IVR_id','$NODE_id','$value','$priority')";
        $rsltf=mysqli_query($conn,$ins);

 }
   // insert_data('vertage_call_forwarding_phoneno',$_POST,$conn);
    $result = array(
      "message" => 'get_call_forwarding Added successfully',
      "response" => '200',
      "heading" => ' get_call_forwarding Added successfully',
      "text" => 'Assigned  ',
      "icon" => 'success'
    );
  } 
}

if($action=='get_hangup_call'){ 

  $IVR_id=$_POST['IVR_id'];
  $NODE_id=$_POST['NODE_id'];

  $hangup_call=$_POST['hangup_call'];
  $hangup_reason=$_POST['hangup_reason']; 


  $stmtf="DELETE FROM `vertage_hangup_reason` WHERE  IVR_id='$IVR_id' and NODE_id='$NODE_id' "; 
  $rsltf=mysqli_query($conn,$stmtf);
  $stmtf="SELECT * FROM `vertage_hangup_reason` WHERE  IVR_id='$IVR_id' and NODE_id='$NODE_id' "; 
  $rsltf=mysqli_query($conn,$stmtf);
  $row=mysqli_num_rows($rsltf);
  if($row==0){  
    insert_data('vertage_hangup_reason',$_POST,$conn);
    $result = array(
      "message" => ' Get_hangup_call Added successfully',
      "response" => '200',
      "heading" => ' Get_hangup_call Added successfully',
      "text" => 'Assigned  ',
      "icon" => 'success'
    );
  } 
}

if($action=='get_play_audio'){ 

  $IVR_id=$_POST['IVR_id'];
  $NODE_id=$_POST['NODE_id'];

  $play_audio=$_POST['play_audio'];
  $gender=$_POST['gender']; 
  $audio=$_POST['audio']; 
  $language=$_POST['language'];  


  $stmtf="DELETE FROM `vertage_play_audio` WHERE  IVR_id='$IVR_id' and NODE_id='$NODE_id' "; 
  $rsltf=mysqli_query($conn,$stmtf);
  $stmtf="SELECT * FROM `vertage_play_audio` WHERE  IVR_id='$IVR_id' and NODE_id='$NODE_id' "; 
  $rsltf=mysqli_query($conn,$stmtf);
  $row=mysqli_num_rows($rsltf);
  if($row==0){  
    insert_data('vertage_play_audio',$_POST,$conn);
    $result = array(
      "message" => 'Get_play_audio Added successfully',
      "response" => '200',
      "heading" => ' Get_play_audio Added successfully',
      "text" => 'Assigned  ',
      "icon" => 'success'
    );
  } 
}

if($action=='get_record_audio'){ 

  $IVR_id=$_POST['IVR_id'];
  $NODE_id=$_POST['NODE_id'];

  $record_audio=$_POST['record_audio'];
  $gender=$_POST['gender']; 
  $audio=$_POST['audio']; 
  $language=$_POST['language'];  
  $voicemail_timeout=$_POST['voicemail_timeout'];   
  $voicemail_length=$_POST['voicemail_length'];   
  $end_recording=$_POST['end_recording']; 
  $event_callback=$_POST['event_callback']; 
  $event_callback_url=$_POST['event_callback_url']; 
  $language=$_POST['language']; 



  $stmtf="DELETE FROM `vertage_record_audio` WHERE  IVR_id='$IVR_id' and NODE_id='$NODE_id' "; 
  $rsltf=mysqli_query($conn,$stmtf);
  $stmtf="SELECT * FROM `vertage_record_audio` WHERE  IVR_id='$IVR_id' and NODE_id='$NODE_id' "; 
  $rsltf=mysqli_query($conn,$stmtf);
  $row=mysqli_num_rows($rsltf);
  if($row==0){  
    insert_data('vertage_record_audio',$_POST,$conn);
    $result = array(
      "message" => ' Get_record_audio Added successfully',
      "response" => '200',
      "heading" => ' Get_record_audio Added successfully',
      "text" => 'Assigned  ',
      "icon" => 'success'
    );
  } 
}

if($action=='add_carrier'){
  $id=$_POST['id'];
  $_POST['assign_date']=$now;
  $smtp = "SELECT * FROM  vertage_trunk_carrier_groups  WHERE  id='$id'";
  $res= mysqli_query($conn,$smtp);
  if(mysqli_num_rows($res)>0){
   $_sTableName = 'vertage_trunk_carrier_groups';
   $_sMatchFld = 'carrier_id';
   $_iRecId = $_POST['carrier_id'];
   update_data($_sTableName, $_POST, $conn, $_sMatchFld, $_iRecId);   
   $result = array(
    "message" => 'successfully',
    "response" => '200',
    "heading" => 'update status',
    "text" => 'update status',
    "icon" => 'error'
  );

 }else{
  insert_data('vertage_trunk_carrier_groups',$_POST,$conn);
  $result = array(
    "message" => 'Successfully',
    "response" => '200',
    "heading" => 'Case status Add to successfully',
    "text" => 'Assigned the ticket',
    "icon" => 'success'
  );

}

}


if($action=='delete_num'){

  $phone_text=$_POST['phone_text']; 
  $NODE_id=$_POST['NODE_id']; 
  $IVR_id=$_POST['IVR_id']; 
  $select_id=$_POST['select_id'];  
 echo  $stmtf="DELETE FROM `vertage_call_forwarding_phoneno` WHERE phone_text='$phone_text' and IVR_id='$IVR_id' and NODE_id='$NODE_id'  "; 
   $res= mysqli_query($conn,$stmtf);
   $result = array(
    "message" => 'successfully',
    "response_code" => '200',
    "heading" => 'delete  ',
    "text" => '  delete',
    "icon" => 'error'
  );
}

if($action=='delete_plan'){
  $delete_id=$_POST['delete_id'];
  $_POST['assign_date']=$now;
  $smtp = "SELECT * FROM  vertage_voice_plan_list  WHERE  plan_id='$plan_id'";
  $res= mysqli_query($conn,$smtp);
  if(mysqli_num_rows($res)>0){

   $smtp="DELETE FROM `vertage_voice_plan_list` WHERE plan_id='$plan_id'";
   $res= mysqli_query($conn,$smtp);
   $result = array(
    "message" => 'successfully',
    "response_code" => '200',
    "heading" => 'update status',
    "text" => 'update status',
    "icon" => 'error'
  );

 }else{



  $result = array(
    "message" => 'UnSuccessfully',
    "response_code" => '500',
    "heading" => 'Case status Add to successfully',
    "text" => 'Assigned the ticket',
    "icon" => 'success'
  );

}

}

if($action=='delete_carrier'){
  $delete_id=$_POST['delete_id'];

  $smtp = "SELECT * FROM  vertage_trunk_carrier_groups  WHERE id='$delete_id'";
  $res= mysqli_query($conn,$smtp);
  if(mysqli_num_rows($res)>0){

   echo  $smtp="DELETE FROM `vertage_trunk_carrier_groups` WHERE id='$delete_id'";
   $res= mysqli_query($conn,$smtp);
   $result = array(
    "message" => 'successfully',
    "response_code" => '200',
    "heading" => 'update status',
    "text" => 'update status',
    "icon" => 'error'
  );

 }else{
 
  $result = array(
    "message" => 'UnSuccessfully',
    "response_code" => '500',
    "heading" => 'Case status Add to successfully',
    "text" => 'Assigned the ticket',
    "icon" => 'success'
  );

}

}


if($action=='delete_ivr'){
  $delete_id=$_POST['delete_id']; 

  $smtp="DELETE FROM `inbound_dids` WHERE unique_id='$delete_id'";  
  $res= mysqli_query($conn,$smtp);
  $smtp="DELETE FROM `vertage_call_forwarding` WHERE IVR_id='$delete_id'";  
  $res= mysqli_query($conn,$smtp);
  $smtp="DELETE FROM `vertage_call_forwarding_phoneno` WHERE IVR_id='$delete_id'";  
  $res= mysqli_query($conn,$smtp);
  $smtp="DELETE FROM `vertage_initial_call` WHERE IVR_id='$delete_id'";  
  $res= mysqli_query($conn,$smtp);
  $smtp="DELETE FROM `vertage_ivr_menu` WHERE IVR_id='$delete_id'";  
  $res= mysqli_query($conn,$smtp);
  $smtp="DELETE FROM `vertage_getinput` WHERE IVR_id='$delete_id'";  
  $res= mysqli_query($conn,$smtp);
  $smtp="DELETE FROM `vertage_hangup_reason` WHERE IVR_id='$delete_id'";  
  $res= mysqli_query($conn,$smtp);
  $smtp="DELETE FROM `vertage_play_audio` WHERE IVR_id='$delete_id'";  
  $res= mysqli_query($conn,$smtp);
  $smtp="DELETE FROM `vertage_record_audio` WHERE IVR_id='$delete_id'";  
  $res= mysqli_query($conn,$smtp);
  $smtp="DELETE FROM `vertage_set_time` WHERE IVR_id='$delete_id'";  
  $res= mysqli_query($conn,$smtp);
   $smtp="DELETE FROM `vertage_missedcall` WHERE IVR_id='$delete_id'";  
  $res= mysqli_query($conn,$smtp);
  $smtp="DELETE FROM `flow_chart_ivr` WHERE IVR_id='$delete_id'";  
  $res= mysqli_query($conn,$smtp); 
  $result = array(
    "message" => 'successfully',
    "response_code" => '200',
    "heading" => 'update status',
    "text" => 'update status',
    "icon" => 'error'
  );

}


if($action=='add_credit'){
  $login_id=$_POST['login_id'];  
  $user_id=$_POST['user_id'];
  $_POST['cureent_date']=$now;
  $credit_amount=$_POST['credit_amount']; 
  $Validity=$_POST['voice_credit_validity']; 
  $promotion_type=$_POST['promotion_type']; 


  if($promotion_type=="Voice" && $voice_credit_amount>=$credit_amount){
   $totalreult = "1"; 
 }
 else if($promotion_type=="SMS" && $sms_promo_allocate_unit>=$credit_amount){
   $totalreult = "1"; 
 }
 else if( $promotion_type=="Email" && $email_promo_allocate_unit>=$credit_amount){
   $totalreult = "1"; 
 }
 else{
  $totalreult = "";
}

if( $totalreult=="1"){  

  $smtp = "SELECT * FROM users WHERE login_id='$user_id' ";
  $res= mysqli_query($conn,$smtp);
  if(mysqli_num_rows($res)>0){

    $_sTableName = 'vertage_voice_credit';
    $_sMatchFld = 'userid';
    $_iRecId = $_POST['userid'];

    insert_data('vertage_voice_credit',$_POST,$conn);


    if($promotion_type=="Voice")
    {
     $SQL="voice_credit_amount=voice_credit_amount+$credit_amount,voice_credit_validity='$Validity'";
     $ASQL="voice_credit_amount=voice_credit_amount-$credit_amount";
   }
   else if($promotion_type=="SMS")
   {
    $SQL="sms_promo_allocate_unit=sms_promo_allocate_unit+$credit_amount,voice_credit_validity='$Validity'";
    $ASQL="sms_promo_allocate_unit=sms_promo_allocate_unit-$credit_amount";

  }
  else if($promotion_type=="Email")
  {
    $SQL="email_promo_allocate_unit=email_promo_allocate_unit+$credit_amount,voice_credit_validity='$Validity'";
    $ASQL="email_promo_allocate_unit=email_promo_allocate_unit-$credit_amount";

  }

  if($credit_request_id){
   $credit_query="UPDATE credit_request SET status='Completed' WHERE request_id ='$credit_request_id'";
   $credit_res= mysqli_query($conn,$credit_query);
 }

 $smtp1="UPDATE users SET  $SQL WHERE login_id='$user_id'";
 $Asmtp1="UPDATE users SET  $ASQL WHERE login_id='$login_id'";


 $res= mysqli_query($conn,$smtp1);
 $Ares= mysqli_query($conn,$Asmtp1);



 $result = array(
  "message" => 'Credit Added successfully',
 "response" => '200',
  "heading" => 'update status',
  "text" => 'update status',
  "icon" => 'error'
);

}else{


  $result = array(
    "message" => 'Error',
    "response" => '200',
    "heading" => 'Case status Add to successfully',
    "text" => 'Assigned the ticket',
    "icon" => 'success'
  );

}

}else{


  $result = array(
    "message" => 'Balance not available, Kindly contact to admin. ',
    "response" => '200',
    "heading" => 'Error',
    "text" => 'Assigned the ticket',
    "icon" => 'success'
  );

}

}


echo json_encode($result);
