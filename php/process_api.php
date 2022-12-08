<?php
require('../configuration/c_config.php');
  require('dynamic_sql_command.php');
$Process_name=$_SESSION['act_user']['primary_process'];
if (isset($_GET["action"]))       {$action=$_GET["action"];}
elseif (isset($_POST["action"]))  {$action=$_POST["action"];}
if (isset($_GET["Process_name"]))       {$Process_name=$_GET["Process_name"];}
elseif (isset($_POST["Process_name"]))  {$Process_name=$_POST["Process_name"];}
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


if($action=='Process_name_change'){
 
  $_SESSION['act_user']['primary_process']=$Process_name;
      
 } 
 
if($action=='Upload'){
 
	   
      	  $smtp="UPDATE `table_field_list` SET `Upload`='$Queue_key_result' WHERE Process_name='$Process_name' and field_colm='$colume_name'";mysqli_query($conn,$smtp);

			
 } 
if($action=='Unique_key'){
 
	   	      	 $smtp="UPDATE `table_field_list` SET `Unique_key`='' WHERE Process_name='$Process_name' and field_colm='$colume_name'";
	   	      	   mysqli_query($conn,$smtp);
      	      $smtp="UPDATE `table_field_list` SET `Unique_key`='$Queue_key_result' WHERE Process_name='$Process_name' and field_colm='$colume_name'";
      	   mysqli_query($conn,$smtp);

			
 } 
 if($action=='Queue_key'){
 
     
          $smtp="UPDATE `table_field_list` SET `Queue_key`='$Queue_key_result' WHERE Process_name='$Process_name' and field_colm='$colume_name'";mysqli_query($conn,$smtp);

      
 } 
  if($action=='readonly'){
 
     
          $smtp="UPDATE `table_field_list` SET `readonly`='$Queue_key_result' WHERE Process_name='$Process_name' and field_colm='$colume_name'";mysqli_query($conn,$smtp);

      
 } 
 if($action=='Primary_process'){
 
	   	      	      $smtp="UPDATE `Process_list` SET `primary_process`='' WHERE 1 ";
	   	      	   mysqli_query($conn,$smtp);
      	       $smtp="UPDATE `Process_list` SET `primary_process`='$Queue_key_result' WHERE Process_name='$Process_name'";	
      	   mysqli_query($conn,$smtp);
      	       $smtp="UPDATE `user` SET `primary_process`='$Process_name' WHERE 1";	
      	   mysqli_query($conn,$smtp);

			
 } 

if($action=='email'){
  $smtp="UPDATE `create_level` SET `Email`='$Queue_key_result' WHERE Process_name='$Process_name' and level_name='$colume_name'";
   mysqli_query($conn,$smtp);
 } 
if($action=='sms'){
  $smtp="UPDATE `create_level` SET `SMS`='$Queue_key_result' WHERE Process_name='$Process_name' and level_name='$colume_name'";
   mysqli_query($conn,$smtp);
 } 
if($action=='owner_name_assign'){
      $agent_id=$_POST['agent_id'];
    $Case_id=$_POST['Case_id'];
     
     if(count($Case_id)>0){
      foreach ($Case_id as $key => $value) {
         $smtp = "SELECT * FROM  vertage_list  WHERE  case_id='$value' LIMIT 1";
         $res= mysqli_query($conn,$smtp);
          $row=mysqli_fetch_array($res);
          $status=$row['status'];
          $owner=$row['case_owner'];

         $smtp = "UPDATE vertage_list SET case_owner='$agent_id'  WHERE    case_id='$value'";
        mysqli_query($conn,$smtp);
        $data['system_remark']=' This ticket assigned to '.$agent_id.' assign by '.$user_name ;
        $data['case_status']='assigned';
        $data['feadback']=$user_name.' Assigned the Case';
        $data['Ticket_number']=$value;
        $data['user_name']=$user_name;
        $data['user_id']=$user_id;
        $data['status']=$status;
        $data['Sub_Status']=$Sub_Status;
        $data['owner']=$owner;   
        //insert_data('Process_log', $data, $conn);
      }
  $result = array(
            "message" => 'Case assigned to successfully',
            "response_code" => '3001',
            "heading" => 'Case assigned to successfully',
            "text" => 'Assigned the ticket',
            "icon" => 'success'
             );
     }else{
         $result = array(
            "message" => 'Please Select Case Number',
            "response_code" => '2001',
            "heading" => ' Please Select Case Number',
            "text" => 'Case Number Not Selected',
            "icon" => 'error'
        );
     }

}


