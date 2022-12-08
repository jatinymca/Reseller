<?php
require('../configuration/c_config.php');
require('../configuration/function.php');
require('../permission.php');


if (isset($_GET["action"]))       {$action=$_GET["action"];}
elseif (isset($_POST["action"]))  {$action=$_POST["action"];}
if (isset($_GET["Process_name"]))       {$Process_name=$_GET["Process_name"];}
elseif (isset($_POST["Process_name"]))  {$Process_name=$_POST["Process_name"];}
if (isset($_GET["colume_name"]))       {$colume_name=$_GET["colume_name"];}
elseif (isset($_POST["colume_name"]))  {$colume_name=$_POST["colume_name"];}  
if (isset($_GET["method"]))       {$method=$_GET["method"];}
elseif (isset($_POST["method"]))  {$method=$_POST["method"];}

if (isset($_GET["method_name"]))       {$method_name=$_GET["method_name"];}
elseif (isset($_POST["method_name"]))  {$method_name=$_POST["method_name"];}
if (isset($_GET["method_value"]))       {$method_value=$_GET["method_value"];}
elseif (isset($_POST["method_value"]))  {$method_value=$_POST["method_value"];}
if (isset($_GET["Methods_massage"]))       {$Methods_massage=$_GET["Methods_massage"];}
elseif (isset($_POST["Methods_massage"]))  {$Methods_massage=$_POST["Methods_massage"];}
if (isset($_GET["Unique_key"]))       {$Unique_key=$_GET["Unique_key"];}
elseif (isset($_POST["Unique_key"]))  {$Unique_key=$_POST["Unique_key"];}
if (isset($_GET["colume_name_st"]))       {$colume_name_st=$_GET["colume_name_st"];}
elseif (isset($_POST["colume_name_st"]))  {$colume_name_st=$_POST["colume_name_st"];}
if (isset($_GET["colume_name_mt"]))       {$colume_name_mt=$_GET["colume_name_mt"];}
elseif (isset($_POST["colume_name_mt"]))  {$colume_name_mt=$_POST["colume_name_mt"];}
if (isset($_GET["colume_value"]))       {$colume_value=$_GET["colume_value"];}
elseif (isset($_POST["colume_value"]))  {$colume_value=$_POST["colume_value"];}
if (isset($_GET["tb_name"]))       {$tb_name=$_GET["tb_name"];}
elseif (isset($_POST["tb_name"]))  {$tb_name=$_POST["tb_name"];}

if (isset($_GET["group_id"]))       {$group_id=$_GET["group_id"];}
elseif (isset($_POST["group_id"]))  {$group_id=$_POST["group_id"];}

if (isset($_GET["sel_user_type"]))       {$sel_user_type=$_GET["sel_user_type"];}
elseif (isset($_POST["sel_user_type"]))  {$sel_user_type=$_POST["sel_user_type"];}

if (isset($_GET["list_id"]))       {$list_id=$_GET["list_id"];}
elseif (isset($_POST["list_id"]))  {$list_id=$_POST["list_id"];}

if (isset($_GET["template_id"]))       {$template_id=$_GET["template_id"];}
elseif (isset($_POST["template_id"]))  {$template_id=$_POST["template_id"];}

if (isset($_GET["numbers"]))       {$numbers=$_GET["numbers"];}
elseif (isset($_POST["numbers"]))  {$numbers=$_POST["numbers"];}
if (isset($_GET["date_from"]))       {$date_from=$_GET["date_from"];}
elseif (isset($_POST["date_from"]))  {$date_from=$_POST["date_from"];}
if (isset($_GET["date_to"]))       {$date_to=$_GET["date_to"];}
elseif (isset($_POST["date_to"]))  {$date_to=$_POST["date_to"];}


if($action=='fetch_campaign'){
 $sql = "SELECT * FROM `vertage_campaign` where 1 $permission_username";
 $res = mysqli_query($conn, $sql);
 $rowscount = mysqli_num_rows($res);
 while($row=mysqli_fetch_array($res)){
  $data_call=array();
  $rowscount_total=0;
  $rowscount_dial=0;
  $rowscount_pending=0;


  $sql1 ="SELECT status,count(*) FROM `vertage_list` WHERE campaign_id='".$row['campaign_id']."'   group by status";
  $res1 = mysqli_query($conn, $sql1);
  
  while($row1=mysqli_fetch_array($res1)){ 
   $status=$row1[0];
   $data_call[$status]=$row1[1];
   $rowscount_total+=$row1[1];  
}
$rowscount_pending+=$data_call['NEW'];
$rowscount_dial=$rowscount_total-$rowscount_pending;
$campaign_id=$row['campaign_id'];

echo "<tr class=\"gradeX odd\" role=\"row\" >
<td><a href=\"javascript:void(0);\">".$row['campaign_id']."</a></td>
<td><a href=\"javascript:void(0);\"> ".$row['campaign_description']."</a></td>
<td><a href=\"javascript:void(0);\"> ".$row['entry_date']."</a></td>
<td><a href=\"javascript:void(0);\"> ".$rowscount_dial."</a></td>
<td><a href=\"javascript:void(0);\">".$rowscount_pending." </a></td>
<td><a href=\"javascript:void(0);\">". $rowscount_total."</a></td>

<td><a href=\"javascript:void(0);\">Promotional</a></td>

<td><a href=\"javascript:void(0);\">".$row['status']."</a></td>
<td><a class=\"btn btn-xs\"  href=\"?page_name=my_group_modify&campaign_id=$campaign_id\">Modify</a><a href=\"javascript:void(0);\" class=\"btn btn-xs\" data-id='".$row['id']."' onclick=\"campaign_delete(this)\">Delete</a><a href=\"?page_name=Reschedule&campaign_id=$campaign_id\" class=\"btn btn-xs\">Reschedule</a><a href=\"javascript:void(0);\" class=\"btn btn-xs\" data-id='".$row['campaign_id']."' onclick=\"reset_campaign(this)\">Reset</a></td> 
</tr>";
} 
}

if($action=='ivr_report'){

   echo $sql = "SELECT * FROM `vertage_closer_log` where 1";
   $res = mysqli_query($conn, $sql); 
   while($row=mysqli_fetch_array($res)){ 
    
    $end_time=$row['end_epoch'];
    $start_time=$row['start_epoch'];
    $length_in_min= $end_time -  $start_time ; 
    $length_in_min = sprintf('%02d:%02d:%02d', ($length_in_min/3600),($length_in_min/60%60), $length_in_min%60); 

    echo "<tr class=\"gradeX odd\" role=\"row\" >
    <td><input type=\"checkbox\" id=\"#\" ></td>
    <td><a href=\"javascript:void(0);\">".$row['phone_number']."</a></td>
    <td><a href=\"javascript:void(0);\">".$row['ivr_id']."</a></td> 
    <td><a href=\"javascript:void(0);\"> ".date('D d M h:i:s',strtotime($row['call_date']))."</a></td>
    <td><a href=\"javascript:void(0);\">".$length_in_min."</a></td>
    <td><a href=\"javascript:void(0);\"> ".$row['']."</a></td>
    <td><a href=\"javascript:void(0);\"> None</a></td>
    <td><a href=\"javascript:void(0);\"> ".$row['customer_phone']."</a></td>
    <td><a href=\"javascript:void(0);\"> ".$row['status']."</a></td>
    <td><a href=\"javascript:void(0);\"> ".$row[' ']."</a></td> 
    <td><a  href=\"audio/".$row['audio_filename'].".".$row['audio_format']."\"  target=\"_blank\"> ".$row['recording_path']."</a></td>
    </tr>";
} 
}


if($action=='obd_voice'){

   echo $sql = "SELECT * FROM `vertage_list` where 1";
   $res = mysqli_query($conn, $sql); 
   while($row=mysqli_fetch_array($res)){ 
    
       echo "<tr class=\"gradeX odd\" role=\"row\" >
       
       <td><a href=\"javascript:void(0);\">".$row['campaign_id']."</a></td>
       <td><a href=\"javascript:void(0);\">".$row['username']."</a></td>
       <td><a href=\"javascript:void(0);\">".$row['']."</a></td>
       <td><a href=\"javascript:void(0);\">".$row[' ']."</a></td>
       <td><a href=\"javascript:void(0);\">".$row[' ']."</a></td>
       <td><a href=\"javascript:void(0);\">".$row[' ']."</a></td>
       <td><a href=\"javascript:void(0);\">".$row[' ']."</a></td>
       <td><a href=\"javascript:void(0);\">".$row['status']."</a></td>
       <td><a href=\"javascript:void(0);\">".$row['phone_number']."</a></td>
       <td><a href=\"javascript:void(0);\">".$row['A!']."</a></td>
       <td><a href=\"javascript:void(0);\">".$row['']."</a></td>

       </tr>";
   } 
}


if($action=='fetch_group'){

   $sql = "SELECT * FROM `vertage_campaign` where 1";
   $res = mysqli_query($conn, $sql);
   $rowscount = mysqli_num_rows($res);
   while($row=mysqli_fetch_array($res)){
      $campaign_id=$row['campaign_id'];
      echo "<tr class=\"gradeX odd\" role=\"row\" data-toggle=\"modal\" data-target=\"#myModal\">
      <td><a href=\"javascript:void(0);\">".$row['id']."</a></td>
      <td><a href=\"javascript:void(0);\"> ".$row['campaign_id']."</a></td>
      <td><a href=\"javascript:void(0);\"> ".$row['campaign_description']."</a></td>
      <td><a href=\"javascript:void(0);\">".$row['status']."</a></td>

      <td><a href=\"?page_name=my_group_modify&campaign_id=$campaign_id\" class=\"btn btn-xs\">Modify</a><a href=\"javascript:void(0);\" class=\"btn btn-xs\">Edit</a><a href=\"javascript:void(0);\" class=\"btn btn-xs\" data-id='".$row['group_id']."' onclick='group_delete(this)'>Delete</a></td>
      </tr>";
  } 
}         

if($action=='fetch_announcement'){

   $sql = "SELECT * FROM `audio_store_details` where 1  $permission_username";
   $res = mysqli_query($conn, $sql);
   $rowscount = mysqli_num_rows($res);
   while($row=mysqli_fetch_array($res)){
       $group_id=$row['id'];

       $verift_audio=$row['verift_audio'];
       if($verift_audio==1){
        $verify= 'checked';}
        else{
         $verify='';  
     }
     
     
     $html="<tr class=\"gradeX odd\" role=\"row\" data-toggle=\"modal\" data-target=\"#myModal\">
     <td><a href=\"javascript:void(0);\" onclick=\"audio_chooser('".$row['audio_filename']."')\">".$row['audio_filename']."</a></td>
     <td><a href=\"javascript:void(0);\"> ".$row['audio_format']."</a></td>
     <td><a href=\"javascript:void(0);\"> ".$row['audio_filesize']."</a></td>
     <td> <a  href=\"audio/".$row['audio_filename'].".".$row['audio_format']."\"  target=\"_blank\"> Play</a> </td>";
     if($login_id=="new123"){
       $html.="<td><input type=\"checkbox\" id='".$row['id']."' value='' ".$verify."  onclick='verify_audio(this)'>verify</td>";}
       $html.="<td><a href=\"javascript:void(0);\" class=\"btn btn-xs\" data-id='".$row['id']."' onclick='group_delete(this)'>Delete</a></td>
       </tr>";
       echo $html;
   } 
}  

if($action=='fetch_announcement1'){

   $sql = "SELECT * FROM `audio_store_details` where verift_audio='1' ";
   $res = mysqli_query($conn, $sql);
   $rowscount = mysqli_num_rows($res);
   while($row=mysqli_fetch_array($res)){
       $group_id=$row['id'];

       
       
       $html="<tr class=\"gradeX odd\" role=\"row\" data-toggle=\"modal\" data-target=\"#myModal\">
       <td><a href=\"javascript:void(0);\" onclick=\"audio_chooser('".$row['audio_filename']."')\">".$row['audio_filename']."</a></td>
       <td><a href=\"javascript:void(0);\"> ".$row['audio_format']."</a></td>
       <td><a href=\"javascript:void(0);\"> ".$row['audio_filesize']."</a></td>
       <td> <a  href=\"audio/".$row['audio_filename'].".".$row['audio_format']."\"  target=\"_blank\"> Play</a> </td>";
       
       $html.="<td><a href=\"javascript:void(0);\" class=\"btn btn-xs\" data-id='".$row['id']."' onclick='group_delete(this)'>Delete</a></td>
       </tr>";
       echo $html;
   } 
}  
//Alok

if($action=='fetch_users'){
   $sql = "SELECT * FROM users WHERE 1 $permission_username";
 $res = mysqli_query($conn, $sql);
 $html = "";
 while($row=mysqli_fetch_array($res)){
    if($row['status']==1){$status="Active";}else{$status="Inactive";}
    if($row['lockunlock']==1){$lockunlock="Active";}else{$lockunlock="Inactive";}        
    $html .= "<tr>";
    $html .= "<td ><img src=\"upload/".$row['upload_img']."\" alt=\"image\" style='width:50px;height:50px;'></td>";
    $html .= "<td>".$row['login_id']."</td>";
    $html .= "<td class=\"left\">".$row['username']."</td>";
    $html .= "<td class=\"left\">".$row['first_name']."</td>";
    $html .= "<td class=\"left\"><a href=\"tel:".$row['mobile_no']."\">".$row['mobile_no']."</a></td>";
    $html .= "<td><a href=\"mailto:".$row['email']."\">".$row['email']."</a></td>";
    $html .= "<td class=\"left\">".$row['bill_plan_type']."</td>";
    $html .= "<td class=\"left\"> ₹  ".$row['voice_credit_amount']."</td>";
    $html .= "<td>".date('d M Y',strtotime($row['create_date']))."</td>";
    $html .= "<td>".$status."</td>";
    $html .= "<td><a href=\"?page_name=user_master&edit_id=".$row['unique_login_id']."\" class=\"btn btn-primary btn-xs\"><i class=\"fa fa-pencil\"></i></a><a href=\"javascript:void(0)\" onclick=\"deleteuser(".$row['id'].")\" class=\"btn btn-danger btn-xs\" ><i class=\"fa fa-trash-o\"></i></button></td>";
    $html .= "</tr>";
    
}
echo $html;
}    


if($action=='fetch_billplan'){

  $sql = "SELECT * FROM `vertage_voice_plan_list` WHERE user_id='$login_id' OR plan_id IN('$bill_plan_type','$sms_bill_plan_type','$email_bill_plan_type')";
  $res = mysqli_query($conn, $sql);
  $html = "";
  $i=1;
  while($row=mysqli_fetch_array($res)){

    $html .= "<tr>";
    $html .= "<td >".$i."</td>";
    $html .= "<td >".$row['plan_id']."</td>";
    $html .= "<td>".$row['plan_name']."</td>";
    $html .= "<td>".$row['plan_type']."</td>";
    $html .= "<td>".$row['promotion_type']."</td>";
    $html .= "<td>".$row['plan_status']."</td>";
    $html .= "<td>".$row['plan_pulse']."</td>";
    $html .= "<td>".$row['plan_rate']."</td>"; 
    $html .= "<td>".date('d M Y',strtotime($row['assign_date']))."</td>";
        // $html .= "<td>". $row['assign_date'] ."</td>";
    $html .= "<td>".$row['user_id']."</td>"; 
    $html .= "<td><a href=\"javascript:void(0)\" class=\"btn btn-danger btn-xs\" onclick=\"delete_billplan(".$row['id'].")\"><i class=\"fa fa-trash-o\"></i></button></td>";
    $html .= "</tr>";

    $i++;}
    echo $html;
}    

#jatin 7sep 
if($action=='obd_credit_display'){

  $sql = "SELECT * FROM `vertage_voice_credit` WHERE login_id='$login_id' ORDER BY id desc ";
  $res = mysqli_query($conn, $sql);
  $html = "";
  $i=1;
  while($row=mysqli_fetch_array($res)){

    $html .= "<tr>";
    $html .= "<td >".$i."</td>";
    $html .= "<td >".$row['user_id']."</td>";
    $html .= "<td>".$row['credit_amount']."</td>";
    $html .= "<td>".$row['voice_credit_validity']."</td>";
    $html .= "<td>".$row['user_type']."</td>";
    $html .= "<td>".$row['status']."</td>";
    $html .= "<td>".date('d M Y',strtotime($row['cureent_date']))."</td>";
    $html .= "<td>".$row['payment_remark']."</td>"; 
    //$html .= "<td>".date('d M Y',strtotime($row['cureent_date']))."</td>";
        // $html .= "<td>". $row['assign_date'] ."</td>";  
    $html .= "<td><a href=\"javascript:void(0)\" class=\"btn btn-danger btn-xs\" onclick=\"delete_credits(".$row['id'].")\"><i class=\"fa fa-trash-o\"></i></button></td>";
    $html .= "</tr>";

    $i++;}
    echo $html;
}  

if($action=='generate_invoice'){ 
  $sql = "SELECT * FROM `obd_report_generate` WHERE $permission_username ";
  $res = mysqli_query($conn, $sql);
  $html = ""; 
  while($row=mysqli_fetch_array($res)){ 
    $invoice_id=$row['invoice_id'];
    $campaign_id=$row['campaign_id']; 
    $html .= "<tr>";
    $html .= "<td >".$row['invoice_id']."</td>";
    $html .= "<td >".$row['created_at']."</td>";
    $html .= "<td>".$row['Start_Date']."</td>";
    $html .= "<td>".$row['End_Date']."</td>";
    $html .= "<td>".$row['campaign_id']."</td>";
    $html .= "<td>".$row['report_type']."</td>";
    $html .= "<td>".$row[' ']."</td>";
    // $html .= "<td>".$row[' ']."</td>";
    $html .= "<td class=\"text-center\"><a href='php/invoice_report.php?invoice_id=".$invoice_id."' ><i class=\"fa fa-arrow-circle-o-down icon_d\" style=\"font-size: 16px !important;color: #b12f30;\" aria-hidden=\"true\"></i></a></td> ";

    // $html .= "<td>".date('d M Y',strtotime($row['cureent_date']))."</td>";
    // $html .= "<td>".$row['payment_remark']."</td>"; 
    //$html .= "<td>".date('d M Y',strtotime($row['cureent_date']))."</td>";
    // $html .= "<td>". $row['assign_date'] ."</td>";  
    // $html .= "<td><a href=\"javascript:void(0)\" class=\"btn btn-danger btn-xs\" onclick=\"delete_credits(".$row['id'].")\"><i class=\"fa fa-trash-o\"></i></button></td>";
    $html .= "</tr>"; 
}
echo $html;
}  