if($action=='create_despotion'){

    $smtp = "SELECT * FROM  dispostion  WHERE  Process_name='$Process_name' and case_status='$case_status' LIMIT 1";
   $res= mysqli_query($conn,$smtp);
   if(mysqli_num_rows($res)>0){
           $_sMatchFld='case_status';
  $_iRecId=$_POST['case_status'];
  $level_name=implode(',', $level_name);
     $_POST['level_name']=$level_name;
$ANDQuery="AND Process_name='$Process_name'";
update_data('dispostion',$_POST,$conn,$_sMatchFld,$_iRecId,$md5='', $ANDQuery);
          $result = array(
            "message" => 'Dublicate Case status ',
            "response_code" => '2001',
            "heading" => 'Dublicate Case status',
            "text" => 'Dublicate Case status',
            "icon" => 'error'
        );

   }else{
     $level_name=implode(',', $level_name);
     $_POST['level_name']=$level_name;

            $_POST['Process_name']=$Process_name;
            insert_data('dispostion',$_POST,$conn);

      $result = array(
            "message" => 'Case status Add to successfully',
            "response_code" => '3001',
            "heading" => 'Case status Add to successfully',
            "text" => 'Assigned the ticket',
            "icon" => 'success'
             );

   }

}


if($action=='accept_case'){
    $agent_id=$_POST['agent_id'];
    $Case_id=$_POST['Case_id'];
     
     if(count($Case_id)>0){
      foreach ($Case_id as $key => $value) {
          $smtp = "SELECT * FROM  vertage_list  WHERE  case_id='$value' and (case_owner IS NULL OR case_owner='') LIMIT 1";
         $res= mysqli_query($conn,$smtp);
          $row=mysqli_fetch_array($res);
          $status=$row['status'];
          $owner=$row['case_owner'];
           if(mysqli_num_rows($res)>0){
              $smtp = "UPDATE vertage_list SET case_owner='$agent_id'  WHERE  case_id='$value'";
             mysqli_query($conn,$smtp);
          }
         
      }
  $result = array(
            "message" => 'Case assigned to successfully',
            "response_code" => '3001',
            "heading" => 'Case assigned to successfully',
            "text" => 'Assigned the ticket',
            "icon" => 'success'
             );
     }else{
         $result = array(
            "message" => 'Please Select Case Number',
            "response_code" => '2001',
            "heading" => ' Please Select Case Number',
            "text" => 'Case Number Not Selected',
            "icon" => 'error'
        );
     }

}
 if($action=='delete_tbl_data'){
         $smtp="DELETE FROM $data_tbl WHERE   id='$id';";
   $res= mysqli_query($conn,$smtp);
         $result = array(
            "message" => 'successfully',
            "response_code" => '3001',
            "heading" => 'Delete ',
            "text" => 'Delete ',
            "icon" => 'error'
        );

    
}


if($action=='location_add'){
 
$city=$_POST['city'];
$zone=$_POST['zone'];
    $smtp = "SELECT * FROM  location  WHERE  city='$city' and zone='$zone' LIMIT 1";
   $res= mysqli_query($conn,$smtp);
   if(mysqli_num_rows($res)>0){
          $_sMatchFld='city';
  $_iRecId=$_POST['city'];
  
$ANDQuery="";
update_data('location',$_POST,$conn,$_sMatchFld,$_iRecId,$md5='', $ANDQuery);
          $result = array(
            "message" => 'Dublicate Case status ',
            "response_code" => '2001',
            "heading" => 'Dublicate Case status',
            "text" => 'Dublicate Case status',
            "icon" => 'error'
        );

   }else{
             insert_data('location',$_POST,$conn);

      $result = array(
            "message" => 'Case status Add to successfully',
            "response_code" => '3001',
            "heading" => 'Case status Add to successfully',
            "text" => 'Assigned the ticket',
            "icon" => 'success'
             );

   }

}

if($action=='user_group_add'){
 
$user_group=$_POST['user_group'];
$_POST['allowed_process']=implode(',', $_POST['allowed_process']);
$_POST['allowed_reports']=implode(',', $_POST['allowed_reports']);
$_POST['allowed_group']=implode(',', $_POST['allowed_group']);
$_POST['allowed_dashboard']=implode(',', $_POST['allowed_dashboard']);
 
 
   $smtp = "SELECT * FROM  process_user_groups  WHERE  user_group='$user_group'  LIMIT 1";
   $res= mysqli_query($conn,$smtp);
   if(mysqli_num_rows($res)>0){
   $_sMatchFld='user_group';
  $_iRecId=$_POST['user_group'];
  
$ANDQuery="";
update_data('process_user_groups',$_POST,$conn,$_sMatchFld,$_iRecId,$md5='', $ANDQuery);
          $result = array(
            "message" => 'Update successfully',
            "response_code" => '2001',
            "heading" => 'Update successfully',
            "text" => 'Update successfully',
            "icon" => 'error'
        );

   }else{
       
   insert_data('process_user_groups',$_POST,$conn);
      $result = array(
            "message" => 'Add to successfully',
            "response_code" => '3001',
            "heading" => ' Add to successfully',
            "text" => ' successfully',
            "icon" => 'success'
             );

   }

}
echo json_encode($result);