if($action=='fetch_credit_alloction'){
    $sql = "SELECT * FROM vertage_voice_credit WHERE 1";
    $res = mysqli_query($conn, $sql);
    $html = "";
    $i=1;
    while($row=mysqli_fetch_array($res)){

     if($row['status']=='unpaid'){ $th='<span class="text-danger">'.$row['status'].'</span>';}else{ $th='<span class="text-success">'.$row['status'].'</span>';} 
     $html .= "<tr>";
     $html .= "<td class=\"patient-img sorting_1\">".$i."</td>";
     $html .= "<td class=\"patient-img sorting_1\">".$row['user_id']."</td>";
     $html .= "<td> ₹ ".$row['credit_amount']."</td>";
     $html .= "<td class=\"left\">".$row['Validity']."</td>";
     $html .= "<td class=\"left\">".$th."</td>";

     $html .= "<td>".$row['payment_remark']."</td>";
     $html .= "<td>".date('d M Y',strtotime($row['create_date']))."</td>";
     $html .= "<td><a href=\"javascript:void(0)\"  class=\"btn btn-danger btn-xs\" ><i class=\"fa fa-trash-o\"></i></button></td>";
     $html .= "</tr>";

     $i++;}
     echo $html;
 }   

 if($action=='fetch_carrier'){
    $sql = "SELECT * FROM `vertage_trunk_carrier_groups` WHERE 1";
    $res = mysqli_query($conn, $sql);
    $html = "";
    $i=1;
    while($row=mysqli_fetch_array($res)){
        $id=$row['id'];
        $html .= "<tr>";
        $html .= "<td >".$i."</td>";
        $html .= "<td >".$row['carrier_name']."</td>";
        $html .= "<td>".$row['carrier_type']."</td>";
        $html .= "<td>".$row['group_name']."</td>";

        $html .= "<td>".date('d M Y',strtotime($row['create_date']))."</td>";
        $html .= "<td><a href=\"javascript:void(0)\" onclick=\"delete_carrier('".$id."')\" class=\"btn btn-danger btn-xs\" ><i class=\"fa fa-trash-o\"></i></button></td>";
        $html .= "</tr>";
        
        $i++;}
        echo $html;
    }  

    if($action=='display_ivr'){
        $sql = "SELECT * FROM `inbound_dids` WHERE 1 $permission_username";
        $res = mysqli_query($conn, $sql);
        $html = "";
        $i=1;
        while($row=mysqli_fetch_array($res)){
         $unique_id=$row['unique_id'];
         $html .= "<tr>"; 
         $html .= "<td >".$row['ivr_name']."</td>";
         $html .= "<td ><a href=\"?page_name=create_ivr&request_id=$unique_id\">".$row['unique_id']."</td>";
         $html .= "<td>".$row['extension']."</td>";
         $html .= "<td>".$row['user']."</td>"; 
         $html .= "<td><a href=\"javascript:void(0)\" onclick=\"delete_ivr('".$unique_id."')\" class=\"btn btn-danger btn-xs\" ><i class=\"fa fa-trash-o\"></i></button></td>";
         $html .= "</tr>";
         
         $i++;}
         echo $html;
     }  



     if($action=='fetch_sms_phonebook_group'){

        $sql = "SELECT * FROM `vertage_sms_phonebook_groups` where username='$login_id'";    
        $res = mysqli_query($conn, $sql);
        $rowscount = mysqli_num_rows($res);

        while($row=mysqli_fetch_array($res)){

          $group_id=$row['group_id'];

          echo "<tr class=\"gradeX odd\" role=\"row\" data-toggle=\"modal\" data-target=\"#myModal\">
          <td><a href=\"javascript:void(0);\">".$row['group_id']."</a></td>
          <td><a href=\"javascript:void(0);\"> ".$row['group_name']."</a></td>
          <td><a href=\"javascript:void(0);\"> ".$row['group_descreption']."</a></td>
          <td><a href=\"javascript:void(0);\">".$row['active']."</a></td>";

          echo '<td><a class="btn btn-xs"  href="javascript::void(0);" data-toggle="modal" data-target="#ModifySMSPhonebookGroup_model" data-id="'.$group_id.'" data-name="'.$row["group_name"].'" data-descreption="'.$row["group_descreption"].'" data-active="'.$row["active"].'" onclick="smsphonebookgroupeditbtn(this);" > Modify</a><a href="javascript:void(0);" class="btn btn-xs" data-id='.$row["group_id"].' onclick="sms_phonebook_group_delete(this)">Delete</a></td>
          </tr>';
      } 
  } 


  if($action=='fetch_sms_contact'){

    $sql = "SELECT * FROM `sms_contact` where group_id='$group_id' and username='$login_id'";    
    $res = mysqli_query($conn, $sql);
    $rowscount = mysqli_num_rows($res);
    while($row=mysqli_fetch_array($res)){

        $contact_id=$row['contact_id'];

        echo "<tr class=\"gradeX odd\" role=\"row\" data-toggle=\"modal\" data-target=\"#myModal\">
        <td><a href=\"javascript:void(0);\"> ".$row['firstname']."</a></td>
        <td><a href=\"javascript:void(0);\"> ".$row['lastname']."</a></td>
        <td><a href=\"javascript:void(0);\">".$row['mobile']."</a></td>
        <td><a href=\"javascript:void(0);\">".$row['email']."</a></td>
        <td><a href=\"javascript:void(0);\">".$row['created_date']."</a></td>";

        echo '<td><a href="index.php?page_name=sms_contact&contact_id='.$row["contact_id"].'" class="btn btn-xs">Modify</a><a href="javascript:void(0);" class="btn btn-xs" data-id='.$row["contact_id"].' onclick="sms_contact_delete(this)">Delete</a></td>
        </tr>';
    } 

}  


if($action=='fetch_sms_senderid'){

    $sql = "SELECT * FROM `sms_senderid` where username='$login_id'";    
    $res = mysqli_query($conn, $sql);

    $sql2="SELECT smssndrid.* FROM `sms_senderid` as smssndrid inner join users as user on user.user_id='$login_id' and user.login_id IN(smssndrid.username)";
    $res2 = mysqli_query($conn, $sql2);


    $html=''; 

    while($row=mysqli_fetch_array($res)){

        $id=$row['id'];
        $status=$row['status'];

        if($status=='Pending'){
          $date = '';
          $time = '';
      }
      elseif ($status=='Approve') {
          $date = date('Y-m-d',strtotime($row['approve_datetime']));
          $time =  date('h:i:s',strtotime($row['approve_datetime']));
      }
      elseif ($status=='Reject') {
          $date = date('Y-m-d',strtotime($row['reject_datetime']));
          $time =  date('h:i:s',strtotime($row['reject_datetime'])); 
      }
      else{
          $date = '';
          $time = '';
      }

      $html .= "<tr class=\"gradeX odd\" role=\"row\" data-toggle=\"modal\" data-target=\"#myModal\">";

      if($user_type=='admin')
      {
          $html .= '<td><a href="javascript:void(0);" data-toggle="modal" data-target="#SMSSenderIDAction" data-id="'.$id.'" onclick="getsenderactionid(this);"><i class="fa fa-check" aria-hidden="true"></i></a></td>';
      }

      $html .= "<td><a href=\"javascript:void(0);\">".$row['senderid']."</a></td>
      <td><a href=\"javascript:void(0);\"> ". date('Y-m-d',strtotime($row['request_datetime']))."</a></td>
      <td><a href=\"javascript:void(0);\"> ". date('h:i:s',strtotime($row['request_datetime']))."</a></td>
      <td><a href=\"javascript:void(0);\">".$date."</a></td>
      <td><a href=\"javascript:void(0);\">".$time."</a></td>
      <td><a href=\"javascript:void(0);\"><b>".$row['status']."</b></a></td>
      <td><a href=\"javascript:void(0);\">".$row['type']."</a></td>
      <td><a href=\"javascript:void(0);\">".$row['dltsenderid']."</a></td>
      <td><a href=\"javascript:void(0);\">".$row['telemarketingid']."</a></td>
      <td><a href=\"javascript:void(0);\">".$row['entityid']."</a></td>
      <td><a href=\"javascript:void(0);\">".$row['remarks']."</a></td></tr>";

      $html .= "</tr>";

  } 

  while($row2=mysqli_fetch_array($res2)){

    $id=$row2['id'];
    $status=$row2['status'];

    if($status=='Pending'){
      $date2 = '';
      $time2 = '';
  }
  elseif ($status=='Approve') {
      $date2 = date('Y-m-d',strtotime($row2['approve_datetime']));
      $time2 =  date('h:i:s',strtotime($row2['approve_datetime']));
  }
  elseif ($status=='Reject') {
      $date2 = date('Y-m-d',strtotime($row2['reject_datetime']));
      $time2 =  date('h:i:s',strtotime($row2['reject_datetime'])); 
  }
  else{
      $date2 = '';
      $time2 = '';
  }

  $html .= "<tr class=\"gradeX odd\" role=\"row2\" data-toggle=\"modal\" data-target=\"#myModal\">";

  if($user_type=='admin')
  {
      $html .= '<td><a href="javascript:void(0);" data-toggle="modal" data-target="#SMSSenderIDAction" data-id="'.$id.'" onclick="getsenderactionid(this);"><i class="fa fa-check" aria-hidden="true"></i></a></td>';
  }

  $html .= "
  <td><a href=\"javascript:void(0);\">".$row2['senderid']."</a></td>
  <td><a href=\"javascript:void(0);\"> ". date('Y-m-d',strtotime($row2['request_datetime']))."</a></td>
  <td><a href=\"javascript:void(0);\"> ". date('h:i:s',strtotime($row2['request_datetime']))."</a></td>
  <td><a href=\"javascript:void(0);\">".$date2."</a></td>
  <td><a href=\"javascript:void(0);\">".$time2."</a></td>
  <td><a href=\"javascript:void(0);\"><b>".$row2['status']."</b></a></td>
  <td><a href=\"javascript:void(0);\">".$row2['type']."</a></td>
  <td><a href=\"javascript:void(0);\">".$row2['dltsenderid']."</a></td>
  <td><a href=\"javascript:void(0);\">".$row2['telemarketingid']."</a></td>
  <td><a href=\"javascript:void(0);\">".$row2['entityid']."</a></td>
  <td><a href=\"javascript:void(0);\">".$row2['remarks']."</a></td></tr>";




  $html .= "</tr>";


} 

$sql3 = "SELECT login_id FROM `users` where user_id='$login_id'";
$res3 = mysqli_query($conn, $sql3);
$admin_reseller_id = array();

while($row3=mysqli_fetch_array($res3)){
    $admin_reseller_id[]=$row3['login_id'];
}

$get_admin_resellers_id =implode("','", $admin_reseller_id);

$sql4="SELECT smssndrid.* FROM `sms_senderid` as smssndrid inner join users as user on user.user_id IN('$get_admin_resellers_id') and user.login_id IN(smssndrid.username)";

$res4 = mysqli_query($conn, $sql4);

while($row4=mysqli_fetch_array($res4)){

    $id=$row4['id'];
    $status=$row4['status'];

    if($status=='Pending'){
      $date4 = '';
      $time4 = '';
  }
  elseif ($status=='Approve') {
      $date4 = date('Y-m-d',strtotime($row4['approve_datetime']));
      $time4 =  date('h:i:s',strtotime($row4['approve_datetime']));
  }
  elseif ($status=='Reject') {
      $date4 = date('Y-m-d',strtotime($row4['reject_datetime']));
      $time4 =  date('h:i:s',strtotime($row4['reject_datetime'])); 
  }
  else{
      $date4 = '';
      $time4 = '';
  }

  $html .= "<tr class=\"gradeX odd\" role=\"row2\" data-toggle=\"modal\" data-target=\"#myModal\">";

  if($user_type=='admin')
  {
      $html .= '<td><a href="javascript:void(0);" data-toggle="modal" data-target="#SMSSenderIDAction" data-id="'.$id.'" onclick="getsenderactionid(this);"><i class="fa fa-check" aria-hidden="true"></i></a></td>';
  }

  $html .= "
  <td><a href=\"javascript:void(0);\">".$row4['senderid']."</a></td>
  <td><a href=\"javascript:void(0);\"> ". date('Y-m-d',strtotime($row4['request_datetime']))."</a></td>
  <td><a href=\"javascript:void(0);\"> ". date('h:i:s',strtotime($row4['request_datetime']))."</a></td>
  <td><a href=\"javascript:void(0);\">".$date4."</a></td>
  <td><a href=\"javascript:void(0);\">".$time4."</a></td>
  <td><a href=\"javascript:void(0);\"><b>".$row4['status']."</b></a></td>
  <td><a href=\"javascript:void(0);\">".$row4['type']."</a></td>
  <td><a href=\"javascript:void(0);\">".$row4['dltsenderid']."</a></td>
  <td><a href=\"javascript:void(0);\">".$row4['telemarketingid']."</a></td>
  <td><a href=\"javascript:void(0);\">".$row4['entityid']."</a></td>
  <td><a href=\"javascript:void(0);\">".$row4['remarks']."</a></td></tr>"; 
  $html .= "</tr>"; 
} 
echo $html; 
}  

if($action=='fetch_sms_template'){ 
    $sql = "SELECT * FROM `sms_template` where username='$login_id'";
    $res = mysqli_query($conn, $sql);

    $sql2="SELECT smstemp.* FROM `sms_template` as smstemp inner join users as user on user.user_id='$login_id' and user.login_id IN(smstemp.username)";
    $res2 = mysqli_query($conn, $sql2);


    $html=''; 

    while($row=mysqli_fetch_array($res)){

        $id=$row['id'];
        $status=$row['status'];

        if($status=='Pending'){
          $date = '';
          $time = '';
      }
      elseif ($status=='Approve') {
          $date = date('Y-m-d',strtotime($row['approve_datetime']));
          $time =  date('h:i:s',strtotime($row['approve_datetime']));
      }
      elseif ($status=='Reject') {
          $date = date('Y-m-d',strtotime($row['reject_datetime']));
          $time =  date('h:i:s',strtotime($row['reject_datetime'])); 
      }
      else{
          $date = '';
          $time = '';
      }


      $html .= "<tr class=\"gradeX odd\" role=\"row\" data-toggle=\"modal\" data-target=\"#myModal\">";

      if($user_type=='admin')
      {
          $html .= '<td><a href="javascript:void(0);" data-toggle="modal" data-target="#SMSTemplateAction" data-id="'.$id.'" onclick="gettemplateactionid(this);"><i class="fa fa-check" aria-hidden="true"></i></a></td>';
      }

      $html .= "<td><a href=\"javascript:void(0);\">".$row['templatename']."</a></td>
      <td><a href=\"javascript:void(0);\">".$row['templatesms']."</a></td>
      <td><a href=\"javascript:void(0);\"> ". date('Y-m-d',strtotime($row['request_datetime']))."</a></td>
      <td><a href=\"javascript:void(0);\"> ". date('h:i:s',strtotime($row['request_datetime']))."</a></td>
      <td><a href=\"javascript:void(0);\">".$date."</a></td>
      <td><a href=\"javascript:void(0);\">".$time."</a></td>
      <td><a href=\"javascript:void(0);\">".$row['credittype']."</a></td>
      <td><a href=\"javascript:void(0);\">".$row['encodetype']."</a></td>
      <td><a href=\"javascript:void(0);\"><b>".$row['status']."</b></a></td>
      <td><a href=\"javascript:void(0);\">".$row['approvalremarks']."</a></td>
      <td><a href=\"javascript:void(0);\">".$row['language']."</a></td>
      <td><a href=\"javascript:void(0);\">".$row['dlttemplate']."</a></td>
      <td><a href=\"javascript:void(0);\">".$row['telemarketingid']."</a></td>";


      $html .= "</tr>";

  } 

  while($row2=mysqli_fetch_array($res2)){

    $id=$row2['id'];
    $status=$row2['status'];

    if($status=='Pending'){
      $date2 = '';
      $time2 = '';
  }
  elseif ($status=='Approve') {
      $date2 = date('Y-m-d',strtotime($row2['approve_datetime']));
      $time2 =  date('h:i:s',strtotime($row2['approve_datetime']));
  }
  elseif ($status=='Reject') {
      $date2 = date('Y-m-d',strtotime($row2['reject_datetime']));
      $time2 =  date('h:i:s',strtotime($row2['reject_datetime'])); 
  }
  else{
      $date2 = '';
      $time2 = '';
  }

  $html .= "<tr class=\"gradeX odd\" role=\"row2\" data-toggle=\"modal\" data-target=\"#myModal\">";

  if($user_type=='admin')
  {
      $html .= '<td><a href="javascript:void(0);" data-toggle="modal" data-target="#SMSTemplateAction" data-id="'.$id.'" onclick="gettemplateactionid(this);"><i class="fa fa-check" aria-hidden="true"></i></a></td>';
  }

  $html .= "<td><a href=\"javascript:void(0);\">".$row2['templatename']."</a></td>
  <td><a href=\"javascript:void(0);\">".$row2['templatesms']."</a></td>
  <td><a href=\"javascript:void(0);\"> ". date('Y-m-d',strtotime($row2['request_datetime']))."</a></td>
  <td><a href=\"javascript:void(0);\"> ". date('h:i:s',strtotime($row2['request_datetime']))."</a></td>
  <td><a href=\"javascript:void(0);\">".$date2."</a></td>
  <td><a href=\"javascript:void(0);\">".$time2."</a></td>
  <td><a href=\"javascript:void(0);\">".$row2['credittype']."</a></td>
  <td><a href=\"javascript:void(0);\">".$row2['encodetype']."</a></td>
  <td><a href=\"javascript:void(0);\"><b>".$row2['status']."</b></a></td>
  <td><a href=\"javascript:void(0);\">".$row2['approvalremarks']."</a></td>
  <td><a href=\"javascript:void(0);\">".$row2['language']."</a></td>
  <td><a href=\"javascript:void(0);\">".$row2['dlttemplate']."</a></td>
  <td><a href=\"javascript:void(0);\">".$row2['telemarketingid']."</a></td>"; 
  $html .= "</tr>";


} 

$sql3 = "SELECT login_id FROM `users` where user_id='$login_id'";
$res3 = mysqli_query($conn, $sql3);
$admin_reseller_id = array();

while($row3=mysqli_fetch_array($res3)){
    $admin_reseller_id[]=$row3['login_id'];
}

$get_admin_resellers_id =implode("','", $admin_reseller_id);

$sql4="SELECT smstemp.* FROM `sms_template` as smstemp inner join users as user on user.user_id IN('$get_admin_resellers_id') and user.login_id IN(smstemp.username)";

$res4 = mysqli_query($conn, $sql4);

while($row4=mysqli_fetch_array($res4)){

    $id=$row4['id'];
    $status=$row4['status'];

    if($status=='Pending'){
      $date4 = '';
      $time4 = '';
  }
  elseif ($status=='Approve') {
      $date4 = date('Y-m-d',strtotime($row4['approve_datetime']));
      $time4 =  date('h:i:s',strtotime($row4['approve_datetime']));
  }
  elseif ($status=='Reject') {
      $date4 = date('Y-m-d',strtotime($row4['reject_datetime']));
      $time4 =  date('h:i:s',strtotime($row4['reject_datetime'])); 
  }
  else{
      $date4 = '';
      $time4 = '';
  }

  $html .= "<tr class=\"gradeX odd\" role=\"row4\" data-toggle=\"modal\" data-target=\"#myModal\">";

  if($user_type=='admin')
  {
      $html .= '<td><a href="javascript:void(0);" data-toggle="modal" data-target="#SMSTemplateAction" data-id="'.$id.'" onclick="gettemplateactionid(this);"><i class="fa fa-check" aria-hidden="true"></i></a></td>';
  }

  $html .= "<td><a href=\"javascript:void(0);\">".$row4['templatename']."</a></td>
  <td><a href=\"javascript:void(0);\">".$row4['templatesms']."</a></td>
  <td><a href=\"javascript:void(0);\"> ". date('Y-m-d',strtotime($row4['request_datetime']))."</a></td>
  <td><a href=\"javascript:void(0);\"> ". date('h:i:s',strtotime($row4['request_datetime']))."</a></td>
  <td><a href=\"javascript:void(0);\">".$date4."</a></td>
  <td><a href=\"javascript:void(0);\">".$time4."</a></td>
  <td><a href=\"javascript:void(0);\">".$row4['credittype']."</a></td>
  <td><a href=\"javascript:void(0);\">".$row4['encodetype']."</a></td>
  <td><a href=\"javascript:void(0);\"><b>".$row4['status']."</b></a></td>
  <td><a href=\"javascript:void(0);\">".$row4['approvalremarks']."</a></td>
  <td><a href=\"javascript:void(0);\">".$row4['language']."</a></td>
  <td><a href=\"javascript:void(0);\">".$row4['dlttemplate']."</a></td>
  <td><a href=\"javascript:void(0);\">".$row4['telemarketingid']."</a></td>";

  $html .= "</tr>";


}


echo $html; 
} 





if($action=='fetch_reject_sms_template'){


    $sql = "SELECT * FROM `sms_template` where username='$login_id' and status='Reject'";
    $res = mysqli_query($conn, $sql);

    $sql2="SELECT smstemp.* FROM `sms_template` as smstemp inner join users as user on user.user_id='$login_id' and user.login_id IN(smstemp.username) and smstemp.status='Reject'";
    $res2 = mysqli_query($conn, $sql2);


    $html=''; 

    while($row=mysqli_fetch_array($res)){

        $id=$row['id'];
        $status=$row['status'];

        
        $date = date('Y-m-d',strtotime($row['reject_datetime']));
        $time =  date('h:i:s',strtotime($row['reject_datetime'])); 
        
        $html .= "<tr class=\"gradeX odd\" role=\"row\" data-toggle=\"modal\" data-target=\"#myModal\">
        <td><a href=\"javascript:void(0);\">".$row['templatename']."</a></td>
        <td><a href=\"javascript:void(0);\">".$row['templatesms']."</a></td>
        <td><a href=\"javascript:void(0);\"> ". date('Y-m-d',strtotime($row['request_datetime']))."</a></td>
        <td><a href=\"javascript:void(0);\"> ". date('h:i:s',strtotime($row['request_datetime']))."</a></td>
        <td><a href=\"javascript:void(0);\">".$date."</a></td>
        <td><a href=\"javascript:void(0);\">".$time."</a></td>
        <td><a href=\"javascript:void(0);\"><b>".$row['status']."</b></a></td>
        <td><a href=\"javascript:void(0);\">".$row['approvalremarks']."</a></td></tr>";

    } 

    while($row2=mysqli_fetch_array($res2)){

        $id=$row2['id'];
        $status=$row2['status'];

        
        $date2 = date('Y-m-d',strtotime($row2['reject_datetime']));
        $time2 =  date('h:i:s',strtotime($row2['reject_datetime'])); 

        $html .= "<tr class=\"gradeX odd\" role=\"row2\" data-toggle=\"modal\" data-target=\"#myModal\">
        <td><a href=\"javascript:void(0);\">".$row2['templatename']."</a></td>
        <td><a href=\"javascript:void(0);\">".$row2['templatesms']."</a></td>
        <td><a href=\"javascript:void(0);\"> ". date('Y-m-d',strtotime($row2['request_datetime']))."</a></td>
        <td><a href=\"javascript:void(0);\"> ". date('h:i:s',strtotime($row2['request_datetime']))."</a></td>
        <td><a href=\"javascript:void(0);\">".$date2."</a></td>
        <td><a href=\"javascript:void(0);\">".$time2."</a></td>
        <td><a href=\"javascript:void(0);\"><b>".$row2['status']."</b></a></td>
        <td><a href=\"javascript:void(0);\">".$row2['approvalremarks']."</a></td>
        </tr>";


    } 

    $sql3 = "SELECT login_id FROM `users` where user_id='$login_id'";
    $res3 = mysqli_query($conn, $sql3);
    $admin_reseller_id = array();

    while($row3=mysqli_fetch_array($res3)){
        $admin_reseller_id[]=$row3['login_id'];
    }

    $get_admin_resellers_id =implode("','", $admin_reseller_id);

    $sql4="SELECT smstemp.* FROM `sms_template` as smstemp inner join users as user on user.user_id IN('$get_admin_resellers_id') and user.login_id IN(smstemp.username) and smstemp.status='Reject'";

    $res4 = mysqli_query($conn, $sql4);

    while($row4=mysqli_fetch_array($res4)){

        $id=$row4['id'];
        $status=$row4['status'];

        
        $date4 = date('Y-m-d',strtotime($row4['reject_datetime']));
        $time4 =  date('h:i:s',strtotime($row4['reject_datetime'])); 
        
        $html .= "<tr class=\"gradeX odd\" role=\"row4\" data-toggle=\"modal\" data-target=\"#myModal\">
        <td><a href=\"javascript:void(0);\">".$row4['templatename']."</a></td>
        <td><a href=\"javascript:void(0);\">".$row4['templatesms']."</a></td>
        <td><a href=\"javascript:void(0);\"> ". date('Y-m-d',strtotime($row4['request_datetime']))."</a></td>
        <td><a href=\"javascript:void(0);\"> ". date('h:i:s',strtotime($row4['request_datetime']))."</a></td>
        <td><a href=\"javascript:void(0);\">".$date4."</a></td>
        <td><a href=\"javascript:void(0);\">".$time4."</a></td>\
        <td><a href=\"javascript:void(0);\"><b>".$row4['status']."</b></a></td>
        <td><a href=\"javascript:void(0);\">".$row4['approvalremarks']."</a></td>
        </tr>";


    }

    
    echo $html; 
} 




if($action=='fetch_users_type'){

    $html = '';

    if($user_type=='admin'){

        if($sel_user_type=='User'){

          $sql = "SELECT * FROM `users` WHERE user_type='$sel_user_type' and user_id='$login_id'";

          $sql2 = "SELECT * FROM `users` WHERE user_type='$sel_user_type' and user_id IN (select t1.login_id as t1login_id FROM users as t1 INNER JOIN users as t2 on t1.user_id=t2.login_id where t2.login_id='$login_id')";

          $res = mysqli_query($conn, $sql);
          $html = "<option value=''>Select User</option>";

          while($row=mysqli_fetch_array($res)){
              $html .= "<option value='".$row['login_id']."'>".$row['login_id']."(".$row['username'].")</option>";
          }   
          
          $res2 = mysqli_query($conn, $sql2);
          while($row2=mysqli_fetch_array($res2)){
              $html .= "<option value='".$row2['login_id']."'>".$row2['login_id']."(".$row2['username'].")</option>";
          }

      }
      else{
          $sql = "SELECT login_id,username FROM `users` where user_type='$sel_user_type' and user_id='$login_id'";    
          $res = mysqli_query($conn, $sql);
          $rowscount = mysqli_num_rows($res);
          $html = "<option value=''>Select User</option>";

          while($row=mysqli_fetch_array($res)){
              $html .= "<option value='".$row['login_id']."'>".$row['login_id']."(".$row['username'].")</option>";
          }
      } 
  }
  else{

      echo  $sql = "SELECT login_id,username FROM `users` where user_type='$sel_user_type' and user_id='$login_id'";    
      $res = mysqli_query($conn, $sql);
      $rowscount = mysqli_num_rows($res);
      $html = "<option value=''>Select User</option>";

      while($row=mysqli_fetch_array($res)){
        $html .= "<option value='".$row['login_id']."'>".$row['login_id']."(".$row['username'].")</option>";
    } 
}


echo $html;   

} 



if($action=='fetch_sms_export_report'){

    $sql = "SELECT * FROM `sms_reports` where user_id='$login_id'";    
    $res = mysqli_query($conn, $sql);
    $rowscount = mysqli_num_rows($res);
    while($row=mysqli_fetch_array($res)){

        if($row["report_status"]=="Report Generated"){

            $downloadbtn = '<a href="javascript:void(0);" onclick="downloadlink('.$row["report_request_id"].');" class="downloadlink" value="'.$row["report_request_id"].'" ><i  id="downloadlink" data-id="'.$row["report_request_id"].'" class="fa fa-download" aria-hidden="true"></i></a>';
        }else
        {
            $downloadbtn ="";
        }

        echo "<tr class=\"gradeX odd\" role=\"row\" data-toggle=\"modal\" data-target=\"#myModal\">
        <td><a href=\"javascript:void(0);\">".$row['report_request_id']."</a></td>               
        <td><a href=\"javascript:void(0);\"> ". date('Y-m-d h:i:s',strtotime($row['request_datetime']))."</a></td>
        <td><a href=\"javascript:void(0);\"> ". $row['request_fromdatetime']."</a></td>
        <td><a href=\"javascript:void(0);\"> ". $row['request_todatetime']."</a></td>
        <td><a href=\"javascript:void(0);\">".$row['campaign_name']."</a></td>
        <td><a href=\"javascript:void(0);\">".$row['report_name']."</a></td>
        <td><a href=\"javascript:void(0);\">".$row['report_status']."</a></td>
        <td>".$downloadbtn."</td>
        </tr>";

    } 

} 





if($action=='fetch_email_list'){

    $sql ="SELECT el.*, ec.campaign_name FROM `email_list` as el inner join email_campaign as ec where ec.id=el.email_campaign_id and ec.username='$login_id'";  
    $res = mysqli_query($conn, $sql);
    $rowscount = mysqli_num_rows($res);
    while($row=mysqli_fetch_array($res)){

        $list_id=$row['list_id'];
        
        echo "<tr class=\"gradeX odd\" role=\"row\" data-toggle=\"modal\" data-target=\"#myModal\">
        <td><a href=\"javascript:void(0);\">".$row['campaign_name']."</a></td>  
        <td><a href=\"javascript:void(0);\">".$row['list_id']."</a></td>
        <td><a href=\"javascript:void(0);\"> ".$row['list_name']."</a></td>
        <td><a href=\"javascript:void(0);\"> ".$row['list_descreption']."</a></td>
        <td><a href=\"javascript:void(0);\">".$row['active']."</a></td>";

        echo '<td><a class="btn btn-xs"  href="javascript::void(0);" data-toggle="modal" data-target="#ModifyEmail_model" data-campaign="'.$row["campaign_name"].'" data-id="'.$list_id.'" data-name="'.$row["list_name"].'"  data-descreption="'.$row["list_descreption"].'" data-active="'.$row["active"].'" onclick="emaillisteditbtn(this);" > Modify</a><a href="javascript:void(0);" class="btn btn-xs" data-id='.$row["list_id"].' onclick="email_list_delete(this)">Delete</a></td>
        </tr>';
    } 
} 




if($action=='fetch_email_listing'){

    $sql = "SELECT * FROM `email_contact` where list_id='$list_id' and username='$login_id'";    
    $res = mysqli_query($conn, $sql);
    $rowscount = mysqli_num_rows($res);
    while($row=mysqli_fetch_array($res)){

        $contact_id=$row['contact_id'];

        echo "<tr class=\"gradeX odd\" role=\"row\" data-toggle=\"modal\" data-target=\"#myModal\">
        <td><a href=\"javascript:void(0);\"> ".$row['firstname']."</a></td>
        <td><a href=\"javascript:void(0);\"> ".$row['lastname']."</a></td>
        <td><a href=\"javascript:void(0);\">".$row['email']."</a></td>
        <td><a href=\"javascript:void(0);\">".$row['created_date']."</a></td>";

        /*echo '<td><a href="index.php?page_name=emailbook_list&contact_id='.$row["contact_id"].'" class="btn btn-xs">Modify</a><a href="javascript:void(0);" class="btn btn-xs" data-id='.$row["contact_id"].' onclick="email_contact_delete(this)">Delete</a></td>
        </tr>';*/

        echo '</tr>';

    } 

} 




if($action=='fetch_email_campaign'){

    $sql = "SELECT * FROM `email_campaign` where username='$login_id'";    
    $res = mysqli_query($conn, $sql);
    $rowscount = mysqli_num_rows($res);
    while($row=mysqli_fetch_array($res)){

        $campaign_id=$row['id'];

        echo "<tr class=\"gradeX odd\" role=\"row\" data-toggle=\"modal\" data-target=\"#myModal\">
        <td><a href=\"javascript:void(0);\"> ".$row['id']."</a></td>
        <td><a href=\"javascript:void(0);\"> ".$row['campaign_name']."</a></td>
        <td><a href=\"javascript:void(0);\">".$row['created_date']."</a></td>
        <td><a href=\"javascript:void(0);\">".$row['username']."</a></td>";

        echo '<td><a class="btn btn-xs"  href="index.php?page_name=sendemail&campaign_id='.$campaign_id.'"  > <i class="fa fa-envelope" aria-hidden="true"></i></a></td>
        </tr>';
    } 

} 




if($action=='fetch_email_template'){

    $sql = "SELECT * FROM `email_template` where username='$login_id'";    
    $res = mysqli_query($conn, $sql);
    $rowscount = mysqli_num_rows($res);
    while($row=mysqli_fetch_array($res)){

        $template_id=$row['id'];

        if(empty($row['approve_datetime'])){
          $approve_dates = '0000-00-00';
          $approve_times = '00:00:00';
      }else{
          $approve_dates = date('Y-m-d',strtotime($row['approve_datetime']));
          $approve_times = date('h:i:s',strtotime($row['approve_datetime']));
      }


      if($row['status']=='0'){$templatestaus = "Pending";}else if($row['status']=='1'){$templatestaus = "Approve";}

      echo "<tr class=\"gradeX odd\" role=\"row\" data-toggle=\"modal\" data-target=\"#myModal\">
      <td><a href=\"javascript:void(0);\"> ".$row['templatename']."</a></td>

      <td><a href=\"javascript:void(0);\">".date('Y-m-d',strtotime($row['created_date']))."</a></td>
      <td><a href=\"javascript:void(0);\">".date('h:i:s',strtotime($row['created_date']))."</a></td>
      <td><a href=\"javascript:void(0);\">".$approve_dates."</a></td>
      <td><a href=\"javascript:void(0);\">".$approve_times."</a></td>
      <td><a href=\"javascript:void(0);\">".$templatestaus."</a></td>
      <td><a href=\"javascript:void(0);\">".$row['approval_remarks']."</a></td>
      <td><a href=\"javascript:void(0);\">".$row['username']."</a></td>";
      echo   '<td><a href="javascript:void(0);" onclick="gettemplateid('.$row["id"].')" data-toggle="modal" data-target="#template_preview" data-id="'.$row["id"].'" ><i class="fa fa-eye" aria-hidden="true"></i></a></td>';

        /*echo '<td><a href="index.php?page_name=email_campaign&campaign_id='.$row["campaign_id"].'" class="btn btn-xs">Modify</a><a href="javascript:void(0);" class="btn btn-xs" data-id='.$row["campaign_id"].' onclick="email_campaign_delete(this)">Delete</a></td>
        </tr>';*/
    } 

} 





if($action=='gettemplatecontent'){

    $sql = "SELECT templatetext FROM `email_template` where id='$template_id' and username='$login_id'";    
    $res = mysqli_query($conn, $sql);
    $rowscount = mysqli_num_rows($res);
    $html = ""; 

    while($row=mysqli_fetch_array($res)){
        $html .= "<div>".$row['templatetext']."</div>";
    } 

    echo $html;   

} 




if($action=='fetch_send_email_list'){

    $sql = "SELECT * FROM `email_log` where username='$login_id'";    
    $res = mysqli_query($conn, $sql);
    while($row=mysqli_fetch_array($res)){

        $log_id=$row['id'];

        echo "<tr class=\"gradeX odd\" role=\"row\" data-toggle=\"modal\" data-target=\"#myModal\">
        <td><a href=\"javascript:void(0);\"> ".$row['id']."</a></td>              
        <td><a href=\"javascript:void(0);\">".$row['email_contact_id']."</a></td>
        <td><a href=\"javascript:void(0);\">".$row['email_address']."</a></td>
        <td><a href=\"javascript:void(0);\">".date('Y-m-d',strtotime($row['sent_datetime']))."</a></td>
        <td><a href=\"javascript:void(0);\">".date('h:i:s',strtotime($row['sent_datetime']))."</a></td>
        <td><a href=\"javascript:void(0);\">".$row['status']."</a></td>
        <td><a href=\"javascript:void(0);\">".$row['mail_status']."</a></td>
        <td><a href=\"javascript:void(0);\">".$row['username']."</a></td></tr>";

               /*
               echo   '<td><a href="javascript:void(0);" onclick="gettemplateid('.$row["id"].')" data-toggle="modal" data-target="#template_preview" data-id="'.$row["id"].'" ><i class="fa fa-eye" aria-hidden="true"></i></a></td>';*/
               
        /*echo '<td><a href="index.php?page_name=email_campaign&campaign_id='.$row["campaign_id"].'" class="btn btn-xs">Modify</a><a href="javascript:void(0);" class="btn btn-xs" data-id='.$row["campaign_id"].' onclick="email_campaign_delete(this)">Delete</a></td>
        </tr>';*/

    } 

} 




if($action=='fetch_email_sender_id'){

    $sql = "SELECT * FROM `email_sender_id` where username='$login_id'";    
    $res = mysqli_query($conn, $sql);
    while($row=mysqli_fetch_array($res)){

      $sender_id=$row['id'];
      
      if($row['status']=='0'){ $email_status="Pending";}else if($row['status']=='1'){$email_status="Verified";}

      echo "<tr class=\"gradeX odd\" role=\"row\" data-toggle=\"modal\" data-target=\"#myModal\">
      <td><a href=\"javascript:void(0);\">".$row['id']."</a></td>
      <td><a href=\"javascript:void(0);\"> ".$row['from_name']."</a></td>
      <td><a href=\"javascript:void(0);\"> ".$row['from_email_address']."</a></td>
      <td><a href=\"javascript:void(0);\">".$email_status."</a></td>
      <td><a href=\"javascript:void(0);\"> ".$row['username']."</a></td>";

      echo '<td><a class="btn btn-xs"  href="javascript::void(0);" data-toggle="modal" data-target="#ModifyEmailSender_model" data-id="'.$sender_id.'" data-name="'.$row["from_name"].'" data-email="'.$row["from_email_address"].'"  onclick="email_sender_ideditbtn(this);" > Modify</a><a href="javascript:void(0);" class="btn btn-xs" data-id='.$row["id"].' onclick="email_sender_id_delete(this)">Delete</a></td>
      </tr>';
  } 
} 



if($action=='getsmstemplatecontent'){

    $sql = "SELECT templatesms FROM `sms_template` where id='$template_id' and  username='$login_id'";    
    $res = mysqli_query($conn, $sql);
    $row=mysqli_fetch_array($res);
    $html = $row['templatesms'];

    echo $html;   

} 





if($action=='fetch_sms_campaign'){

    $sql="select vsc.*,count(vsc.sms_status_code) as total_smssend,u.username from vertage_sms_campaign as vsc inner join users as u on u.login_id=vsc.username where vsc.username='$login_id' group by vsc.campaign_name";
    $res = mysqli_query($conn, $sql);
    while($row=mysqli_fetch_array($res)){


      echo "<tr class=\"gradeX odd\" role=\"row\" data-toggle=\"modal\" data-target=\"#myModal\">
      <td><a href=\"javascript:void(0);\">".$row['sms_campgn_id']."</a></td>
      <td><a href=\"javascript:void(0);\">".ucfirst(strtolower($row['campaign_name']))."</a></td>
      <td><a href=\"javascript:void(0);\"> ".date('Y-m-d',strtotime($row['created_date']))."</a></td>
      <td><a href=\"javascript:void(0);\"> ".date('h:i:s',strtotime($row['created_date']))."</a></td>
      <td><a href=\"javascript:void(0);\">".$row['scheduledate']."</a></td>
      <td><a href=\"javascript:void(0);\"> ".$row['sms_text_content']."</a></td>
      <td><a href=\"javascript:void(0);\">0</a></td>
      <td><a href=\"javascript:void(0);\">".$row['total_smssend']."</a></td>
      <td><a href=\"javascript:void(0);\">0</a></td>
      <td><a href=\"javascript:void(0);\"> ".$row['sms_template']."</a></td>
      <td><a href=\"javascript:void(0);\"> ".$row['campaign_type_radio']."</a></td>
      <td><a href=\"javascript:void(0);\"> ".$row['status']."</a></td>
      <td><a href=\"javascript:void(0);\"> ".ucfirst($row['username'])."</a></td></tr>";

  } 
} 




if($action=='fetch_sms_api'){

    $sql = "SELECT * FROM `sms_api` where username='$login_id'"; 
    $res = mysqli_query($conn, $sql);
    while($row=mysqli_fetch_array($res)){

        if($row['status']=='1'){ $status="Active"; } else{ $status="Inactive"; }          

        echo "<tr class=\"gradeX odd\" role=\"row\" data-toggle=\"modal\" data-target=\"#myModal\">
        <td><a href=\"javascript:void(0);\">".$row['api_id']."</a></td>
        <td><a href=\"javascript:void(0);\">".$row['api_url']."</a></td>
        <td><a href=\"javascript:void(0);\"> ".$status."</a></td>
        <td><a href=\"javascript:void(0);\"> ".date('Y-m-d h:i:s',strtotime($row['created_date']))."</a></td>
        <td><a href=\"javascript:void(0);\"> ".ucfirst($row['username'])."</a></td></tr>";

    } 

} 



if($action=='phone_no_wise_report'){

  $query = "SELECT vsc.*, temp.templatename as templatename FROM vertage_sms_campaign as vsc inner join sms_template temp on temp.id=vsc.sms_template where vsc.numbers='$numbers' and vsc.created_date>'$date_from' and vsc.created_date<'$date_to' and vsc.username='$login_id' ";
  $sqld = mysqli_query($conn, $query);
  
  while($row=mysqli_fetch_array($sqld)){

      if($row['sms_status_code']=='102'){
        $sms_status_code = "Under Process";
    }
    else if($row['sms_status_code']=='202'){
      $sms_status_code = "Delivered";
  } 

  if($row['campaign_type_radio']=='2'){
    $campaign_type_radio = "SMS Transactional";
}
else if($row['campaign_type_radio']=='7'){
  $campaign_type_radio = "Service Implicit";
} 

if($row['schedule_radio_type']=='0'){
    $schedule_radio_type = "Not Scheduled";
}
else if($row['schedule_radio_type']=='1'){
  $schedule_radio_type = "Scheduled";
}


echo "<tr>
<td><a href=\"javascript:void(0);\">".$row['numbers']."</a></td>
<td><a href=\"javascript:void(0);\">".$sms_status_code."</a></td>
<td><a href=\"javascript:void(0);\">".$row['language']."</a></td>
<td><a href=\"javascript:void(0);\">".$row['senderid']."</a></td>
<td><a href=\"javascript:void(0);\">".$row['campaign_name']."</a></td>
<td><a href=\"javascript:void(0);\">".$row['templatename']."</a></td>
<td><a href=\"javascript:void(0);\">".$row['sms_text_content']."</a></td>
<td><a href=\"javascript:void(0);\">".$campaign_type_radio."</a></td>
<td><a href=\"javascript:void(0);\">".$schedule_radio_type."</a></td>
<td><a href=\"javascript:void(0);\"> ".date('Y-m-d',strtotime($row['scheduledate']))."</a></td>
<td><a href=\"javascript:void(0);\"> ".date('h:i:s',strtotime($row['scheduledate']))."</a></td>
<td><a href=\"javascript:void(0);\"> ".date('Y-m-d',strtotime($row['created_date']))."</a></td>
<td><a href=\"javascript:void(0);\"> ".date('h:i:s',strtotime($row['created_date']))."</a></td>
<td><a href=\"javascript:void(0);\"> ".ucfirst($row['username'])."</a></td>
<td><a href=\"javascript:void(0);\">".$row['ref_no']."</a></td>
<td><a href=\"javascript:void(0);\">".$row['descr']."</a></td>
</tr>";

} 


} 





if($action=='fetch_sms_api_key'){

  $html=''; 
  $admin_reseller_id = array();

  $sql = "SELECT * FROM `users` where login_id='$login_id'";
  $res = mysqli_query($conn, $sql);
  $html = "";

  while($row=mysqli_fetch_array($res)){

    if($row['lockunlock']==1){$lockunlock="Active";}else{$lockunlock="Inactive";}   

    $html .= "<tr>
    <td><a href=\"javascript:void(0);\">".$row['login_id']."</a></td>
    <td><a href=\"javascript:void(0);\">".$row['first_name']." ".$row['last_name']."</a></td>
    <td><a href=\"javascript:void(0);\">".$row['mobile_no']."</a></td>
    <td><a href=\"javascript:void(0);\">".$row['email']."</a></td>
    <td><a id=\"copyTarget\" href=\"javascript:void(0);\"><b>".$row['api_key']."</b></a></td>
    <td>";

    if(!empty($row['api_key'])){
      $html.="<a id=\"copyButton\" onclick=\"copyButton(this);\" data-id=".$row['api_key']." href=\"javascript:void(0);\">Click to Copy</a>";
  }

  $html.="</td>
  <td><a href=\"javascript:void(0);\">".$lockunlock."</a></td>
  </tr>";

}

$sql2 = "SELECT * FROM `users` where user_id='$login_id'";
$res2 = mysqli_query($conn, $sql2);


while($row2=mysqli_fetch_array($res2)){

    $admin_reseller_id[]=$row2['login_id'];

    if($row2['lockunlock']==1){$lockunlock2="Active";}else{$lockunlock2="Inactive";} 

    $html .= "<tr>
    <td><a href=\"javascript:void(0);\">".$row2['login_id']."</a></td>
    <td><a href=\"javascript:void(0);\">".$row2['first_name']." ".$row2['last_name']."</a></td>
    <td><a href=\"javascript:void(0);\">".$row2['mobile_no']."</a></td>
    <td><a href=\"javascript:void(0);\">".$row2['email']."</a></td>
    <td><a id=\"copyTarget\" data-attr=".$row2['api_key']." href=\"javascript:void(0);\"><b>".$row2['api_key']."</b></a></td>
    <td>";

    if(!empty($row2['api_key'])){
      $html.="<a id=\"copyButton\" onclick=\"copyButton(this);\" data-id=".$row2['api_key']." href=\"javascript:void(0);\">Click to Copy</a>";
  }

  $html.="</td>
  <td><a href=\"javascript:void(0);\">".$lockunlock2."</a></td>
  </tr>";

} 

$get_admin_resellers_id =implode("','", $admin_reseller_id);

if(!empty($get_admin_resellers_id)){



  $sql3 = "SELECT * FROM `users` where user_id IN('$get_admin_resellers_id')";

  $res3 = mysqli_query($conn, $sql3);

  while($row3=mysqli_fetch_array($res3)){

    if($row3['lockunlock']==1){$lockunlock3="Active";}else{$lockunlock3="Inactive";} 

    $html .= "<tr>
    <td><a href=\"javascript:void(0);\">".$row3['login_id']."</a></td>
    <td><a href=\"javascript:void(0);\">".$row3['first_name']." ".$row3['last_name']."</a></td>
    <td><a href=\"javascript:void(0);\">".$row3['mobile_no']."</a></td>
    <td><a href=\"javascript:void(0);\">".$row3['email']."</a></td>
    <td><a id=\"copyTarget\" href=\"javascript:void(0);\"><b>".$row3['api_key']."</b></a></td>
    <td>";

    if(!empty($row3['api_key'])){
      $html.="<a id=\"copyButton\" onclick=\"copyButton(this);\" data-id=".$row3['api_key']." href=\"javascript:void(0);\">Click to Copy</a>";
  }

  $html.="</td>
  <td><a href=\"javascript:void(0);\">".$lockunlock3."</a></td>
  </tr>";


}

}

echo $html; 


}  





if($action=='fetch_credit_request'){


  $html=''; 
  $admin_reseller_id = array();

  $sql = "SELECT * FROM `credit_request` where username='$login_id'";
  $res = mysqli_query($conn, $sql);
  $html = "";

  while($row1=mysqli_fetch_array($res)){
      $status1 = $row1['status'];

      $html .= "<tr class=\"gradeX odd\" role=\"row\" data-toggle=\"modal\" data-target=\"#myModal\">
      <td><a href=\"javascript:void(0);\">".$row1['request_id']."</a></td>
      <td><a href=\"javascript:void(0);\">".$row1['request_name']."</a></td>
      <td><a href=\"javascript:void(0);\">".$row1['request_type']."</a></td>
      <td><a href=\"javascript:void(0);\">".$row1['request_amount']."</a></td>
      <td><a href=\"javascript:void(0);\">".$status1."</a></td>
      <td><a href=\"javascript:void(0);\">".$row1['username']."</a></td>
      <td><a href=\"javascript:void(0);\"> ".date('Y-m-d h:i:s',strtotime($row1['created_date']))."</a></td>";

      if($user_type=='admin'){

        if($status1=='Completed'){

            $html .= "<td><a href=\"javascript:void(0);\"><i class=\"fa fa-check\" aria-hidden=\"true\"></i> </a></td>";
        }
        else{

            $html .= "<td><a href=\"?page_name=obd_credit_allocation&request_id=".$row1['request_id']."&request_login_id=".$row1['username']."\" ><i class=\"fa fa-clock-o\" aria-hidden=\"true\"></i> </a></td>";
        }
    } 

    $html .= "</tr>";

}

$sql2 = "SELECT * FROM `credit_request` WHERE username IN (select t1.login_id as t2login_id FROM users as t1 INNER JOIN users as t2 on t1.user_id=t2.login_id where t2.login_id='$login_id')";
$res2 = mysqli_query($conn, $sql2);


while($row2=mysqli_fetch_array($res2)){

    $status2 = $row2['status'];

    $html .= "<tr class=\"gradeX odd\" role=\"row\" data-toggle=\"modal\" data-target=\"#myModal\">
    <td><a href=\"javascript:void(0);\">".$row2['request_id']."</a></td>
    <td><a href=\"javascript:void(0);\">".$row2['request_name']."</a></td>
    <td><a href=\"javascript:void(0);\">".$row2['request_type']."</a></td>
    <td><a href=\"javascript:void(0);\">".$row2['request_amount']."</a></td>
    <td><a href=\"javascript:void(0);\">".$status2."</a></td>
    <td><a href=\"javascript:void(0);\">".$row2['username']."</a></td>
    <td><a href=\"javascript:void(0);\"> ".date('Y-m-d h:i:s',strtotime($row2['created_date']))."</a></td>";

    if($user_type=='admin'){

      if($status2=='Completed'){

        $html .= "<td><a href=\"javascript:void(0);\"><i class=\"fa fa-check\" aria-hidden=\"true\"></i> </a></td>";

    }
    else{

        $html .= "<td><a href=\"?page_name=obd_credit_allocation&request_id=".$row2['request_id']."&request_login_id=".$row2['username']."\"><i class=\"fa fa-clock-o\" aria-hidden=\"true\"></i> </a></td>";
    }

} 

$html .= "</tr>";

} 




$sql3 = "SELECT * FROM `credit_request` WHERE username IN (select t1.login_id as t1login_id FROM users as t1 INNER JOIN users as t2 on t1.user_id=t2.login_id where t2.login_id IN(select t1.login_id as t2login_id FROM users as t1 INNER JOIN users as t2 on t1.user_id=t2.login_id where t2.login_id='$login_id'))";

$res3 = mysqli_query($conn, $sql3);

while($row3=mysqli_fetch_array($res3)){

    $status3 = $row3['status'];

    $html .= "<tr class=\"gradeX odd\" role=\"row\" data-toggle=\"modal\" data-target=\"#myModal\">
    <td><a href=\"javascript:void(0);\">".$row3['request_id']."</a></td>
    <td><a href=\"javascript:void(0);\">".$row3['request_name']."</a></td>
    <td><a href=\"javascript:void(0);\">".$row3['request_type']."</a></td>
    <td><a href=\"javascript:void(0);\">".$row3['request_amount']."</a></td>
    <td><a href=\"javascript:void(0);\">".$status3."</a></td>
    <td><a href=\"javascript:void(0);\">".$row3['username']."</a></td>
    <td><a href=\"javascript:void(0);\"> ".date('Y-m-d h:i:s',strtotime($row3['created_date']))."</a></td>";

    if($user_type=='admin'){

      if($status3=='Completed'){

          $html .= "<td><a href=\"javascript:void(0);\"><i class=\"fa fa-check\" aria-hidden=\"true\"></i> </a></td>";
      }
      else{

        $html .= "<td><a href=\"?page_name=obd_credit_allocation&request_id=".$row2['request_id']."&request_login_id=".$row2['username']."\"><i class=\"fa fa-clock-o\" aria-hidden=\"true\"></i> </a></td>";
    }

} 

$html .= "</tr>";


}


echo $html;      


} 





?>
